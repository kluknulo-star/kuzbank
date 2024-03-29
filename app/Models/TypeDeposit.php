<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeDeposit extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;

    public function bankDeposits()
    {
        return $this->hasMany(BankDeposit::class, 'type_deposit_id', 'id');
    }
}
