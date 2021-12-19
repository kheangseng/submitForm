<?php
/**
 * This file is to received the submitted data and insert into the database.
 * @param $_POST["uname"] text
 * @param $_POST["pwd"] password
 * 
 * @author Seng KHEANG <kheangseng@gmail.com> 
 * @since 20/12/2021 
 * @version 1.0
 */

require "env.php";  //include all the predefined constants/params


// if the post objects (containing 'uname' and 'pwd') are exist, 
// then insert them into the database
//--------------------------------------------------------------
if(isset($_POST["uname"]) && isset($_POST["pwd"])) {    
    $uname = (isset($_POST['uname']) ? $_POST['uname'] : "");   //conditional assignment
    $pwd   = (isset($_POST['pwd']) ? $_POST['pwd'] : "");       //conditional assignment

    // connect to mysql
    $conn = mysqli_connect($HOST, $DB_USER, $DB_PWD, $DB_NAME);

    // Check connection
    if (mysqli_connect_errno()) {   
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit(); 
    }else{
        // this query $sql is to insert username and password into the table account
        $sql = "INSERT INTO account (username, pwd) VALUES ('".$uname."', '".$pwd."')";
                
        // if it is executable
        if ($conn->query($sql) === TRUE) {            
            $result = [];
            $result['data'] = $uname;
            $result['message'] = "New record created successfully";
            $result['code'] = 200;

            echo json_encode($result);  //echo the converted $result in form of json
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;           
        }

        $conn->close();
    }
}

?>