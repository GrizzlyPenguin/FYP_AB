<?php
    include('dbconnect.php');
    parse_str(file_get_contents("php://input"),$put_vars);

    $sql = 'error';
	$outp = "";

    if(isset($put_vars['UserID']) && isset($put_vars['tNo'])){
        $pid = $put_vars['UserID'];
        $ticketNo = $put_vars['tNo'];

        $sql = "SELECT Descriptions FROM HISTORYLOG WHERE EmpID = '". $pid . 
            "' AND TicketNo = '". $ticketNo . "';";
    }else{
         echo "Error: " . $sql . "<br>";
    }

    if (($result = $conn->query($sql)) !== FALSE)
        {
        while ($rs = $result->fetch_assoc()) {
            $outp = $rs["Descriptions"];
        }
        echo $outp;
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	
    $conn->close();
?>
