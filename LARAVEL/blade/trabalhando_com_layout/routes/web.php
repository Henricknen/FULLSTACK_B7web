<?php

use App\Http\Controllers\LayoutController;
use Illuminate\Support\Facades\Route;

Route:: get('/layout', [LayoutController:: class, 'layout']);
Route:: get('/layout2', [LayoutController:: class, 'layout2']);

