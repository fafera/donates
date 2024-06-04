<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/myroute', function() {
    $items = \App\Models\Item::all();
	$data = (new(\App\Models\Setting::class))->getAllSettings();
	return view('myroute',['items' => $items, 'data' => $data]);
});