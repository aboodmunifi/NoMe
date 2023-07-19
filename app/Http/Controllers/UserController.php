<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.page.user.index',compact('users',$users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('errors.404');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('errors.404');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('errors.404');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::findOrFail($id);
        return view('admin.page.user.edit',compact('user',$user));
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
        // return $request->role;

        $password ='';
        if($request->password == NULL){
            $user=user::find($id);
            $password=$user->password;
        }else{
            $password= Hash::make($request->password);
        }



        $user=user::find($id);
        $user->name=$request->name;
        $user->password=$password;
        $user->role=$request->role;
        $user->save();

      

        return redirect()->route('admin.users.index')->with('success' , 'تم تعديل بيانات المستخدم بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('delete' , 'تم حذف مستخدم بنجاح');
    }
}
