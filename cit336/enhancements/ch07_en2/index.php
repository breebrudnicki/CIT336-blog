<?php

//CONTROLLER -- Control what is displayed...
//decide which page is displayed
//do the math.. etc..

if (filter_input(INPUT_GET, 'action')) {
    $action = filter_input(INPUT_GET, 'action');
} else {
    $action = filter_input(INPUT_POST, 'action');
}

//Use a switch statement to determine which page needs to be displayed
switch ($action) {
    case 'result' :
        //get the data from the form
        $investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT);
        $interest_rate = filter_input(INPUT_POST, 'interest_rate', FILTER_VALIDATE_FLOAT);
        $years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);
        $compound_monthly = isset($_POST['compound_monthly']);
        //validation. Not necessary to validate investment or interest rate because user does not
        //enter an answer, they just choose one from a drop down
        // validate years
        if ($years === FALSE) {
            $error_message = 'Years must be a valid whole number.';
        } else if ($years <= 0) {
            $error_message = 'Years must be greater than zero.';
        } else if ($years > 30) {
            $error_message = 'Years must be less than 31.';
            // set error message to empty string if no invalid entries
        } else {
            $error_message = '';
        }
        // if an error message exists, go to the home page
        if ($error_message != '') {
            include('view/home.php');
            exit();
        }
        // calculate the future value compounded monthly if the box is checked
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
        // apply currency and percent formatting
        $investment_f = '$' . number_format($investment, 2);
        $yearly_rate_f = $interest_rate . '%';
        $future_value_f = '$' . number_format($future_value, 2);
        if ($compound_monthly == TRUE) {
            $compound_display = "Yes";
        } else {
            $compound_display = "No";
        }
        include('view/display_results.php');
        break;
    default :
        $years = 5;
        include('view/home.php');
        break;
}

