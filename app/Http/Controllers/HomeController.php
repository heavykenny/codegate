<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allusers = User::get();
        $allusers = json_decode(json_encode($allusers), true);
        return view("home", compact('allusers'));
    }

    public function updateform($id)
    {
        $user = User::where('id', $id)->get();
        $user = json_decode(json_encode($user), true);
        return view("updateform", compact('user'));
    }

    public function update(Request $request)
    {
        $id = $request['id'];
        $update = User::where('id', $id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);
        return redirect('home')->with('info', 'Successfully Updated');
    }
    public function delete(Request $request)
    {
        $id = $request['id'];
        $delete = User::where('id', $id)->delete();
        return redirect('home')->with('info', 'Successfully Deleted');
    }
}
