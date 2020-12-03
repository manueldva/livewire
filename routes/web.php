<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ClientComponent;
use App\Http\Livewire\Reasoncomponent;
use App\Http\Livewire\Home;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Home::class);

Route::get('clients', ClientComponent::class);
Route::get('reasons', Reasoncomponent::class);

//Route::get('posts', PostComponet::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/', Home::class);
