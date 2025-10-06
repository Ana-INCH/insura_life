<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFuneralHome extends Model
{
    use HasFactory;

    protected $table = 'user_funeral_home';

    protected $fillable = [
        'user_id',
        'funeral_home_id',
    ];
}

