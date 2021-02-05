<?php

namespace App\Http\Middleware;

use App\Models\Access;
use App\Models\Menu;
use Closure;
use Illuminate\Http\Request;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $name = explode(".", $request->route()->getName())[0];

        if(in_array($name, array('employees-data', 'departments-data', 'positions-data'))){
            $name = "data";
        } else if (in_array($name, array('users', 'roles'))) {
            $name = "accounts";
        } else if ($name == "profile") {
            $name = "user";
        } else if ($name == "employees-leave-request") {
            $name = "leave-request";
        } else if ($name == "employees-performance-score") {
            $name = "performance";
        } else if ($name == "score-categories") {
            $name = "score-category";
        }


        $menuId = Menu::whereName($name)->first()->id;
        $accessType = Access::where([
            ["menu_id",'=', $menuId],
            ["role_id",'=', auth()->user()->role_id],
        ])->first()->status;

        if($accessType < 1) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
