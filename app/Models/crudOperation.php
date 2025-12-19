<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrudOperation extends Model
{
    use HasFactory;

    protected $table = 'crud_operation';

    protected $fillable = ['name', 'email', 'phone',];
}
