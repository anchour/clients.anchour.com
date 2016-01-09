<?php namespace App\Repositories;

use DB;

class MailingListRepository {

    /**
     * @var DB
     */
    protected $db;

    /**
     * MailingListRepository constructor.
     */
    public function __construct()
    {
        $this->db = app()->make('db');
    }

    public function insert($name, $email)
    {
        DB::insert(
            'insert into mailing_list (name, email) values(?, ?)',
            [$name, $email]
        );
    }

    /**
     * @param $email
     * @return bool|mixed|static
     */
    public function get($email)
    {
        $data = $this->db
            ->table('mailing_list')
            ->where('email', $email)
            ->first();

        if (! $data) {
            return false;
        }

        return $data;
    }
}