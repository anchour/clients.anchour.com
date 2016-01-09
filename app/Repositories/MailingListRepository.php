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

    public function get($email)
    {
        $data = DB::table('mailing_list')->where('email', $email)->first();

        if (! $data) {
            return;
        }

        return $data;
    }
}