<?php

class HelpersTest extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $interval    = 2;
        $currentYear = date('Y');

        $range       = cc_year_range($interval);

        $this->assertEquals($range, range($currentYear, ($currentYear + 2)));
    }
}
