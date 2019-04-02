<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Middleware\CheckUserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class BaseAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckUserType::class);
    }
}
