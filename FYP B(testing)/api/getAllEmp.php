<?php
    include('dbconnect.php');
	$result = $conn->query("SELECT * FROM EMPLOYEE;");
	
    $outp = "";
	while($rs = $result->fetch_assoc()) {
		if ($outp != "") {
            $outp .= ",";
        }
        
        $outp .= '{"id":"'  . $rs["EmpID"] . '",';
 		$outp .= '"name":"'  . $rs["EmpName"] . '"}'; 
    }

	$outp ='['.$outp.']';

	$conn->close();

	echo $outp;
?>
