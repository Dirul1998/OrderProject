<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu_id',
        'quantity',
        'customer_name',
        'outlet_id',
        'total_price',
        'status'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
