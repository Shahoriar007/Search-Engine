<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddKeyword extends Model
{
    use HasFactory;

    protected $fillable = [
        'keyword',
        'price',
        'quality',
        'bus_id'
    ];
}
