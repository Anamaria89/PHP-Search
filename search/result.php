<?php
	// Establish mysql connection 
	
	$con = @new mysqli('localhost', 'root', '', 'shikin'); //Please change the server credential
	
	if ($con->connect_error) {
		echo "Error: " . $con->connect_error;
		exit();
		}
		
	//echo 'Connected to MySQL';
	echo '<br>';

    // Run Query
	
	if($_REQUEST['submit']){
    $name = $_POST['name'];
	
	if(empty($name)){
	$make = '<h4>You must type a word to search!</h4>';
        echo $make;
	}else{
		
                
	    $select = "SELECT * FROM data WHERE name LIKE '%$name%'";
	    $result = mysqli_query($con, $select);
            $row = mysqli_fetch_array($result);
            if(empty($row)){
                echo "No match found!";
                
            }else {
		while ($row = mysqli_fetch_array($result))
		{
			echo $row['name'];
			echo '<br />';
            }
            
	// Close mysql connection
	mysqli_close($con);
        }}}
        
?>