<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Http\Requests\StoreBudgetRequest;
use App\Http\Resources\BudgetResource;
use App\Models\Branch;
use App\Models\Particular;
use App\Models\Category;
use App\Models\BudgetType;
use App\Models\PurposeType;
use App\Http\Traits\BudgetMonitoring\BudgetTraits;

class BudgetController extends Controller
{
    use BudgetTraits;

    public function index()
    {
        $budgets = $this->budgetQuery()->get();

        return response()->json([
            'error' => false,
            'message' => 'budget lists',
            'data' => BudgetResource::collection($budgets)
        ], 200);
    }

    public function store(StoreBudgetRequest $request)
    {  
        // validate request
        $validated = $request->validated();

        $branch = Branch::firstOrCreate(['name' => $request->branch]);
        $category = Category::firstOrCreate(['name' => $request->category]);
        $particular = Particular::firstOrCreate(['name' => $request->particular]);
        $budget_type = BudgetType::firstOrCreate(['name' => $request->type_of_budget]);
        $purpose_type = PurposeType::firstOrCreate(['name' => $request->purpose]);

        $budget = Budget::where('process_id', $request->process_id)->first();

        if(is_null($budget)) $budget = new Budget;

        $budget->process_id = $request->process_id;
        $budget->branch_id = $branch->id;
        $budget->category_id = $category->id;
        $budget->budget_type_id = $budget_type->id;
        $budget->particular_id = $particular->id;
        $budget->purpose_type_id = $purpose_type->id;
        $budget->amount = $request->amount;
        $budget->remarks = $request->remarks;
        $budget->save();


        return response()->json([

            'error' => false,
            'message' => 'Successfully Created!',
            'data' => new BudgetResource($budget)
        ], 200);
    }
}
