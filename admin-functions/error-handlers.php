<?php

function errorHandler($error)
{
    if ($error == "uploading_file") {
        $message = "Error Uploading File. Please Try Again";
    } elseif ($error == "invalid_format") {
        $message = "Error: Wrong File Format. Please Try Again";
    } elseif ($error == "moving_file" || $error == "failed_update_hero_img") {
        $message = "Error: Couldn't Save New Image. Please Try Again";
    }

    ?>
    <div class="error-message">
        <?php echo $message ?>
    </div>
    <?php


}

function successHandler($success)
{
    if ($success == "updated_hero_img") {
        $message = "Updated New Home Page Image Successfully";
    }

    ?>
    <div class="success-message">
        <?php echo $message ?>
    </div>

    <?php

}