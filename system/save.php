<?php 
include("dbconnect.php");

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

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        date_default_timezone_set("Asia/Bangkok");

        $sToken = "pEdSc0O8w2Xstpc2ly2aJR6uDf2JbF8KaZMP5377uEu";
        $sMessage = "รายงานการเข้าทำงาน!\r\n";
        $sMessage .= "รหัสพนักงาน: " . $id . " \r\n";
        $sMessage .= $name . " ได้ทำการเข้างานเรียบร้อยแล้ว!\r\n";
        $sMessage .= "เวลา: " . $workin . " ";
    
    
        $chOne = curl_init(); 
        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt( $chOne, CURLOPT_POST, 1); 
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
        $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne ); 
    
        //Result error 
        if(curl_error($chOne)) 
        { 
            echo 'error:' . curl_error($chOne); 
        } 
        else { 
            $result_ = json_decode($result, true); 
            //echo "status : ".$result_['status']; echo "message : ". $result_['message'];
        } 
        curl_close( $chOne );   
    
    }
        

		//save workout			 	   

		
?>
