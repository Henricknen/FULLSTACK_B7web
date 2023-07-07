<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route:: get('/variacoes', [SiteController:: class, 'index']);