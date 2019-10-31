<?php
    include('dbconnect.php');
    parse_str(file_get_contents("php://input"),$put_vars);

    $sql = 'error';
	$outp = "";

        if(isset($put_vars['tNo'])){
        $ticketNo = $put_vars['tNo'];

        $sql = "SELECT Findings FROM HISTORYLOG WHERE TicketNo = '". $ticketNo . "';";
    }else{
         echo "Error: " . $sql . "<br>";
    }

    if (($result = $conn->query($sql)) !== FALSE)
        {
        while ($rs = $result->fetch_assoc()) {
            $outp .= $rs["Findings"];
        }
        echo $outp;
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	
    $conn->close();
?>
