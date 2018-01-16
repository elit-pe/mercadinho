<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Validator;

class BrandController extends Controller
{

    public function getAll()
    {
        return Brand::all();
    }

    public function getById($id)
    {
        $brand = Brand::findOrFail($id);

        return $this->responseSuccess($brand);
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $brand->fill($request->all());
        $brand->save();

        return $this->responseSuccess($brand);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails())
        {
            return $this->responseError(['error' => $validator->erros()]);
        }

        $input = $request->all();
        $brand = new Brand();
        $brand->fill($input);
        $brand->save();

        return $this->responseSuccess($brand);
    }

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);

        $brand->delete();
        return $this->responseSuccess(['success'=> 'brand removed']);
    }
}
