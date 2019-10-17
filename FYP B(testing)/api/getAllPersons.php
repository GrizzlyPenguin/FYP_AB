<?php
    include('dbconnect.php');
	$result = $conn->query("SELECT * FROM TICKET;");
	
    $outp = "";
	while($rs = $result->fetch_assoc()) {
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
        $outp .= '"StaffID":"' . $rs["StaffID"] . '"'; 
            
        $result2 = $conn->query("SELECT Name FROM CUSTOMER WHERE CustID = '".$rs["PID"]."';");
        $result3 = $conn->query("SELECT EmpName FROM EMPLOYEE WHERE EmpID = '".$rs["PID"]."';");
        
        if ($result2 !== FALSE){
            while ($rs = $result2->fetch_assoc()) {
                $outp .= "," . '"Name":"' . $rs["Name"] . '"';
            }
        }else if($result3 !== FALSE){
            while ($rs = $result3->fetch_assoc()) {
                $outp .= "," . '"hello":"' . $rs["Name"] . '"';
            }
        }
        
        if ($outp != "") {
            $outp .= "}";
        }
    }

	$outp ='['.$outp.']';

	$conn->close();

	echo $outp;
?>
