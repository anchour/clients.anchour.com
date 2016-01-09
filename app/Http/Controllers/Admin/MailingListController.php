<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddsMailingListEntry;
use App\Repositories\MailingListRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class MailingListController extends Controller {
    /**
     * @var MailingListRepository
     */
    private $repository;

    public function __construct(MailingListRepository $repository)
    {
        $this->middleware('auth');

        $this->repository = $repository;
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

        $this->repository->insert($name, $email);

        return Redirect::route('admin.mailing-list.index');
    }
}
