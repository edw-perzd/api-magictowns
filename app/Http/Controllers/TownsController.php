<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Towns;
use Illuminate\Support\Facades\Validator;

class TownsController extends Controller
{
    public function index(){
        
        $towns = Towns::all();

        $data = [
            'status' => true,
            'info' => [
                'count' => $towns->count(),
                'pages' => '',
                'next' => '',
                'prev' => ''
            ],
            'results' => $towns
        ];
        return response()->json($data, 200);
    }

    public function show($id){
        $town = Towns::with('traditions')->find($id);
        if (!$town){
            $data = [
                'status' => false,
                'message' => 'Pueblo no encontrado'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'status' => true,
            'results' => $town
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'fundationDate' => 'required|date_format:Y-m-d',
            'declarationDate' => 'required|date_format:Y-m-d',
            'patronSaint' => 'required|min:3|max:50',
            'fairDate' => 'required|date_format:Y-m-d'
        ]);

        if ($validator->fails()){
            $data = [
                'status' => false,
                'message' => 'Existen errores de validación',
                'errors' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $town = Towns::create([
            'name_town' => $request->name,
            'fundationDate_town' => $request->fundationDate,
            'declarationDate_town' => $request->declarationDate,
            'patronSaint_town' => $request->patronSaint,
            'fairDate_town' => $request->fairDate,
        ]);

        if (!$town){
            $data = [
                'status' => false,
                'message' => 'No se pudo crear el pueblo'
            ];
            return response()->json($data, 500);
        }

        $data = [
            'status' => true,
            'message' => 'Pueblo creado',
            'town' => $town
        ];

        return response()->json($data, 201);
    }

    public function destroy($id){
        $town = Towns::find($id);
        $town->delete();

        $data = [
            'status' => true,
            'message' => 'Se eliminó el pueblo'
        ];
        return response()->json($data, 200);
    }
}
