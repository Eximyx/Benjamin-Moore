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
            $entities = User::all();
            foreach ($entities as $entity) {
                $entity['role_id'] = $selectable[$entity['role_id']]['title'];
            };
            return $this->service->create_datatable($entities)->make(true);
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

        $entity = User::updateOrCreate(
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

        return Response()->json($entity);
    }

    public function edit(Request $request)
    {
        $entity = User::where('id', $request->id)->first();

        return Response()->json($entity);
    }

    public function destroy(Request $request)
    {

        if (Auth()->user()->id == $request['id']) {
            return response()->json('У тебя нет доступа!');
        }
        $entity = User::where('id', $request->id)->first()->delete;

        return Response()->json($entity);
    }

}
