<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddBusiness extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'short_des',
        'link_of'
    ];
}
