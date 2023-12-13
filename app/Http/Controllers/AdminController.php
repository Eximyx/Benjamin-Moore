<?php

namespace App\Http\Controllers;

// TODO REQUEST Admin EXIMYX

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class AdminController extends BaseController
{
    public function index()
    {
        $roles = User::getRoles();

        if (request()->ajax()) {
            $Users = User::all();

            foreach ($Users as $User) {
                $User['role'] = $roles[$User['role']];
            }
            ;
            return $this->service->create_datatable($Users)->make(true);
        }
        return view('user.index', compact('roles'));
    }

    // UserRequest
    public function store(UserRequest $request)
    {
        // $data = ; 
        // Validator::make($request->all(), [
        //     'id' => 'nullable',
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     'role' => ''
        // ])->validate();
        $request->validated();
        // response()->json($data);
        return response()->json($request->all());
        if ($request->id !== null){ 
            if(!($data['password'] !== null)) {
                $data['password'] = User::where('id',$data['id'])->first()['password'];
            }     
        }
        // $data->validate();


        if($data['id'] == Auth()->user()->id) {
            $data['role'] = 2;
        }

        $user = User::updateOrCreate(
            [
                'id' => $data['id']
            ],
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'role' => $data['role'],
                'password' => $data['password'],
            ]
        );

        return Response()->json($user);
    }

    public function edit(Request $request)
    {
        if (Auth()->user()->id == $request->id);
        {
            return response()->json(['ERROR'=>'U R FUCKING IDIOT!']);
        }
        $user = User::where('id', $request->id)->first();
        
        return Response()->json($user);
    }

    public function destroy(Request $request)
    {
        if (Auth()->user()->id == $request->id);
        {
            return response()->json(['ERROR'=>'U R FUCKING IDIOT!']);
        }

        $user = User::where('id', $request->id)->first();

        $user->delete();

        return Response()->json($user);
    }

}
