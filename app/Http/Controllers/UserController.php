<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::select('id','name','department_id','designation_id','phone_number')->with('designation:id,name', 'department:id,name');
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhereHas('designation', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('department', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    });
            });
        }
        $data = $query->get();
        return response()->json($data);
    }
}
