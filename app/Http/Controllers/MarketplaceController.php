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
        $marketplace = Marketplace::find($id);
        if(empty($marketplace))
        {
            return response()->json(['error' => 'Not Found'], 404);
        }

        return response()->json([$marketplace], 200);
    }
    
    public function addMarketplace(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['error' => $validator->errors()], 500);
        }

        $marketplace = Marketplace::create($request->all());

        return response()->json($marketplace, 200);
    }

    public function updateMarketplace(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['error' => $validator->errors()], 500);
        }

        $marketplace = Marketplace::find($id);

        if(empty($marketplace))
        {
            return response()->json(['error' => 'Not Found'], 404);
        }

        $request['id'] = $id;
        $marketplace->fill($request->all());
        $marketplace->save();

        return response()->json($marketplace, 200);
    }

    public function removeMarketplace($id)
    {
        $marketplace = Marketplace::find($id);

        if(empty($marketplace))
        {
            return response()->json(['error' => 'Not Found'], 404);
        }

        $marketplace->delete();
        return response()->json(['success' => true],200);
    }
}
