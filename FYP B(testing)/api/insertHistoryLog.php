<?php
    include('dbconnect.php');
    if(isset($_POST['Description']) || isset($_POST['Diagnosis']) || isset($_POST['findings']) || isset($_POST['others']) || isset($_POST['cause']) || isset($_POST['pid']) || isset($_POST['ticketID']) || isset($_POST['ticketStat']))
    {
        $Description = $_POST['Description'];
        $Diagnosis = $_POST['Diagnosis'];
        $findings = $_POST['findings'];
        $others = $_POST['others'];
        $cause = $_POST['cause'];
        $pid = $_POST['pid'];
        $ticketID = $_POST['ticketID'];        
        $ticketStat = $_POST['ticketStat'];
        $transfer = $_POST['transfer'];
        
        $sql = "INSERT INTO HISTORYLOG(Descriptions, Diagnosis, findings, others, cause, EmpID, ticketNo) VALUES
        ('". $Description . "','". $Diagnosis ."','" . $findings . "','".$others."','".$cause."','".$pid."' , '".$ticketID."') 
        ON DUPLICATE KEY UPDATE Descriptions = '". $Diagnosis ."',Descriptions = '". $Diagnosis ."',Diagnosis = '".$Diagnosis."', findings = '".$findings."', others = '".$others."', cause = '".$cause."';";
        
        if (empty($_POST['transfer'])){
            $sql2 = "UPDATE TICKET SET Status = '". $ticketStat . "'WHERE ticketNo = '".$ticketID."';";
            if ($conn->query($sql2) === TRUE) {
                echo "Status updated successfully";
            } else {
                echo "Error: " . $sql2 . "<br>" . $conn->error;
            }
        }else{
            $sql3 = "UPDATE TICKET SET Status = '". $ticketStat . "', StaffID = '". $transfer. "' WHERE ticketNo = '".$ticketID."';";
                if ($conn->query($sql3) === TRUE) {
                echo "Status updated and transfer to new staff successfully";
            } else {
                echo "Error: " . $sql3 . "<br>" . $conn->error;
            }
        }
            
        
        if ($conn->query($sql) === TRUE) {
            echo "New log created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
            
        
            
            
    }
	$conn->close();
?>

