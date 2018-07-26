<?php
    $token = htmlspecialchars($_GET["token"]);

    if($db_line == NULL){
        $contents->set_email_not_in_db();
    }else{
        $db_token = $db_line["token"];
        //var_dump($db_token);
        
        if($db_token === $token && $db_email === $email){
            $contents->set_subscribed();
            
            $query = "UPDATE newsletter set verified=1 where email='$email'";
            $result = $myDB->query($query);
            if($result === false){
                $contents->set_query_error();
            }
        }else{
            $contents->set_token_mismatch();
        }
    }
?>