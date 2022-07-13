<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHierachy extends Model
{
    use HasFactory;
    protected $table = 'user_hierachies';
    protected $fillable = ['user_type', 'description'];
}
