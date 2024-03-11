<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Branch;
use App\Models\Particular;
use DB;

class BudgetReportController extends Controller
{
    public function partcularsByBranchReport(Request $request)
    {

        $particulars = Particular::select('id', 'name', 'active')
                            ->has('budgets')
                            ->where('active', true)
                            ->orderBy('name', 'asc')
                            ->get();


        $particular_budget = [];

        $year = $request->has('year') ? $request->year :  date("Y");

        foreach ($particulars as $key => $particular) 
        {
            if($particular->budgets->count() > 0)
            {
                $particular_budget[$particular->name] = $particular->budgets()
                        ->leftJoin('branches', 'budgets.branch_id', '=', 'branches.id')
                        ->select('branches.id', 'branches.name', 'budgets.created_at', DB::raw('SUM(amount) as total_amount'))
                        ->whereYear('budgets.created_at', $year)
                        ->groupBy('branches.id')
                        ->orderBy('branches.name', 'asc')
                        ->get();
            }
        }

        return response()->json($particular_budget);
    }
}
