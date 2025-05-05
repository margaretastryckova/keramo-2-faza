<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProductAdminController extends Controller
{
    public function create()
    {
        return view('admin_add_product');
    }
}

