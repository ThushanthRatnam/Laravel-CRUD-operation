<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchStock extends Model
{
    use HasFactory;
    protected $table = 'branch_stocks';
    protected $fillable = ['user_id', 'product_id', 'branch_id', 'remaining_qty'];
}
