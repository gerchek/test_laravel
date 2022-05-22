<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $user = User::with('gifts')->get();
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return response()->json([
            "message" => "User Added."
        ], 201);
    }

    public function show($id)
    {
        $user = User::find($id);
        if(!empty($user))
        {
            return response()->json($user);
        }
        else
        {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }

    

    // public function destroy($id)
    // {
    //     if(Books::where('id', $id)->exists()) {
    //         $book = Books::find($id);
    //         $book->delete();

    //         return response()->json([
    //           "message" => "records deleted."
    //         ], 202);
    //     } else {
    //         return response()->json([
    //           "message" => "book not found."
    //         ], 404);
    //     }
    // }
}
