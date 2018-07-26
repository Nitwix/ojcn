<?php

if($db_line == NULL){
    $contents->set_email_not_in_db();
}else{
    $db_token = $db_line["token"];

    if($db_token === $token && $db_email === $email){
        $query = "DELETE FROM newsletter where email='$email'";
        $result = $myDB->query($query);
        if($result === false){
            $contents->set_query_error();
        }else{
            $contents->set_unsubscribed();
        }
    }else{
        $contents->set_token_mismatch();
    }
}

?>