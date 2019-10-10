<?php
    include('dbconnect.php');
    if(isset($_POST['Diagnosis']) || isset($_POST['findings']) || isset($_POST['others']) || isset($_POST['cause']) || isset($_POST['pid']) || isset($_POST['ticketID']) || isset($_POST['ticketStat']))
    {
        $Diagnosis = $_POST['Diagnosis'];
        $findings = $_POST['findings'];
        $others = $_POST['others'];
        $cause = $_POST['cause'];
        $pid = $_POST['pid'];
        $ticketID = $_POST['ticketID'];        
        $ticketStat = $_POST['ticketStat'];
        
        $sql = "INSERT INTO HISTORYLOG(Diagnosis, findings, others, cause, EmpID, ticketNo) VALUES
        ('". $Diagnosis ."','" . $findings . "','".$others."','".$cause."','".$pid."' , '".$ticketID."') 
        ON DUPLICATE KEY UPDATE Diagnosis = '".$Diagnosis."', findings = '".$findings."', others = '".$others."', cause = '".$cause."';";
        
        $sql2 = "UPDATE TICKET SET Status = '". $ticketStat . "'WHERE ticketNo = '".$ticketID."';";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        if ($conn->query($sql2) === TRUE) {
            echo "Status updated successfully";
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    }
	$conn->close();
?>

