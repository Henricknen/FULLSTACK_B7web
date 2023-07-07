<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route:: get('/componets', [SiteController:: class, 'componets']);