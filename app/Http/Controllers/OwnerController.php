<?php

namespace App\Http\Controllers;

use App\Owner;
use Illuminate\Http\Request;
use Validator;

class OwnerController extends Controller
{
    public function getAll()
    {
        return Owner::all();
    }

    public function getById($id)
    {
        $owner = new Owner();
        $owner = $owner->with('user')->find($id);

        if(empty($owner))
        {
            return $this->responseNotFound();
        }

        return $this->responseSuccess($owner);
    }

    public function update(Request $request, $id)
    {
        $owner = Owner::findOrFail($id);

        $owner->fill($request->all());
        $owner->save();

        return $this->responseSuccess($owner);
    }

}
