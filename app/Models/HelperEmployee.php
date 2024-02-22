<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelperEmployee extends Model
{
    use HasFactory;
    protected $fillable = ['nama','company','email','created_by','updated_by'];

    protected $table = 'employess_helper_test';
}
