<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use function Symfony\Component\Debug\Tests\testHeader;

class AccountController extends Controller
{
    public function index()
    {
        $income = Entry::where('type', "INCOME")
            ->select([
                'type',
                DB::raw("SUM(amount) as total_income")
            ])->groupBy('type')->get()->toArray();
        $cost = Entry::where('type', "COST")
            ->select([
                'type',
                DB::raw("SUM(amount) as total_cost")
            ])->groupBy('type')->get()->toArray();
        $income = empty($income) ? 0 : $income[0]['total_income'];
        $cost = empty($cost) ? 0 : $cost[0]['total_cost'];
        $currentBalance = $income - $cost;
        return view('dashboard')->with([
            "currentBalance" => $currentBalance
        ]);
    }

    public function entry()
    {
        return view('entry');
    }

    public function entryAjax(Request $request)
    {
        $balInfo = Entry::select([
            'type',
            DB::raw('Date(created_at) as date'),
            DB::raw("case `type` when 'INCOME' then SUM(amount) when 'COST' then SUM(-amount) end as balance")

        ])->groupBy(DB::raw('Date(created_at)'), 'type')->get()->toArray();

        return response([
            "balInfo" => $balInfo
        ]);
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
