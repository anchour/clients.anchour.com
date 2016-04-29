<?php

class CustomerCanCreateAccountTest extends TestCase {

    /** @test */
    public function form_shows_on_customer_new_page()
    {
        // Form details
        $name      = 'Customer Name';
        $email     = 'customer@email.com';
        $phone     = '2075555555';
        $ccNumber  = '4242424242424242';
        $cvc       = '424';
        $ccExpMonth = date('m');
        $ccExpYear = date('Y') + 2;

        $this->visit('/customer/new')
            ->see('Create your account')
            ->type($name, 'name')
            ->type($email, 'email')
            ->type($phone, 'phone')
            ->type($ccNumber, 'cc-number')
            ->type($cvc, 'cc-cvc')
            ->select($ccExpMonth, 'cc-exp-month')
            ->select($ccExpYear, 'cc-exp-year')
            ->submitForm('Submit');

        $this->seePageIs('/customer/details')
            ->see('Thanks!')
            ->see($name)
            ->see($email)
            ->see($phone);
    }
}
