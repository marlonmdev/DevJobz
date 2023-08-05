<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
     
    // use instead of $fillable if you allowed all the fields from the table to be change or if the table has too many fieldnames to write 
    protected $guarded = [];
    
    protected $table = 'applicants';
}
