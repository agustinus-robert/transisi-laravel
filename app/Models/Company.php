<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
     protected $fillable = ['nama','email','logo','website','created_by','updated_by'];

    protected $table = 'companies';

}
