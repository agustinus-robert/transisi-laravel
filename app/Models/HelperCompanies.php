<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelperCompanies extends Model
{
    use HasFactory;
    protected $fillable = ['nama','email','logo','website','created_by','updated_by'];

    protected $table = 'companies_helper_test';
}
