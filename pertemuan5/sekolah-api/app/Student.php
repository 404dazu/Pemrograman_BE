<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = ['nama', 'nim','email','jurusan'];

   // static function getAllstudents(){
     //   $students = DB::select('select * from students');
      //  return $students;
    //}
}
