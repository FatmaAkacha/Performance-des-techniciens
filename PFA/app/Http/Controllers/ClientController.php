<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function getClients()
    {
        return response()->json(Client::all(), 200);
    }

    public function getClientById($id)
    {
        $Client = Client::find($id);
        if(is_null($Client)){
            return response()->json(["message"=>"Client not found"],404);
        }
        return response()->json(Client::find($id), 200);
    }

    public function show($id)
    {
        $Client = Client::find($id);
        if ($Client) {
            return response()->json($Client, 200);
        } else {
            return response()->json(['error' => 'Client not found'], 404);
        }
    }

    public function index()
    {
        $Clients = Client::all();
        return view('Clients.index', compact('Clients'));
    }

    public function addClient(Request $request)
    {
        $Client = Client::create($request->all());
        return response($Client,201);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'adresse' => 'nullable|string|max:255',
            'numero_telephone' => 'nullable|string|max:15',
            'logo' => 'nullable|string|max:255',
        ]);

        $client = new Client();
        $client->nom = $request->nom;
        $client->email = $request->email;
        $client->adresse = $request->adresse;
        $client->numero_telephone = $request->numero_telephone;
        $client->logo = $request->logo;
        $client->save();

        return redirect()->route('Clients.index')->with('success', 'Client created successfully.');
    }

    public function updateClient(Request $request ,$id)
    {
        $Client = Client::find($id);
        if(is_null($Client))
        {
            return response()->json(['error' => 'Client not found'], 404);
        }
        $Client->update($request->all());
        return response($Client,200);
    }

    public function update(Request $request, Client $Client)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients,email,' . $client->id,
            'adresse' => 'nullable|string|max:255',
            'numero_telephone' => 'nullable|string|max:15',
            'logo' => 'nullable|string|max:255',
        ]);

        $client->nom = $request->nom;
        $client->email = $request->email;
        $client->adresse = $request->adresse;
        $client->numero_telephone = $request->numero_telephone;
        $client->logo = $request->logo;
        $client->save();

        return redirect()->route('Clients.index')->with('success', 'Client updated successfully.');
    }

    public function deleteClient(Client $Client,$id)
    {
        $Client = Client::find($id);
        if(is_null($Client))
        {
            return response()->json(['error' => 'Client not found'], 404);
        }
        $Client->delete();
        return response(null,204);
    }
}
