<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Particular extends Model
{
    use HasFactory;


    protected $table = 'particulars';

    protected $fillable = ['name', 'active'];

    public function budgets()
    {
        return $this->hasMany(Budget::class, 'particular_id');
    }
}
