<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $users = User::paginate(5);

        return view('backend.users.index', ['users'=> $users]);
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
    public function searchUsers(Request $request)
    {
        $search = $request->get('search');
        $users = DB::table('users')
        ->where('name', 'like', '%'.$search.'%')
        ->paginate(5);
        return view('backend.users.index', ['users' => $users]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $users)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'min:3|max:255',
            'email' => 'email',
            'password' => 'required|min:8',
            'is_admin' => 'required|string',
        ]);

        if ($validator->fails()) {

            return back()->with('toast_error', 'Something Went Wrong');
        }


       $users = new User;

       $users->name = $request->name;
       $users->email = $request->email;
       $users->password = md5($request->name);
       $users->is_admin = $request->is_admin;
       $users->save();

       if($users){
        Alert::success('Created Successfully', 'Thank you');
        return redirect()->back()->with('User Created Successfully');
       }
       return redirect()->back()->with('User Created Failed');
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

        $users = User::find($id);

        if(!$users){
            return back()->with('error', 'Something went wrong');
        }
        $users->update($request->all());
        return back()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);

        if(!$users){
            return back()->with('error', 'Something went wrong');
        }
        Alert::success('Deleted Successfully', 'Thank you');
        $users->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
