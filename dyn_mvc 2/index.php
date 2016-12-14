<?php
/* 
 * The dyn_mvc controller
 */

// Get the model
require_once 'model/mvc_model.php';

$action = '';

if($action === "Smurf"){
    
} else {
    
    $users = selectUsers();
    if(!empty($users)){
    // Build the ul to display the users from the database
$list = '<ul>';
                    foreach ($users as $user) {
                        $list .= '<li>'.$user['regFirstName'].' '. $user['regLastName'].' <a href="reg_edit.php?id='.$user['regId'].'">Edit</a></li>' ;
                    }
                    
                    $list .= '</ul>';
                    include 'view/home.php';
                    exit;
}
}

