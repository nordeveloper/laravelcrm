<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
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
        $result = User::paginate(20);
        // dump($result);
        return view('user.index',['result'=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::all();
        // return view('users.add', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|max:255',
            'passord'=>'required|max:255'
        ]);
        

        $data = new User();

        if($request->active==1){$data->active=1;}else{$data->active=0;}
        if(!$request->sort){$data->sort = 500;}else{$data->sort = $request->sort;}

        $data->name = $request->name;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->second_name = $request->second_name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $request->validate([
            'password'=>'required|confirmed|min:6'      
        ]);        

        $data->password = Hash::make($request->password);
        
        $data->save();

        $user = User::where('email', '=', $request->email)->first();
        $user_role = new UserRole();
        $user_role->user_id = $user['id'];
        $user_role->role_id = $request->role_id;
        $user_role->save();
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::all();
        return view('user.edit', ['result'=>$user, 'roles'=>$roles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $roles = Role::all();

        // $user_roles = UserRole::where(['user_id'=>$user->id])->get();

        // foreach($user_roles as $userRole){
        //     $arUserRoles[] = $userRole->role_id;
        // }

        return view('user.edit', ['result'=>$user]);
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

        $request->validate([
            'email' => 'required|max:255'
        ]);

        $data = User::find($id);

        if( $request->file('image') ){
            $image = $request->file('image')->store('upload', 'public');
            $data->image = $image;
        }

        // if($request->active==1){$data->active=1;}else{$data->active=0;}
        // if(!$request->sort){$data->sort = 500;}else{$data->sort = $request->sort;}
        
        $data->name = $request->name;
        $data->last_name = $request->last_name;
        $data->second_name = $request->second_name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if( !empty($request->password) ){
            $request->validate([
                'password'=>'required|confirmed|min:6'      
            ]);
            $data->password = Hash::make($request->password);
        }
        
        $data->save();

        // if( !empty($request->role_id) ){
        //     $user_role = new UserRole();
        //     $user_role->user_id = $id;
        //     $user_role->role_id = $request->role_id;
        //     $user_role->save();
        // }

        return redirect('/user')->with('status', 'Profile successfly updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('user.index');
    }
}
