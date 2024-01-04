<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view("user.main",["NewsPost"=> NewsPost::orderBy("created_at","desc")->paginate(3),"Products"=>Product::all()]);
    }

    public function leads(Request $request){
        $validator_data = $this->model::getModel()["validator_data"];

        $data = $this->service->store($request->validate([
            'id' => 'numeric|nullable',
            ...$validator_data
        ]), array_key_exists('main_image', $validator_data),$this->model);
        $id = $data['id'];
        unset($data['id']);

        $Entity = $this->model::updateOrCreate(
            [
                'id' => $id
            ],
            $data
        );
        return Response()->json($Entity);
    }

}
