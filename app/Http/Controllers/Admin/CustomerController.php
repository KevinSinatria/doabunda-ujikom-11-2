<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('pages.admin.customer-users.index');
    }

    public function create()
    {
        return view('pages.admin.customer-users.create');
    }

    public function edit($record)
    {
        return view('pages.admin.customer-users.edit', compact('record'));
    }
}
