<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class player extends Model
{
    use HasFactory;
    protected $table = 'player';
    protected $primaryKey = 'playerId';
    public $timestamps = false;
    protected $fillable = [
        'nomPlayer',
        'email',
        'password'];
    protected $guarded = [];
}
