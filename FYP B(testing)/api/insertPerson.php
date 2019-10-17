<?php
    include('dbconnect.php');
    if(isset($_POST['TicketTitle']) || isset($_POST['TicketDesc']) || isset($_POST['warranty']) || isset($_POST['domain']))
    {
        $TicketTitle = $_POST['TicketTitle'];
        $TicketDesc = $_POST['TicketDesc'];
        $UserID = $_POST['UserID'];
        $Status = $_POST['Status'];
        $warranty = $_POST['warranty'];
        $domain = $_POST['domain'];
        $sql = "INSERT INTO TICKET(TicketTitle, TicketDesc, DomainName, Warranty, PID, DateReceived,Status) VALUES
        ('". $TicketTitle ."','" . $TicketDesc . "','".$domain."','".$warranty."','".$UserID."' ,CURRENT_TIMESTAMP(),'Open') ;";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
	$conn->close();
?>

