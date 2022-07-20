<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registro extends Model
{
    use HasFactory;
    protected $table = 'registers';
    protected $primaryKey = 'registerId';
    public $timestamps = false;
    protected $fillable = [
        'promoterId',
        'medio',
        'playerId',
        'voucher',
        'banco',
        'monto',
        'horaFechaRegister_at',
        'horaFechaRegisterdate_up'
    ];
    protected $guarded = [];
}
