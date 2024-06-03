<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'outlet_id', 'image'];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
