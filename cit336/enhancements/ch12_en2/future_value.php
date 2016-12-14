<?php

function calculate_future_value($investment, $interest_rate, $years, $compound_monthly) {
    if ($compound_monthly == TRUE) {
        $interest_rate_decimal = $interest_rate * .01;
        $base = 1 + $interest_rate_decimal / 12;
        $exp = 12 * $years;
        $last = pow($base, $exp);
        $future_value = $investment * $last;
    } else {
        $future_value = $investment;
        for ($i = 1; $i <= $years; $i++) {
            $future_value = ($future_value + ($future_value * $interest_rate * .01));
        }
    }
    return $future_value;
}

function currency_formatting(&$investment, &$future_value) {
    $investment = '$' . number_format($investment, 2);
    $future_value = '$' . number_format($future_value, 2);
}

function percent_formatting($interest_rate) {
    $yearly_rate_f = $interest_rate . '%';
    return $yearly_rate_f;
}