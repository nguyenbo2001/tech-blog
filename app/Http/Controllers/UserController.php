<?php

namespace App\Http\Controllers;

use App\User;
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
        $users = User::all();

        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3|max:50',
    			'email' => 'required|email|unique:users,email',
    			'password' => 'required|min:6|max:32',
    			'password_again' => 'required|same:password'
            ]
        );

        $user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password_again);
    	$user->role = $request->role == '1' ? 'admin' : 'user';
        $user->save();

    	return redirect()->route('admin.users.index')->with('message','Thêm Người Dùng thành công!');
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
        $user = User::findOrFail($id);

    	return view('admin.users.edit',['user' => $user]);
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
        $this->validate($request,
            [
                'name' => 'required|min:3|max:50',
            ]
        );

    	$user = User::find($id);
    	$user->name = $request->name;
    	if($request->has('password'))
    	{
    		$this->validate($request,
    		[
    			'password' => 'required|min:6|max:32',
    			'password_again' => 'required|same:password'
            ]);

    		$user->password = bcrypt($request->password_again);
    	}
    	$user->role = $request->role == '1' ? 'admin' : 'user';

    	$user->save();
    	return redirect()->route('admin.users.edit', $id)->with('message','Thay Đổi thông tin Người Dùng thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->Comment()->delete();
        $user->delete();

    	return redirect()->route('admin.users.index')->with('message','Xóa Người Dùng thành công!');
    }
}
