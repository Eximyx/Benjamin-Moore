<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use App\Models\NewsPost;
use App\Models\Product;
use App\Services\Service;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $service;
    protected $model;
    public function __construct(Leads $leads)
    {
        $this->service = new Service;
        $this->model = $leads;
    }
    public function index()
    {
        $Products = Product::all();
        $Products =  $this->service->wrapper($Products,4);
        return view("user.main", ["NewsPost" => NewsPost::orderBy("created_at", "desc")->paginate(3), "Products" => $Products]);
    }

    public function leads(Request $request)
    {
        $validator_data = Leads::getModel()["validator_data"];
        $data = $this->service->store($request->validate([
            'id' => 'numeric|nullable',
            ...$validator_data
        ]), array_key_exists('main_image', $validator_data), $this->model);

        $id = $data['id'];
        unset($data['id']);

        $Entity = Leads::updateOrCreate(
            [
                'id' => $id
            ],
            $data
        );
        return Response()->json($Entity);
    }

}
