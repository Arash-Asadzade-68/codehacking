<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Post;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users = User::paginate(5);


        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
//        return $request->all();
        if (trim($request->password) == '') {
            $input = $request->except('password');
        } else {

            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }


        if ($path = $request->file('photo_id')) {

            $name = time() . $path->getClientOriginalName();
            $path->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
        }

        User::create($input);
        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.delete', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);

        if (trim($request->password) == '') {
            $result = $request->except('password');
        } else {

            $result = $request->all();
            $result['password'] = bcrypt($request->password);
        }


        if ($path = $request->file('photo_id')) {

            $name = time() . $path->getClientOriginalName();
            $path->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $result['photo_id'] = $photo->id;
        }

        $user->update($result);
        Session::flash('Update_User', 'عملیات ویرایش با موفقیت انجام گردید.');
        return redirect('admin/users');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        if(is_null($user->photo_id)){
            $user->delete();
        }
        else if(file_exists(public_path().$user->photo->path) AND !empty($user->photo->path)){
            unlink(public_path().$user->photo->path);
            $user->photo->delete();
        }
        $user->delete();
        Session::flash('Delete_User','عملیات حذف کاربر با موفقیت انجام شد.');
        return redirect('admin/users');
    }
}
