<?php 
    include('api/dbconnect.php');
	session_start();

	// variable declaration
	$Username = "";
	$Email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'smdigita_helpdesk');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
        $Name = mysqli_real_escape_string($db, $_POST['Name']);
        $Address = mysqli_real_escape_string($db, $_POST['Address']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$Email = mysqli_real_escape_string($db, $_POST['Email']);
		$Password_1 = mysqli_real_escape_string($db, $_POST['Password_1']);
		$Password_2 = mysqli_real_escape_string($db, $_POST['Password_2']);
        $ContactNumber = mysqli_real_escape_string($db, $_POST['ContactNumber']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($Email)) { array_push($errors, "Email is required"); }
		if (empty($Password_1)) { array_push($errors, "Password is required"); }

		if ($Password_1 != $Password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			//encrypt the password before saving in the database
            $Password_1 = md5($Password_1);
            $Password_2 = md5($Password_2);
            
			$query = "INSERT INTO CUSTOMER (Name, Address, username, Email, Password, ContactNumber) 
					  VALUES('$Name', '$Address',  '$username', '$Email', '$Password_1', '$ContactNumber')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: login.php');
		}

	}

	// REGISTER EMP
	if (isset($_POST['reg_emp'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$Password_1 = mysqli_real_escape_string($db, $_POST['Password_1']);
		$Password_2 = mysqli_real_escape_string($db, $_POST['Password_2']);
        $position = mysqli_real_escape_string($db, $_POST['position']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($Password_1)) { array_push($errors, "Password is required"); }
		if (empty($position)) { array_push($errors, "Position is required"); }        

		if ($Password_1 != $Password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			//encrypt the password before saving in the database
            $Password_1 = md5($Password_1);
			$query = "INSERT INTO EMPLOYEE (EmpName, Password, Role) 
					  VALUES('$username', '$Password_1', '$position')";
			mysqli_query($db, $query);

			
			$_SESSION['success'] = "You are now logged in";
			
		}
	}


	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		/*$Password = mysqli_real_escape_string($db, $_POST['Password']);*/
        $Password = md5(mysqli_real_escape_string($db, $_POST['Password']));
        

        

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($Password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			
			$query = "SELECT * FROM CUSTOMER WHERE username='$username' AND Password='$Password'";
			$results = mysqli_query($db, $query); 
            $query2 = "SELECT * FROM EMPLOYEE WHERE EmpName='$username' AND Password='$Password'";
			$results2 = mysqli_query($db, $query2);
            
             $queryProfile = mysqli_query($db, "SELECT CustID, Name, Address, Email, ContactNumber FROM CUSTOMER WHERE username='$username'");
             $row = mysqli_fetch_assoc($queryProfile);
             
             $queryEmpID = mysqli_query($db, "SELECT EmpID, Role FROM EMPLOYEE WHERE EmpName='$username'");
             $row2 = mysqli_fetch_assoc($queryEmpID);
            
                $_SESSION['CustID'] = $row['CustID'];
//                $_SESSION['CustID'] = $row2['EmpID'];
                $_SESSION['Name'] = $row['Name'];
                $_SESSION['Address'] = $row['Address'];
                $_SESSION['Email'] = $row['Email'];
                $_SESSION['EmpID'] = $row2['EmpID']; $_SESSION['ContactNumber'] = $row['ContactNumber'];
                $_SESSION['Role'] = $row2['Role'];
			
            if (mysqli_num_rows($results) == 1 || mysqli_num_rows($results2) == 1 ) {
				$_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else{
                array_push($errors, "Wrong username/password combination");
            }
		}
	}
?>
