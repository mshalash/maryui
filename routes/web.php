<?php

use Livewire\Volt\Volt;
use App\Livewire\PostIndex;
use App\Livewire\Test;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;

// Users will be redirected to this route if not logged in
Volt::route('/login', 'login')->name('login');

Volt::route('/register', 'register'); 

// Define the logout
Route::get('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
 
    return redirect('/');
});
Route::get('dashboard', Dashboard::class)
->middleware(['auth'])
->name('dashboard');

Route::get('posts', PostIndex::class)
->middleware(['auth'])
->name('posts-index');


Route::get('test', Test::class)
->middleware(['auth'])
->name('test');

// Protected routes here
Route::middleware('auth')->group(function () {
    Volt::route('/', 'users.index');
    Volt::route('/users', 'users.index');
    Volt::route('/users/create', 'users.create');
    Volt::route('/users/{user}/edit', 'users.edit');
    // ... more
});