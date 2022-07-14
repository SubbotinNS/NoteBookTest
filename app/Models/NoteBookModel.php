<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteBookModel extends Model
{
    protected $table = "notebooktable";
    public $timestamps=false;
    protected $fillable = [
      'id',
      'full_name',
      'company',
      'tel_number',
      'email',
      'birth_date',
      'photo'
    ];
    use HasFactory;
}
