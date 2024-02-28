<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurposeType extends Model
{
    use HasFactory;

    protected $table = 'purpose_types';

    protected $fillable = ['name', 'active'];

    public function budgets()
    {
        return $this->hasMany(Budget::class, 'purpose_type_id');
    }
}
