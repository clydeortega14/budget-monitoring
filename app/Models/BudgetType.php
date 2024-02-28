<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetType extends Model
{
    use HasFactory;

    protected $table = 'budget_types';

    protected $fillable = ['name', 'active'];

    public function budgets()
    {
        return $this->hasMany(Budget::class, 'budget_type_id');
    }
}
