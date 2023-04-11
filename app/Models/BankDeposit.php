<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankDeposit extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }
    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id', 'id');
    }

    public function typeDeposit()
    {
        return $this->belongsTo(TypeDeposit::class, 'type_deposit_id', 'id');
    }
}
