<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route:: get('/includeComponents', [SiteController:: class, 'index']);