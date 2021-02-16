<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('member.updateProfile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
    * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $this->validator($request->all(),$user)->validate();
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
        ]);

        return redirect()->route('home');
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @param  \App\User  $user
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data,User $user)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','email:rfc', Rule::unique('users')->ignore($user->id, 'id')],
            'phone_number' => ['required', 'string', 'min:11'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->articles()->delete();
        $user->delete();

        return back();
    }

    /**
     * get articles by userID
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function getArticles(User $user)
    {
        //
        $articles = $user->articles()->get();
        return view('member.viewArticles',compact('articles'));
    }
    
        /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdminUsers()
    {
        //
        $users = User::where('role','Admin')->get();
        return view('admin.ViewAdminUsers',compact('users'));
    }

        /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdminMembers()
    {
        //
        $users = User::where('role','Member')->get();
        return view('admin.ViewMemberUsers',compact('users'));
    }
}
