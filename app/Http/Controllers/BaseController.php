<?php

namespace App\Http\Controllers;

use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


abstract class BaseController extends Controller
{
    public function __construct(Model $model)
    {
        $this->service = new Service;
        $this->model = $model;
    }
    public function index()
    {
        $data = $this->model::getModel();
        if (isset($data['selectable'])) {
            $selectableModel = $data['selectable'];
            $selectable = $selectableModel::All();
            foreach ($data["form_data"] as $key => $value) {
                if (strPos($key, "_id")) {
                    $selectable_id = $key;
                    break;
                }
            }
        }
        $datatable_columns = $this->service->get_datatable_columns($data);

        if (request()->ajax()) {
            $Entities = $this->model::all();
            if (isset($selectable_id)) {
                foreach ($Entities as $Entity) {
                    $Entity[$selectable_id] = $selectableModel::find($Entity[$selectable_id])->title;
                }
            }
            $table = $this->service->create_datatable($Entities);
            return $table->make(true);
        }
        $variables = ['data', 'datatable_columns'];
        if (isset($data['selectable'])) {
            $variables[''] = 'selectable';  
        }
        return view('layouts.datatable', compact([...$variables]));
    }

    public function store(Request $request)
    {

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

    public function edit(Request $request)
    {
        $Entity = $this->model::where('id', $request->id)->first();
        return Response()->json($Entity);
    }

    public function destroy(Request $request)
    {
        $Entity = $this->model::where('id', $request->id)->first();

        if (isset($Entity['main_image'])) {
            $this->service->delete_image($Entity);
        }
        $Entity->delete();
        return Response()->json($Entity);
    }

    public function toggle(Request $request)
    {
        $Entity = $this->model::where('id', $request->id)->first();
        if (isset($Entity['is_toggled'])) {
            $Entity = $this->service->toggle($Entity)->save();
            return Response()->json($Entity);
        } else {
            return response()->json('This functiion is not allowed for this model!');
        }
    }
}
