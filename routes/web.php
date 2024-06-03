<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Models\Outlet;
use App\Models\Menu;
use App\Models\Order;

Route::get('/', function () {
    $menus = Menu::all();
    return view('homepage', compact('menus'));
});
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/dashboard', function () {
    $totalOutlets = Outlet::count();
    $totalMenus = Menu::count();
    $totalOrders = Order::count();

    return view('dashboard', compact('totalOutlets', 'totalMenus', 'totalOrders'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Outlet
    Route::get('/outlets', [OutletController::class, 'index'])->name('outlets.index');
    Route::get('/outlets/create', [OutletController::class, 'create'])->name('outlets.create');
    Route::get('/outlet/statistics', [OutletController::class, 'outletStatistics'])->name('outlet.statistics');
    Route::post('/outlets', [OutletController::class, 'store'])->name('outlets.store');
    Route::get('/outlets/{id}', [OutletController::class, 'show'])->name('outlets.show');
    Route::get('/outlets/{id}/edit', [OutletController::class, 'edit'])->name('outlets.edit');
    Route::patch('/outlets/{id}', [OutletController::class, 'update'])->name('outlets.update');
    Route::delete('/outlets/{id}', [OutletController::class, 'destroy'])->name('outlets.destroy');

    // Menu
    Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
    Route::get('/menus/create', [MenuController::class, 'create'])->name('menus.create');
    Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');
    Route::get('/menus/{id}', [MenuController::class, 'show'])->name('menus.show');
    Route::get('/menus/{id}/edit', [MenuController::class, 'edit'])->name('menus.edit');
    Route::patch('/menus/{id}', [MenuController::class, 'update'])->name('menus.update');
    Route::delete('/menus/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');

    // Order
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::patch('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    });

require __DIR__.'/auth.php';
