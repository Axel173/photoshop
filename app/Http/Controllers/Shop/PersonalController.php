<?php

namespace App\Http\Controllers\Shop;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        dd(__METHOD__, Auth::user());
    }
}
