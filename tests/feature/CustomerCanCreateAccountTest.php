<?php

class CustomerCanCreateAccountTest extends TestCase {

    /** @test */
    public function form_shows_on_customer_new_page()
    {
        $this->visit('/customer/new')
            ->see('Create your account')
            ->type('Customer Name', 'name')
            ->type('customer@email.com', 'email')
            ->type('2075555555', 'phone')
            ->type('4242424242424242', 'cc_num')
            ->type('424', 'cc_cvc')
            ->select(date('m'), 'cc_exp_month')
            ->select(date('Y') + 2, 'cc_exp_year')
            ->press('Submit');
    }
}
