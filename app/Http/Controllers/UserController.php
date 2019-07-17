<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
                               //->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $request['email'];
       // request('email');

       $request->validate([
           'name' => 'required|min:3',
           'email' => 'required|email|max:255|unique:users',
           'password' => 'required|confirmed|min:3'
       ]);

       $user = new User();
       $user->name = $request['name'];
       $user->email = $request['email'];
       $user->password = bcrypt($request['password']);
       $user->save();

       return redirect()->route('users.index')->withFlashMessage("Korisnik $user->name uspješno je kreiran.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //$user = User::find($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'password' => 'min:3|nullable'
        ]);
 
       // $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        if (!empty($request['password'])) {
            $user->password = bcrypt($request['password']);
        }        
        $user->save();
        
        return redirect()->route('users.index')->withFlashMessage("Korisnik $user->name uspješno promijenjen.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->withFlashMessage("Korisnik $user->name uspješno je izbrisan.");
    }
}
