<?php

namespace App\Http\Controllers\Api;

use App\Repositories\MailingListRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailingListController extends Controller {
    /**
     * @var MailingListRepository
     */
    private $repository;

    /**
     * MailingListController constructor.
     * @param MailingListRepository $repository
     */
    public function __construct(MailingListRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->all();
    }
}
