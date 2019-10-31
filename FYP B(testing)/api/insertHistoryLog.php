<?php
    include('dbconnect.php');
    if(isset($_POST['Diagnosis']) || isset($_POST['findings']) || isset($_POST['others']) || isset($_POST['cause']) || isset($_POST['pid']) || isset($_POST['ticketID']) || isset($_POST['ticketStat']))
    {
        $addDesc = $_POST['addDesc'];
        $Diagnosis = $_POST['Diagnosis'];
        $findings = $_POST['findings'];
        $others = $_POST['others'];
        $cause = $_POST['cause'];
        $pid = $_POST['pid'];
        $ticketID = $_POST['ticketID'];        
        $ticketStat = $_POST['ticketStat'];
        $transfer = $_POST['transfer'];
        
        $sql = "INSERT INTO HISTORYLOG(Diagnosis, findings, others, cause, EmpID, ticketNo, WrittenBy) VALUES
        ('". $Diagnosis ."','" . $findings . "','".$others."','".$cause."','".$pid."' , '".$ticketID."', '".$pid."') 
        ON DUPLICATE KEY UPDATE Diagnosis = '".$Diagnosis."', findings = '".$findings."', others = '".$others."', cause = '".$cause."', WrittenBy = '".$pid."';";
        
        if (!empty($_POST['addDesc'])){
            $sql4 = "UPDATE TICKET SET AdditionalTicketDesc = '". $addDesc . "'WHERE ticketNo = '".$ticketID."';";
             if ($conn->query($sql4) === TRUE) {
                echo "Addtional tikcet description updated successfully";
            } else {
                echo "Error: " . $sql4 . "<br>" . $conn->error;
            }
        }
        
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

