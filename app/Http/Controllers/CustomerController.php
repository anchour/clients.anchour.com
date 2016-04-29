<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CustomerController extends Controller
{
    public function create()
    {
        return view('customer.new');
    }

    public function store(Request $request)
    {
        return redirect('/customer/details');
    }

    public function show()
    {
        return view('customer.details');
    }

}
