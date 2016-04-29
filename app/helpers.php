<?php


if (! function_exists('cc_year_range')) {
    /**
     * Years function. Return a range of the current year, up to the range provided.
     *
     * @param int $range
     * @return array
     */
    function cc_year_range($range = 10) {
        $currentYear = date('Y');

        return range($currentYear, $currentYear + $range);
    }
}


