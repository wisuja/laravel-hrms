<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Models\Employee;
use App\Models\EmployeeDetail;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    private $users;

    public function __construct()
    {
        $this->middleware('auth');  
        
        $this->users = resolve(User::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = $this->users->getProfile();
        return view('pages.profile', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProfileRequest $request, User $user)
    {
        User::whereId($user->id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                ]);
        
        $employee = Employee::whereUserId($user->id)->first();
        $employee->update([
                    'name' => $request->input('name'),
                ]);

        $updateArray = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ];

        if ($request->has('profile')) {
            $updateArray["photo"] = $request->file('profile')->store('photos', 'public');
        }

        EmployeeDetail::whereEmployeeId($employee->id)->update($updateArray);

        Log::create([
            'description' => auth()->user()->employee->name . " updated profile"
        ]);

        return redirect()->route('profile')->with('status', 'Successfully updated the profile.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
