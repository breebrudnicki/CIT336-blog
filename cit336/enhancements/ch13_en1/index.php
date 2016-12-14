<?php

//CONTROLLER -- Control what is displayed...
//decide which page is displayed
//do the math.. etc..
//create session that controller and all views can access

if (filter_input(INPUT_GET, 'action')) {
    $action = filter_input(INPUT_GET, 'action');
} else {
    $action = filter_input(INPUT_POST, 'action');
}

//include future value functions
require_once('future_value.php');

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
        //calculate future value... using custom functions withinn futurevalue.php
        $future_value = calculate_future_value($investment, $interest_rate, $years, $compound_monthly);

        // apply currency and percent formatting
        currency_formatting($investment, $future_value);
        $yearly_rate_format = percent_formatting($interest_rate);
        
        //display weather or not compound monthly interest was chosen
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

