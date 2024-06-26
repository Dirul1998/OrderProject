<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'phone'];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
