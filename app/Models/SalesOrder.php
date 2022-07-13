<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;
    protected $table = 'sales_orders';
    protected $fillable = ['invoice_no', 'customer_name', 'customer_mobile', 'qty','user_id', 'product_id','total'];
}
