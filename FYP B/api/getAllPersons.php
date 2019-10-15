
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
        $outp .= '"domain":"'  . $rs["DomainName"] . '",'; 
        $outp .= '"date":"'  . $rs["DateReceived"] . '",';
        $outp .= '"status":"' . $rs["Status"] . '",'; 
        $outp .= '"warranty":"' . $rs["Warranty"] . '",'; 
        $outp .= '"StaffID":"' . $rs["StaffID"] . '",'; 
            
        $result2 = $conn->query("SELECT Name FROM CUSTOMER WHERE CustID = '".$rs["PID"]."';");
        
        if ($result2 !== FALSE){
            while ($rs = $result2->fetch_assoc()) {
                $outp .= '"Name":"' . $rs["Name"] . '"}';
            }
        }else{
            $result2 = $conn->query("SELECT EmpName FROM EMPLOYEE WHERE EmpID = '".$rs["PID"]."';");
            while ($rs = $result2->fetch_assoc()) {
                $outp .= '"Name":"' . $rs["Name"] . '"}';
            }
        }
    }

	$outp ='['.$outp.']';

	$conn->close();

	echo $outp;
?>
