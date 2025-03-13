<?php

use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;


// Product Categories (Route Prefix)
route::get('/', function(){
    return view('welcome');
});
route::get('/level', [LevelController::class, 'index']);
