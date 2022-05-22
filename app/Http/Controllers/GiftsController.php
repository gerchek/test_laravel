<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gifts;

class GiftsController extends Controller
{
    //
    public function index()
    {
        $Gifts = Gifts::where('parent_id', '=', null)->with('child')->get();
        return response()->json($Gifts);
    }

    public function store(Request $request)
    {
        $Gifts = new Gifts;
        $Gifts->name = $request->name;
        $Gifts->user_id = $request->user_id;
        $Gifts->parent_id = $request->parent_id;
        $Gifts->save();
        return response()->json([
            "message" => "Gifts Added."
        ], 201);
    }

    public function show($id)
    {
        $Gifts = Gifts::find($id);
        if(!empty($Gifts))
        {
            return response()->json($Gifts);
        }
        else
        {
            return response()->json([
                "message" => "Gifts not found"
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Gifts::where('id', $id)->exists()) {
            $book = Gifts::find($id);
            $book->delete();

            return response()->json([
              "message" => "records deleted."
            ], 202);
        } else {
            return response()->json([
              "message" => "book not found."
            ], 404);
        }
    }
}
