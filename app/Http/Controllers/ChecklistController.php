<?php

namespace App\Http\Controllers;

use App\Checklist;
use Illuminate\Http\Request;
use Validator;

class ChecklistController extends Controller
{
    public function getAll()
    {
        return Checklist::all();
    }

    public function getById($id)
    {
        $checklist = new Checklist();
        $checklist = $checklist->find($id);

        if(empty($checklist))
        {
            return $this->responseNotFound();
        }

        return $this->responseSuccess($checklist);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if($validator->fails())
        {
            return $this->responseError(['error' => $validator->errors()]);
        }

        $checklist = new Checklist();
        $checklist->fill($request->all());
        $checklist->client_id = $request->user()->client->id;
        $checklist->save();
        return $this->responseSuccess($checklist);
    }

    public function update(Request $request, $id)
    {
        $checklist = Checklist::findOrFail($id);

        $checklist->fill($request->all());
        $checklist->save();

        return $this->responseSuccess($checklist);
    }

    public function delete($id)
    {
        $checklist = Checklist::findOrFail($id);
        $checklist->delete();

        return $this->responseSuccess(['Success' => 'Checklist removed']);
    }

    public function getProductsChecklist($id)
    {
        $checklist = Checklist::find($id)->products()->get();

        return $this->responseSuccess($checklist);
    }

    public function addProduct(Request $request, $id)
    {
        $ids = $request->all();
        $checklist = Checklist::findOrFail($id);

        if(!is_array($ids))
        {
            return $this->responseError(['error' => 'ids inválidos']);
        }

        $checklist->products()->attach($ids);

        return $this->responseSuccess(['Success' => 'Products added']);
    }

    public function removeProduct(Request $request, $id)
    {
        $ids = $request->all();
        $checklist = Checklist::findOrFail($id);

        if(!is_array($ids))
        {
            return $this->responseError(['error' => 'ids inválidos']);
        }

        $checklist->products()->detach($ids);

        return $this->responseSuccess(['Success' => 'Products removed']);
    }

}
