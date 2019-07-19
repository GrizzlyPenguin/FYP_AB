<?php
    include('dbconnect.php');
    if(isset($_POST['TicketTitle']) || isset($_POST['TicketDesc']))
    {
        $TicketTitle = $_POST['TicketTitle'];
        $TicketDesc = $_POST['TicketDesc'];
        $UserID = $_POST['UserID'];
        $Status = $_POST['Status'];
        $sql = "INSERT INTO ticket(TicketTitle, TicketDesc, PID, DateReceived,Status) VALUES('". $TicketTitle ."','" . $TicketDesc . "', '$UserID' ,CURRENT_TIMESTAMP(),'Open') ;";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
	$conn->close();
?>

