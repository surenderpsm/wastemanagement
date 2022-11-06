<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wastemanagement";
    try{
        $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error){
            die("Connection to database failed: " . $conn->connect_error);
        }

        $name = $_REQUEST['clientname'];
        $streetaddr = $_REQUEST['streetaddr'];
        $city = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $zipcode = $_REQUEST['zipcode'];
        $contact = $_REQUEST['contactno'];
        $kgs = (int)$_REQUEST['kgs'];
        if($_REQUEST['wastetype'] == 'recyclable'){
            $recyclable = 1;
        }
        else{
            $recyclable = 0;
        }
        if($_REQUEST['collection'] == 'yes'){
            $collection = 1;
        }
        else{
            $collection = 0;
        }

        if($_REQUEST['assistance'] == 'yes'){
            $assistance = 1;
        }
        else{
            $assistance = 0;
        }


        $sql = "INSERT into registered(name, streetaddr, city, state, zipcode, contact, recyclable, kgs, collection, assistance) values (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssiiii", $name, $streetaddr, $city, $state, $zipcode, $contact, $recyclable, $kgs, $collection, $assistance);
        
        $stmt->execute();
        echo "success";
        $conn->close();
    }
    catch(PDOException $e){
        echo "error: ". $e->getMessage();
        $conn->close();
    }
    
?>