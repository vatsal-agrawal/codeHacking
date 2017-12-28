<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UsersEditRequest;
use App\User;
use App\Photos;
use App\Role;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.users.index')->with('user',$user);
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
    public function store(UserRequest $request)
    {
        // User::create($request->all());
    //    return $request->role_id;

        $input = $request->all();

        if($request->file('photo_id')){
            $file = $request->file('photo_id');
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photos::create(['photo'=>$name]);
            $input['photo_id'] = $photo->id;
        }

            $input['password'] = bcrypt($request->password);
            User::create($input);

       
        
        return redirect('admin/users');
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
        $user = User::findorfail($id);
        return view('admin.users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
     $user = User::findorfail($id);
     if(trim($request->password) == '')
       $input = $request->except('password');
    else{
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
    }

     

     if($request->file('photo_id')){

        $file = $request->file('photo_id');

        $name = time().$file->getClientOriginalName();

        $file->move('images',$name);

        $photo = Photos::create(['photo'=>$name]);

        $input['photo_id'] = $photo->id;
     }
        $user->update($input);

        return redirect('admin/users');

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
     session(['deleteuser'=>$user->name.' has been deleted']);
        unlink(public_path().'/images/'.$user->photo->photo);
     $user->delete();
        return redirect('admin/users');
    }
}
