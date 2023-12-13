<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|min:5',
            'password' => 'required|min:7',
        ]);

        $validatedData['role_name'] = 'staff';
        $validatedData['role_id'] = 3;
        $validatedData['name'] = $request->name;
        $validatedData['username'] = $request->username;
        $validatedData['password'] = bcrypt($request->password);

        User::create($validatedData);
        return redirect('/setting')->with('success', 'Berhasil membuat akun Staf baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        $userData = $user->find($id);
        
        $userData->name = $request->name;
        $userData->username = $request->username;

        if($request->password){
            $userData->password = bcrypt($request->password);
        }

        $userData->save();
        return redirect('/setting')->with('success', 'Berhasil Diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
