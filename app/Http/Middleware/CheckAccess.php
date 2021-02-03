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
        $menuId = Menu::whereName($request->route()->getName())->first()->id;
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
