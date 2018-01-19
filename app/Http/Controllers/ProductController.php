<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    
    public function allProduct()
    {
        return Product::all();
    }

    public function getProduct($id)
    {
        $product = Product::find($id);
        if(empty($product))
        {
            return $this->responseNotFound();
        }

        return $this->responseSuccess($product);
    }
    
    public function addProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'product_id' => 'required'
        ]);

        if($validator->fails())
        {
            $this->responseError(['error' => $validator->errors()]);
        }

        $product = new Product();
        $product->fill($request->all());
        $product->save();

        return $this->responseSuccess($product);
    }

    public function updateProduct(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validator->fails())
        {
            $this->responseError(['error' => $validator->erros()]);
        }

        $product = Product::find($id);

        if(empty($product))
        {
            return $this->responseNotFound();
        }

        $request['id'] = $id;
        $product->fill($request->all());
        $product->save();

        return $this->responseSuccess($product);
    }

    public function removeProduct($id)
    {
        $product = Product::find($id);

        if(empty($product))
        {
            return $this->responseNotFound();
        }

        $product->delete();
        return $this->$this->responseSuccess();
    }
}
