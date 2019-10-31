<?php
    include('dbconnect.php');
    parse_str(file_get_contents("php://input"),$put_vars);

    $sql = 'error';
	$outp = "";

    if(isset($put_vars['tNo'])){
        $ticketNo = $put_vars['tNo'];

        $result = $conn->query("SELECT Diagnosis, Findings, Others, Cause, WrittenBy FROM HISTORYLOG WHERE TicketNo = '". $ticketNo . "';");        
        
        if ($result !== FALSE){
            while ($rs = $result->fetch_assoc()) {
                if ($outp != "") {
                    $outp .= ",";
                }

                $outp .= '{"diagnosis":"' . $rs["Diagnosis"] . '",';
                $outp .= '"findings":"' . $rs["Findings"] . '",'; 
                $outp .= '"others":"' . $rs["Others"] . '",'; 
                $outp .= '"cause":"'  . $rs["Cause"] . '",'; 

                $sql2 = "SELECT EmpName FROM EMPLOYEE WHERE EmpID = '".$rs["WrittenBy"]."';";
                
                if (($result2 = $conn->query($sql2)) !== FALSE) {
                    while ($rs2 = $result2->fetch_assoc()) {
                        $outp .= '"writtenBy":"' . $rs2["EmpName"]  . '"';
                    }
                } else {
                    echo "Error: " . $sql2 ."<br/>". $rs["WrittenBy"]. $conn->error;
                }

                if ($outp != "") {
                    $outp .= "}";
                }
            }
            
            $outp ='['.$outp.']';
            echo $outp;

            }else{
                echo "Error: " . $result . "<br>" . $conn->error;
            }
    }else{
         echo "Error: " . $sql . "<br>";
    }
    $conn->close();
?>
