<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function index()
    {
        $userDetails = UserDetail::all();
        return response()->json($userDetails);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'direccion' => 'required|string',
                'telefono' => 'required|string',
            ]);

            $userDetail = new UserDetail();
            $userDetail->user_id = $request->input('user_id');
            $userDetail->direccion = $request->input('direccion');
            $userDetail->telefono = $request->input('telefono');
            $userDetail->save();

            return response()->json($userDetail, 201);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error'], 500);
        }
    }

    public function show(string $id)
    {
        $userDetail = UserDetail::findOrFail($id);
        return response()->json($userDetail);
    }

    public function update(Request $request, string $id)
    {
        try {
            $userDetail = UserDetail::findOrFail($id);

            $request->validate([
                'user_id' => 'required|exists:users,id',
                'direccion' => 'required|string',
                'telefono' => 'required|string',
            ]);

            $userDetail->user_id = $request->input('user_id');
            $userDetail->direccion = $request->input('direccion');
            $userDetail->telefono = $request->input('telefono');
            $userDetail->save();

            return response()->json($userDetail, 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error'], 500);
        }
    }

    public function destroy(string $id)
    {
        $userDetail = UserDetail::findOrFail($id);
        $userDetail->delete();

        return response()->json(['message' => 'Detalle de usuario eliminado'], 200);
    }
}
