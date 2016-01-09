<?php namespace App\Repositories;

use DB;

class MailingListRepository {
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
        $data = app()->make('db')
            ->table('mailing_list')
            ->where('email', $email)
            ->first();

        if (! $data) {
            return false;
        }

        return $data;
    }
}