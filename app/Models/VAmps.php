<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class VAmps extends Model
{
    use HasFactory;

    /**
     * fillable
     * 
     * @var array
     */
    protected $fillable = [
        'voltage',
        'current',
    ];
}
