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
        $checklist = $checklist->with('user')->find($id);

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
            'product_id' => 'required',
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

}
