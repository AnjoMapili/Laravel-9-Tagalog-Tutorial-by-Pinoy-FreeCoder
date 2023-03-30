<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
// $fillable = means if may specific ka na i fi fill
    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    // ];
    // $guarded = means if lahat i fifill mo
    protected $guarded = [];
    use HasFactory;
}
