<?php
    include('dbconnect.php');
    $sql = '';
    
    //This line translating all params from js file to a variable named $put_vars
    parse_str(file_get_contents("php://input"),$put_vars);

/*   
    if($put_vars['name'] !== '')
    {
        $name = $put_vars['name'];
        
        if($put_vars['newname'] !== '')
        {
            $newname = $put_vars['newname'];
            $sql = "UPDATE person SET name = '" . $newname . "' WHERE name = '". $name ."';";
        }
        
        if($put_vars['newage'] !== '')
        {
            $newage = $put_vars['newage'];
            $sql = "UPDATE person SET age = '" . $newage . "' WHERE name = '". $name ."';";
        }
        
        if($put_vars['newname'] !== '' && $put_vars['newage'] !== '')
        {
            $sql = "UPDATE person SET name = '" . $newname . "', age = '" . $newage . "' WHERE name = '". $name ."';";
        }
    }

    //Respond Message
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	$conn->close();
?>*/

    if($put_vars['Password'] !== '')
    {

        $Password = $put_vars['Password'];
        $Password = md5($Password);
        
        if($put_vars['NewPassword'] !== '')
        {
            $NewPassword = $put_vars['NewPassword'];
            $NewPassword = md5($NewPassword);
            $sql = "UPDATE CUSTOMER SET Password = '" . $NewPassword . "' WHERE Password = '". $Password ."';";
            
            if ($conn->query($sql) === TRUE) {
                echo ("Updated Sucessfully!");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
        

//    $sql = "UPDATE person SET age = '" . $newage . "' WHERE name = '". $name ."';";

    //Respond Message
    if ($conn->query($sql) === TRUE) {
        echo ("Updated Sucessfully!");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	$conn->close();
?>