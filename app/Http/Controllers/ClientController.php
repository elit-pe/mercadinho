<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    
    public function getAll()
    {
        return Client::all();
    }

    
    public function getById($id)
    {
        $client = Client::findOrFail($id);

        return $this->responseSuccess($client);
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $client->fill($request->all());
        $client->save();

        return $this->responseSuccess($client);
    }

}
