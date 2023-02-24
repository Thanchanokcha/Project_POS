<?php
		//2.save regist info into database
		//2.1 เพิ่ม ข้อมูล user สำหรับ ฐานข้อมูล
		session_start();

		include_once "dbconnect.php"; //หรือใช้ require_once
        if (isset($_GET['user_id'])) {
            $sql = "SELECT * FROM project WHERE user_id = " . $_GET['user_id'];
            $result = mysqli_query($con, $sql);
        }
		//เช็คว่า ฟอร์ม มีการกดปุ่ม submit โดยใช้คำสั่ง isset ($_POST['ชื่อปุ่ม'])
		if (isset($_POST['send'])) {
			//ตรวจสอบข้อมูล
			$type =$_POST['user_type'];
			$name = $_POST['user_name'];
			$id = $_POST['user_id'];
			$date1 =$_POST['user_date1'];
			$date2 =$_POST['user_date2'];
            $time =$_POST['user_time'];
			$note =$_POST['user_note'];
            
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            date_default_timezone_set("Asia/Bangkok");
    
            $sToken = "pEdSc0O8w2Xstpc2ly2aJR6uDf2JbF8KaZMP5377uEu";
            $sMessage = "รายงานการลางาน!\r\n";
            $sMessage .= "รหัสพนักงาน: " . $id . " \r\n";
            $sMessage .="ชื่อ: " . $name . " ได้ทำการ" . $type . "!\r\n";
            $sMessage .= "วันที่เริ่มต้น: " . $date1 . " \r\n";
            $sMessage .= "วันที่สิ้นสุด: " . $date2 . " \r\n";
            $sMessage .= "เวลา: " . $time . " \r\n";
            $sMessage .= "หมายเหตุ: " . $note . " \r\n";
        
        
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
        
		//2.2 ตรวจสอบความถูกต้องของข้อมูล user 
		//สร้างตัวแปร validate_error เพื่อเช็ค error
		$validate_error = false;
		//สร้างตัวแปรอีกตัว เพื่อแจ้งข้อความ
		$validate_msg = "";

		if (!$validate_error){
			//เพิ่มข้อมูล project ในตาราง
			$sql = "INSERT INTO post( user_type, user_name, user_id, user_date1, user_date2, user_time, user_note )
			VALUE('" . $type . "'  , '" . $name . "'  , '" . $id . "'  , '" . $date1 . "' , '" . $date2 . "' ,  '" . $time . "' , '" . $note . "')"; 
	
			if (mysqli_query($con, $sql));
			//execute without error

			// header("location: index.php");

			// header เป็นการลิ้งไปยังหน้า login โดยการใช้ location: ตามด้วยชื่อไฟล์ที่ต้องการให้ลิ้งไป 
			//เมื่อมีการกด signup จะไปอีกหน้าทันที
		} else {
			//error
		}
        //เวลาปัจจุบัน
        $timenow = date('H:i:s');
        $datenow = date('Y-m-d');
        //เวลาที่บันทึก
        $queryworkio = "SELECT MAX(work_date) as lastdate, work_in FROM work_pos WHERE user_id='$id' AND work_date='$datenow' ";
        $resultio = mysqli_query($con, $queryworkio) or die ("Error in query: $queryworkio " . mysqli_error($con));
        $rowio = mysqli_fetch_array($resultio);
        //print_r($rowio);
	}
    		
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" href="/lib/bootstrap.min.css">
        <script src="/lib/jquery-1.12.2.min.js"></script>
        <script src="/lib/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">
        <title>LOGIN POS</title> <!-- ชื่อเว็บ -->
        

        <!-- ไอคอนชื่อเว็บ-->
        <link rel="icon" type="image/x-icon" href="assets/CPALL1.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
        dialog {
            background-color:whitesmoke;
            color: rgb(0, 0, 0);
            border: 1px solid rgba(0,0,5,0.3) ;
            border-radius: 30px;
            bottom: 0;
            padding:20px;
            box-shadow: 0 3px 7px rgba(0,0,0,0.3);
            box-sizing: content-box;
            width: 500px;
            /*margin-top:7em;
            max-width:25em;
             */
            }
        </style>
    </head>

    <!-- <body class="py-5 bg-light border-bottom mb-4"> -->
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!-- ชื่อระบบมุมซ้าย -->
                <div class="col-md-5"><a class="navbar-brand" href="index.php">LOGIN POS</a></div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
                        <!-- แถมเมนู -->

                        <?php if (isset($_SESSION['id'])) { ?>
                        <li class="nav-item"><a class="nav-link"> รหัสพนักงาน&nbsp;<?php echo $_SESSION['id']; ?>&nbsp;คุณ<?php echo $_SESSION['name']; ?></a></li>
		                <?php }  ?>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="history1.php">ประวัติการเข้างาน</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="history.php">ประวัติการลางาน</a></li>
			            <li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Logout</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li> -->
                        <!-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page content-->
        
        <div class="container">
                <!-- Blog entries-->
                <div class>
                    <!-- Featured blog post-->
                    
                        <div class="container"><br><br><br>
                            <div class="text-center my-4">
                                <!-- ข้อความอธิบาย -->
                                <a  href="#!"><img src="https://upload.wikimedia.org/wikipedia/th/3/39/CPALL2015.png" "  height="200" width="300"/></a>
                                <!-- <h1 class="fw-bolder">ยินดีต้อนรับ !!</h1> -->
                                <br><br/> <!-- ขึ้นบรรทัดใหม่ -->
                                <p class="lead mb-0">Welcome to Login System.</p><br>
                                </center>
                            </div>
                        </div> 
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4 col-md-offset-4 text-center">
            <input id="submit" type="submit" name="Check in" value="ลงชื่อเข้างาน" class="btn btn-dark"/>&nbsp;&nbsp;
            <input id="leave" type="submit" name="leave" value="ลาป่วย/ลากิจ" class="btn btn-dark"/>

            <dialog id="FirstDialog">
                <form action="save.php" method="post" class="form-horizontal">
                <div class="">
                    <h3> ลงเวลาเข้างาน <?php echo date('d-m-Y');?></h3>        
                    <div class="form-group">
                    <center>
                        <div class="form-group col-md-7">
                            <label for="user_id">รหัสพนักงาน</label>  
                            <input type="text" class="form-control"   name="user_id"   placeholder="รหัสพนักงาน" required value="<?php echo $_SESSION['id']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-7">
                            <label for="user_name">ชื่อพนักงาน</label>  
                            <input type="text" class="form-control"   name="user_name"   placeholder="รหัสพนักงาน" required value="<?php echo $_SESSION['name']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-7">
                            <label for="work_id">เวลาเข้างาน</label>
                            <?php if(isset($rowio['work_in'])){ ?>
                            <input type="text" class="form-control"   name="work_in"   value="<?php echo $rowio['work_in'];?>"  disabled>
                            <?php }else{ ?>
                            <input type="text" class="form-control"   name="work_in"   value="<?php echo date('H:i:s');?>"  readonly>
                            <?php  } ?>
                        </div>
                        <div class="col col-xs-6">
                            <button type="submit" name="submit" value="submit" class="btn btn-dark" >ยืนยัน</button>
                            <input id='refuse' type="button" name="send" value="ปฏิเสธ" class="btn btn-dark"/>
                        </div>
                    <script>
                    (function () {
                        var dialog = document.getElementById('FirstDialog');
                        document.getElementById('submit').onclick = function() {
                            dialog.showModal();
                        };
                        document.getElementById('refuse').onclick = function() {
                            dialog.close();
                        };
                    })();
                </script>
                </form>
            </dialog>
            </div>
        </div>

            
        <dialog id="leavedialog">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-md-offset-4 well">
                                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  enctype="multipart/form-data" name="sendform">
                                    <fieldset><br>
                                    <!--<div class="form-group">
                                            <label for="name">รหัสพนักงาน</label>
                                            <?php echo $_SESSION['id']; ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">ชื่อ</label>
                                            <?php echo $_SESSION['name']; ?>
                                        </div>
                                    -->

                                        <div class="form-check">
                                            <label for="name">ประเภท</label>
                                            <label class="form-check-label" for="name">ลากิจ</label>
                                            <input type="radio" name="user_type" value="ลากิจ">
                                            <label class="form-check-label" for="name">ลาป่วย</label>
                                            <input type="radio" name="user_type" value="ลาป่วย">
                                        </div>

                                        <!-- <form action="" method="post" enctype="multipart/form-data">
                                            <input type="text" name="img_name" required class="form-control" placeholder="ชื่อภาพ"> <br>
                                            <label for="name">รูปภาพ</label>
                                            <input type="file" name="img_file" required accept="image/jpeg, image/png, image/jpg">
                                            <font color="red">*อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </font><br><br>
                                            <button type="submit" class="btn btn-secondary">อัปโหลด</button>
                                        </form>-->

                                        <!-- <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="name">รูปภาพ</label>
                                            <input type="file" name="user_img">
                                        </div>
                                        </form>
                                        -->
                                        <div class="form-group col-md-15">
                                            <label for="name">ชื่อ</label>
                                            <input type="text" name="user_name" placeholder="" required value="<?php echo $_SESSION['name']; ?>" class="form-control" />
                                        </div>
                                
                                        <div class="form-group col-md-15">
                                            <label for="name">รหัสพนักงาน</label>
                                            <input type="id" name="user_id" placeholder="" required value="<?php echo $_SESSION['id']; ?>" class="form-control" />
                                        </div>

                                        <div class="form-group col-md-15">
                                            <label for="name">วันที่เริ่มต้น</label>
                                            <input type="date" name="user_date1" required class="form-control" />
                                        </div>

                                        <div class="form-group col-md-15">
                                            <label for="name">วันที่สิ้นสุด</label>
                                            <input type="date" name="user_date2" required class="form-control" />
                                        </div>

                                        <div class="form-group col-md-15">
                                            <label for="name">เวลา</label>
                                            <input type="time" name="user_time"  required class="form-control" />
                                        </div>

                                        <div class="form-group col-md-15">
                                            <label for="name">หมายเหตุ</label>
                                            <input type="text" name="user_note" required class="form-control" />
                                        </div>
                                        
                                        <center>
                                        <div class="form-group">
                                            <input type="submit" name="send" value="ยืนยัน" class="btn btn-dark"/>
                                            <button id="close" class="btn btn-dark">ย้อนกลับ</button>
                                        </div>
                                        </center>
                                    </fieldset>
                                <!--3.display message แสดงข้อความ error ที่เกิดขึ้น -->
                                <?php
                                    if (isset($validate_error)){
                                        if($validate_error){
                                            echo $validate_msg;
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>  
                </div>
                </dialog>

                <script>
                    (function () {
                        var dialog = document.getElementById('leavedialog');
                        document.getElementById('leave').onclick = function() {
                            dialog.showModal();
                        };
                        document.getElementById('close').onclick = function() {
                            dialog.close();
                        };
                    })();
                </script>
            
            </div>
        </div>
    </div> 
</div>
        
<br><br><br>
        <!-- Footer-->
        <footer class="py-1 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Thankyou</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>