<?php
    include('dbconnect.php');
    $sql = '';
    
    //This line translating all params from js file to a variable named $put_vars
    parse_str(file_get_contents("php://input"),$put_vars);
        
    if(isset($put_vars['pid'])){
        $pid = $put_vars['pid'];

        $sql = "SELECT Name FROM CUSTOMER WHERE CustID = ". $pid . ";";
        
    }else{
        
    }

   if (($result = $conn->query($sql)) !== FALSE)
    {
        while($row = $result->fetch_assoc())
        {
            echo $row["Name"];
        }
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

	$conn->close();
?>