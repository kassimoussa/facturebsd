<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        //validate the input
        $request->validate([
            "email" => 'required',
            "password" => 'required|min:8|max:16',
        ]);

        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $user = User::where($field, $request->email)->first();
        if ($user) {
            if ($request->password == $user->password) {
                $request->session()->put('id', $user->id);
                $request->session()->put('level', $user->id);
                $request->session()->put('name', $user->name); 
                return redirect('index');
            } else {
                return back()->with('fail', 'Invalide password');
            }
        } else {
            return back()->with('fail', 'No account found for this email');
        }
    }

    public function logout()
    {

        session()->flush();
        return redirect('/');
    }

    public function index()
    {
        return view('1.index');
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
    public function update(Request $request, $id)
    {
        //
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
