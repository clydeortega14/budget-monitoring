<?php

namespace App\Http\Traits\BudgetMonitoring;
use App\Models\Budget;

trait BudgetTraits
{

	public function budgetQuery()
	{
		return Budget::select(
                'id', 
                'process_id',
                'particular_id',
                'branch_id',
                'category_id',
                'budget_type_id',
                'purpose_type_id',
                'amount',
                'remarks',
                'created_at'
            )
            ->orderBy('created_at', 'desc')
            ->with([
                'particular' => function($query){
                    return $query->select('id', 'name');
                },
                'branch' => function($query){
                    return $query->select('id', 'name');
                }, 
                'category' => function($query){
                    return $query->select('id', 'name');
                },
                'budgetType' => function($query){
                    return $query->select('id', 'name');
                },
                'purposeType' => function($query)
                {
                    return $query->select('id', 'name');
                }
            ]);
	}
}