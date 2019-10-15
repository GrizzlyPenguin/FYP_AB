<?php
    include('dbconnect.php');
    $sql = '';
    
    //This line translating all params from js file to a variable named $put_vars
    parse_str(file_get_contents("php://input"),$del_vars);
    if($del_vars['name'] !== '')
    {
        $name = $del_vars['name'];
        $sql = "DELETE FROM person WHERE name = '". $name ."';";
    }

    //Respond Message
    if ($conn->query($sql) === TRUE) {
        echo "Record successfully deleted";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	$conn->close();
?>