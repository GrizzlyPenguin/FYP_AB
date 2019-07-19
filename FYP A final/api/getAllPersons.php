
<?php
    include('dbconnect.php');
	$result = $conn->query("SELECT * FROM ticket;");
	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($outp != "") {
            $outp .= ",";
        }
        $outp .= '{"ticketNo":"'  . $rs["TicketNo"] . '",';
 		$outp .= '"title":"'  . $rs["TicketTitle"] . '",';
        $outp .= '"desc":"'  . $rs["TicketDesc"] . '",'; 
        $outp .= '"pid":"'  . $rs["PID"] . '",'; 
        $outp .= '"date":"'  . $rs["DateReceived"] . '",';
        $outp .= '"status":"' . $rs["Status"] . '",'; 
        $outp .= '"StaffID":"' . $rs["StaffID"] . '"}'; 
        
	}
	$outp ='['.$outp.']';
	$conn->close();

	echo($outp);
?>
