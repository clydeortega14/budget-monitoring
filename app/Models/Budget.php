<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;


    protected $table = 'budgets';

    protected $fillable = [

        'id',
        'process_id',
        'particular_id',
        'branch_id',
        'category_id',
        'budget_type_id',
        'purpose_type_id',
        'amount',
        'remarks'
    ];

    public function particular()
    {
        return $this->belongsTo(Particular::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function budgetType()
    {
        return $this->belongsTo(BudgetType::class);
    }
    public function purposeType()
    {
        return $this->belongsTo(PurposeType::class);
    }
    
}
