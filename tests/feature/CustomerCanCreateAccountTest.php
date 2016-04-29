<?php

class CustomerCanCreateAccountTest extends TestCase {

    /**
     * Submit the new customer form.
     *
     * @param $details
     * @return $this
     */
    private function submitNewCustomerForm($details)
    {
        $this->visit('/customer/new')
            ->see('Create your account')
            ->type($details['name'], 'name')
            ->type($details['email'], 'email')
            ->type($details['phone'], 'phone')
            ->type($details['ccNumber'], 'cc-number')
            ->type($details['cvc'], 'cc-cvc')
            ->select($details['ccExpMonth'], 'cc-exp-month')
            ->select($details['ccExpYear'], 'cc-exp-year')
            ->submitForm('Submit');

        return $this;
    }

    /**
     * Check that the details page shows the customer's details
     * that were submitted to the database.
     *
     * @test
     */
    public function form_shows_on_customer_new_page()
    {
        $details = [
            'name'       => 'Customer Name',
            'email'      => 'customer@email.com',
            'phone'      => '2075555555',
            'ccNumber'   => '4242424242424242',
            'cvc'        => '424',
            'ccExpMonth' => date('m'),
            'ccExpYear'  => date('Y') + 2,
        ];

        $this->submitNewCustomerForm($details)
            ->seePageIs('/customer/details')
            ->see('Thanks!')
            ->see($details['name'])
            ->see($details['email'])
            ->see($details['phone']);
    }
}
