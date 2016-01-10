<?php namespace App\Repositories;

use DB;

class MailingListRepository {

    /**
     * @var DB
     */
    protected $db;

    /**
     * Insert the row into the database.
     *
     * @param $name
     * @param $email
     * @return bool
     */
    public function insert($name, $email)
    {
        $data = app()->make('db')->insert(
            'insert into mailing_list (name, email) values(?, ?)',
            [$name, $email]
        );

        return $data;
    }

    /**
     * @param $email
     * @return bool|mixed|static
     */
    public function get($email)
    {
        $data = app()->make('db')
            ->table('mailing_list')
            ->where('email', $email)
            ->first();

        if (! $data) {
            return false;
        }

        return $data;
    }

    /**
     * Get all the entries from the mailing list table.
     *
     * @return array|bool
     */
    public function all()
    {
        $data = app()->make('db')->table('mailing_list')->get();

        return collect($data);
    }
}