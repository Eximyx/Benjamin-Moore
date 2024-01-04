<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use App\Models\NewsPost;
use App\Models\Product;
use App\Services\Service;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct(Leads $leads)
    {
        $this->service = new Service;
        $this->model = $leads;
    }
    public function index()
    {
        $Products = Product::all();
        $List = [];
        for ( $i = 0; $i < 5; $i++ ) {
            $List[$i] = [];
            for ($j = 0; $j < 4; $j++ ) {  
                $List[$i][] = $Products[$i*4+$j];
            }
        }
        return view("user.main", ["NewsPost" => NewsPost::orderBy("created_at", "desc")->paginate(3), "Products" => $List]);
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
