<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends BaseController
{
    public function index()
    {
        $data = User::getModel();
        $datatable_columns = $this->service->get_datatable_columns($data);
        $selectable = User::getRoles();
        if (request()->ajax()) {
            $Users = User::all();
            foreach ($Users as $User) {
                $User['role_id'] = $selectable[$User['role_id']]['title'];
            };
            return $this->service->create_datatable($Users)->make(true);
        }
        return view('layouts.datatable', compact('data','selectable','datatable_columns'));
    }

    // UserRequest
    public function store(Request $request)
    {
        if (Auth()->user()->id == $request['id']) {
            return response()->json('У тебя нет доступа!');
        }

        if ($request['id'] !== null) {
            if (!($request['password'] !== null)) {
                $request['password'] = User::where('id', $request['id'])->first()['password'];
            }
        }

        $data = $request->validate([
            'id' => 'nullable',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => ''
        ]);

        if ($data['id'] == Auth()->user()->id) {
            $data['role_id'] = 2;
        }

        $user = User::updateOrCreate(
            [
                'id' => $data['id']
            ],
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'role_id' => $data['role_id'],
                'password' => $data['password'],
            ]
        );

        return Response()->json($user);
    }

    public function edit(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        return Response()->json($user);
    }

    public function destroy(Request $request)
    {

        if (Auth()->user()->id == $request['id']) {
            return response()->json('У тебя нет доступа!');
        }
        $user = User::where('id', $request->id)->first();
        $user->delete();

        return Response()->json($user);
    }

}
