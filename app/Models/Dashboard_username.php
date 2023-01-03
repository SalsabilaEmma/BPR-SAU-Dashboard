<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard_username extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID',
        'CIF',
        'NoHP',
        'Password',
        'Tgl',
        'DateTime'
    ];
}
