<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {

    /**
     * Get the dashboard view.
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }
}
