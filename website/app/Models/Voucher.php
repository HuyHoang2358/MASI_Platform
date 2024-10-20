<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    // Khai bao tên table tương ứng
    protected $table ='vouchers';
    protected $fillable = ['name','code','visibility', 'image', 'discount_amount', 'type', 'quantity', 'in_stock', 'description',];
    // php artisan make:model Voucher -mf (m migration f factory)

}
