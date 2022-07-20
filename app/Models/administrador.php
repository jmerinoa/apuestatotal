<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administrador extends Model
{
    use HasFactory;
    protected $table = 'promoter';
    protected $primaryKey = 'promoterId';
    public $timestamps = false;
    protected $fillable = [
        'nomPromoter',
        'email  ',
        'password'];
    protected $guarded = [];
}
