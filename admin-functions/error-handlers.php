<?php

if ($_GET['error']) {
    errorHandler($_GET['error']);
} elseif ($_GET['success']) {
    successHandler($_GET['success']);
}

function errorHandler($error)
{
    if ($error == "uploading_file") {
        $message = "Error Uploading File. Please Try Again";
    } elseif ($error == "invalid_format") {
        $message = "Error: Wrong File Format. Please Try Again";
    } elseif ($error == "moving_file" || $error == "failed_update_hero_img") {
        $message = "Error: Couldn't Save New Image. Please Try Again";
    } elseif ($error == "empty_input") {
        $message = "Error: Can't Leave Input Blank. Please Try Again";
    } elseif ($error == "failed_update_registration_img") {
        $message = "Error: Failed To Save New Registration Image. Please Try Again";
    } elseif ($error == "update_failed") {
        $message = "Error: Failed To Update New Text. Please Try Again";
    } elseif ($error == "uploading_file") {
        $message = "Error: Failed To Upload New Image. Please Try Again";
    } elseif ($error == "failed_update_pdf") {
        $message = "Error: Failed To Upload New PDF. Please Try Again";
    } elseif ($error == "uploading_pdf") {
        $message = "Error: Failed To Save New PDF. Please Try Again";
    } elseif ($error == "no_sponsors_added") {
        $message = "Error: Failed To Add New Sponsor. Please Try Again";
    } elseif ($error == "failed_update") {
        $message = "Error: Failed To Update Contact Info. Please Try Again";
    } elseif ($error == "failed_insert") {
        $message = "Error: Failed To Add New Director. Please Try Again";
    } elseif ($error == "failed_update_director") {
        $message = "Error: Failed To Update Director. Please Try Again";
    } elseif ($error == "deleting_director") {
        $message = "Error: Failed To Delete Director. Please Try Again";
    } elseif ($error == "failed_update_past_president") {
        $message = "Error: Failed To Update Past President. Please Try Again";
    } elseif ($error == "deleting_past_president") {
        $message = "Error: Failed To Delete Past President. Please Try Again";
    }  elseif ($error == "access_denied") {
        $message = "Error: Access Denied. Please Login";
    } elseif ($error == "pwd_doesnt_match") {
        $message = "Error: Incorrect Password. Please Try Again.";
    } elseif ($error == "username_doesnt_exist") {
        $message = "Error: Incorrect Username. Please Try Again.";
    } elseif ($error == "failed_to_login") {
        $message = "Error: Failed To Login. Please Try Again.";
    } elseif ($error == "failed_to_login") {
        $message = "Error: Failed To Login. Please Try Again.";
    } elseif ($error == "failed_reset_card") {
        $message = "Error: Failed Reset Card. Please Try Again.";
    } elseif ($error == "couldnt_get_card_num") {
        $message = "Error: Failed To Get Card Number. Please Try Again.";
    } elseif ($error == "deleted_sponsor") {
        $message = "Error: Failed To Delete Sponsor. Please Try Again.";
    } 

    ?>
    <div class="floating-error" id="floating-error">
        <button id="floating-error-btn" class="floating-error-btn" value="floating-error">&#x2716;</button>
        <?php echo $message ?>
    </div>
    <?php
}

function successHandler($success)
{
    if ($success == "updated_hero_img") {
        $message = "Updated New Home Page Image Successfully";
    } elseif ($success == "updated_section_1_successfully") {
        $message = "Updated Section 1 Successfully";
    } elseif ($success == "updated_registration_info_successfully") {
        $message = "Updated Registration Information Successfully";
    } elseif ($success == "updated_registration_img") {
        $message = "Updated Registration Image Successfully";
    } elseif ($success == "no_changes_made") {
        $message = "No Changes Made To Image.";
    } elseif ($success == "updated_season_date") {
        $message = "Successfully Updated New Date.";
    } elseif ($success == "updated_field_img") {
        $message = "Successfully Updated New Map Image.";
    } elseif ($success == "updated_card") {
        $message = "Successfully Updated New Card.";
    } elseif ($success == "updated_registration_date") {
        $message = "Successfully Updated Registration Date.";
    } elseif ($success == "updated_pdf") {
        $message = "Successfully Updated Registration Rules.";
    } elseif ($success == "added_sponsor") {
        $message = "Successfully Added New Sponsor.";
    } elseif ($success == "update_footer") {
        $message = "Successfully Updated Contact Info.";
    } elseif ($success == "added_director") {
        $message = "Successfully Added A New Director.";
    } elseif ($success == "update_director") {
        $message = "Successfully Updated Director.";
    } elseif ($success == "delete_director") {
        $message = "Successfully Deleted Director.";
    } elseif ($success == "update_past_president") {
        $message = "Successfully Updated Past President.";
    } elseif ($success == "delete_past_president") {
        $message = "Successfully Deleted Past President.";
    } elseif ($success == "logged_in") {
        $message = "Successfully Logged In. Welcome!";
    } elseif ($success == "reset_card") {
        $message = "Successfully Reset Card. Welcome!";
    } elseif ($success == "deleted_sponsor") {
        $message = "Successfully Reset Card. Welcome!";
    }
 
    ?>
    <div class="floating-success" id="floating-success">
        <button id="floating-success-btn" class="floating-success-btn" value="floating-success">&#x2716;</button>
        <?php echo $message ?>
    </div>
    <?php

}