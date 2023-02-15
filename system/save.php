<meta charset="utf-8">
<?php 
include("dbconnect.php");

//print_r($_POST);

 	//save workin
 	if(isset($_POST["work_in"])){

		 	$workdate = date('Y-m-d');
			$id = mysqli_real_escape_string($con,$_POST["user_id"]);
			$name = mysqli_real_escape_string($con,$_POST['user_name']);
			$workin = mysqli_real_escape_string($con,$_POST["work_in"]);

			$sql = "INSERT INTO work_pos (work_date, user_id, user_name, work_in)
			VALUES('$workdate', '$id', '$name' ,'$workin')";
			$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

				mysqli_close($con);
				if($result){
				echo "<script type='text/javascript'>";
				echo "alert('บันทึกข้อมูลสำเร็จ');";
				echo "window.location = 'index.php'; ";
				echo "</script>";
				}else{
				echo "<script type='text/javascript'>";
				echo "alert('Error');";
				echo "window.location = 'index.php'; ";
				echo "</script>";
				}

		//save workout			
 	}elseif(isset($_POST["workout"])) {

 		// echo $_POST["workout"];

 		// exit;

 			$workdate = date('Y-m-d');
 		    $m_id = mysqli_real_escape_string($condb,$_POST["m_id"]);
			$workout = mysqli_real_escape_string($condb,$_POST["workout"]);

			$sql2 = "UPDATE tbl_work_io SET 
			workout='$workout'
			WHERE m_id=$m_id  AND workdate='$workdate'
			";
			$result2 = mysqli_query($condb, $sql2) or die ("Error in query: $sql2 " . mysqli_error($condb));

			// echo $sql2;
			// exit;

					mysqli_close($condb);
					if($result2){
					echo "<script type='text/javascript'>";
					echo "alert('บันทึกข้อมูลสำเร็จ');";
					echo "window.location = 'profile.php'; ";
					echo "</script>";
					}else{
					echo "<script type='text/javascript'>";
					echo "alert('Error');";
					echo "window.location = 'profile.php'; ";
					echo "</script>";
					}
 		 
 	} //}elseif (isset(($_POST["workout"])) {
 else{
 			echo "<script type='text/javascript'>";
 			echo "alert('คุณได้บันทึกเวลาเข้า-ออกงานวันนี้เรียบร้อยแล้ว');";
			echo "window.location = 'profile.php'; ";
			echo "</script>";
 }	
?>
