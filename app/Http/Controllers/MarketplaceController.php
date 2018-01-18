<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marketplace;
use Validator;

class MarketplaceController extends Controller
{
    public function allMarketplace()
    {
        return Marketplace::all();
    }

    public function getMarketplace($id)
    {
        $marketplace = Marketplace::with('owner')->findOrFail($id);

        return $this->responseSuccess($marketplace);

    }
    
    public function addMarketplace(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'owner_id' => 'required'
        ]);

        if($validator->fails())
        {
            return $this->responseError(['error' => $validator->errors()]);
        }

        $marketplace = new Marketplace();
        $marketplace->fill($request->all());
        $marketplace->save();

        return $this->responseSuccess($marketplace);

    }

    public function updateMarketplace(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'owner_id' => 'required'
        ]);

        if($validator->fails())
        {
            $this->responseError(['error' => $validator->errors()]);
        }

        $marketplace = Marketplace::findOrFail($id);


        $request['id'] = $id;
        $marketplace->fill($request->all());
        $marketplace->save();

        return $this->responseSuccess($marketplace);
    }

    public function removeMarketplace($id)
    {
        $marketplace = Marketplace::findOrFail($id);

        $marketplace->delete();
        return $this->responseSuccess(['success' => true]);
    }
}
