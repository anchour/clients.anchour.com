<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddsMailingListEntry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MailingListController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a listing of the existing mailing list entries.
     */
    public function getIndex()
    {
        return view('admin.mailing-list.index');
    }

    public function getNew()
    {
        return view('admin.mailing-list.new');
    }

    public function postNew(AddsMailingListEntry $request)
    {
        $name  = $request->get('name');
        $email = $request->get('email');

        DB::insert(
            'insert into mailing_list (name, email) values(?, ?)',
            [$name, $email]
        );
    }
}
