<?php
namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;
use Carbon\Carbon;


class MissionController extends Controller
{
    public function getMission()
    {
        return response()->json(Mission::all(), 200);
    }

    public function getMissionById($id)
    {
        $mission = Mission::find($id);
        if (is_null($mission)) {
            return response()->json(["message" => "Mission not found"], 404);
        }
        return response()->json($mission, 200);
    }

    public function addMission(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'nombre_installation' => 'required|integer',
            'type_installation' => 'required|string',
            'status' => 'required|string|in:encour,affecter,terminer'
        ]);
    
        $mission = new Mission();
        $mission->id_user = $request->id_user;
        $mission->date_debut = Carbon::parse($request->date_debut)->format('Y-m-d H:i:s');
        $mission->date_fin = Carbon::parse($request->date_fin)->format('Y-m-d H:i:s');
        $mission->nombre_installation = $request->nombre_installation;
        $mission->type_installation = $request->type_installation;
        $mission->status = $request->status;
        $mission->save();
    
        return response()->json($mission, 201);
    }

    public function updateMission(Request $request, $id)
    {
        $mission = Mission::find($id);
        if (is_null($mission)) {
            return response()->json(['error' => 'Mission not found'], 404);
        }

        $mission->update($request->all());
        return response()->json($mission, 200);
    }

    public function deleteMission($id)
    {
        $mission = Mission::find($id);
        if (is_null($mission)) {
            return response()->json(['error' => 'Mission not found'], 404);
        }

        $mission->delete();
        return response(null, 204);
    }
}
