<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function getMission()
    {
        return response()->json(Mission::all(), 200);
    }

    public function getMissionById($id)
    {
        $mission = Mission::find($id);
        if(is_null($mission)){
            return response()->json(["message"=>"Mission not found"],404);
        }
        return response()->json(Mission::find($id), 200);
    }

    public function show($id)
    {
        $mission = Mission::find($id);
        if ($mission) {
            return response()->json($mission, 200);
        } else {
            return response()->json(['error' => 'mission not found'], 404);
        }
    }

    public function index()
    {
        $missions = Mission::all();
        return view('missions.index', compact('missions'));
    }

    public function addMission(Request $request)
    {
        $mission = Mission::create($request->all());
        return response($mission,201);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'nombre_installation' => 'required|integer',
            'type_installation' => 'required|string|in:pro resto,pro pat,pro mag',
        ]);

        $mission = new Mission();
        $mission->id_user = $request->id_user;
        $mission->date_debut = $request->date_debut;
        $mission->date_fin = $request->date_fin;
        $mission->nombre_installation = $request->nombre_installation;
        $mission->moyen = $request->nombre_installation / $request->nombre_heure; // Assuming nombre_heure is a field in your form
        $mission->type_installation = $request->type_installation;
        $mission->save();

        return redirect()->route('missions.index')->with('success', 'Mission created successfully.');
    }

    public function update(Request $request, Mission $mission)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'nombre_installation' => 'required|integer',
            'type_installation' => 'required|string|in:pro resto,pro pat,pro mag',
        ]);

        $mission->id_user = $request->id_user;
        $mission->date_debut = $request->date_debut;
        $mission->date_fin = $request->date_fin;
        $mission->nombre_installation = $request->nombre_installation;
        $mission->moyen = $request->nombre_installation / $request->nombre_heure; // Assuming nombre_heure is a field in your form
        $mission->type_installation = $request->type_installation;
        $mission->save();

        return redirect()->route('missions.index')->with('success', 'Mission updated successfully.');
    }

    public function deleteMission(Mission $mission,$id)
    {
        $mission = Mission::find($id);
        if(is_null($mission))
        {
            return response()->json(['error' => 'Mission not found'], 404);
        }
        $mission->delete();
        return response(null,204);
    }
}
