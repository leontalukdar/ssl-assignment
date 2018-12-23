<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function entry()
    {
        return view('entry');
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'amount' => 'required',
            'type' => 'required',
        ]);
        if ($validation->fails()) {
            return response([
                'errors' => $validation->errors()
            ], 400);
        }

        try{
            Entry::create([
                "amount" => $request->amount,
                "description" => $request->description,
                "type" => $request->type == 1 ? "INCOME": "COST"
            ]);
        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return response([
                'errors' => $e->getMessage()
            ], 500);
        }

        return response([
            "status" => "success"
        ], 200);
    }
}
