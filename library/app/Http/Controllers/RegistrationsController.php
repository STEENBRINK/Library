<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationsController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->only(['create', 'store']);
        $this->middleware('auth')->except(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed']
        ]);

        $request['password'] = bcrypt($request['password']);

        $user = User::create(request(['name', 'birth_date', 'email', 'password']));
        //sign-in
        auth()->login($user);

        //redirect
        return redirect()->home();
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
    public function edit()
    {
        return view('registrations.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $user = Auth::user();

        if($request['id'] == Auth::user()->id) {
            if (Hash::check($request['old_password'], Auth::user()->password)){

                if(!($request['name'] === null)){
                    $request->validate([
                        'name' => ['string', 'max:255']
                    ]);
                    $user->name = $request['name'];
                }

                if(!($request['email'] === null)){
                    $request->validate([
                        'email' => ['string', 'email', 'max:255', 'unique:users']
                    ]);
                    $user->email = $request['email'];
                }

                if(!($request['birth_date'] === null)){
                    $request->validate([
                        'birth_date' => ['date']
                    ]);
                    $user->birth_date = $request['birth_date'];
                }

                if(!($request['new_password'] === null)){
                    $request->validate([
                        'new_password' => ['string', 'min:6', 'confirmed']
                    ]);
                    $user->password = bcrypt($request['new_password']);
                }

                $user->save();

                return redirect('/me');
            }else {
                return back()->withErrors(['message' => 'invalid password']);
            }
        }else{
            return back()->withErrors(['message' => 'ID incorrect']);
        }

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
