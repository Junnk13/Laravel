<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Sourses extends Model
{
    use HasFactory;

    protected $table = 'sourses';
    protected $fillable = [
        'user_name',
        'user_email',
        'url',
    ];
}
