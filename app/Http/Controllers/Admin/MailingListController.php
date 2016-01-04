<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddsMailingListEntry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailingListController extends Controller
{
    public function create()
    {
        return view('admin.mailing-list.create');
    }

    public function store(AddsMailingListEntry $request)
    {
        // logic goes here.
    }
}
