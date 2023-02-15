<?php
	session_start ();

		//13.display old info and update into users table
    include_once 'dbconnect.php';
    //รับข้อมูลมาแก้ไข
	if (isset($_GET['user_id'])) {
		$sql = "SELECT * FROM post WHERE user_id = " . $_GET['user_id'];
		$result = mysqli_query($con, $sql);
		$row_update = mysqli_fetch_array($result);
		$type =$row_update['user_type'];
		$name = $row_update['user_name'];
		$id = $row_update['user_id'];
		$date1 = $row_update['user_date1'];
		$date2 = $row_update['user_date2'];
        $time = $row_update['user_time'];
		$note = $row_update['user_note'];	
	}

	//กดปุ่มแล้วบันทึกลง data base
	if (isset($_POST['update'])) {

		$user_id = $_POST['id'];
		$type =$_POST['user_type'];
		$name = $_POST['user_name'];
		$id = $_POST['user_id'];
		$date1 =$_POST['user_date1'];
		$date2 =$_POST['user_date2'];
        $time =$_POST['user_time'];
		$note =$_POST['user_note'];

		//สร้างตัวแปร validate_error เพื่อเช็ค error
		$validate_error = false;
		//สร้างตัวแปรอีกตัว เพื่อแจ้งข้อความ
		$error_msg = "";


		if (!$validate_error) {
			$sql = "UPDATE post SET  user_type = '" . $type . "' , user_name = '" . $name . "', user_date1 = '" . $date1 . "' , user_date2 = '" . $date2 . "', user_time = '" . $time . "', user_note = '" . $note . "'  WHERE user_id = " . $id;
			
			if (mysqli_query($con, $sql)) {
				header ("location: history.php");
			} else {
				$error_msg = "อัปเดตข้อมูลไม่สำเร็จ";
			}
		}
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
        <!-- <style>
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
        </style> -->
    </head>

    <!-- <body class="py-5 bg-light border-bottom mb-4"> -->
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!-- ชื่อระบบมุมซ้าย -->
                <div class="col-md-5"><a class="navbar-brand" href="#!">LOGIN POS</a></div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
                        <!-- แถมเมนู -->

                        <?php if (isset($_SESSION['id'])) { ?>
                        <li class="nav-item"><a class="nav-link"> รหัสพนักงาน&nbsp;<?php echo $_SESSION['id']; ?>&nbsp;คุณ<?php echo $_SESSION['name']; ?></a></li>
		                <?php }  ?>
                        <li class="nav-item"><a class="nav-link" href="history.php">ประวัติการเข้างาน</a></li>
			            <li class="nav-item"><a class="nav-link" href="login.php">Logout</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li> -->
                        <!-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>

<header><br>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-3 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="updateform">
				<fieldset>
					
					<h1 class="masthead-heading mb-0 text text-center">อัปเดตข้อมูล</h1>
        			<!-- Icon Divider-->
       				
					<!--14.display old info in text field -->
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $user_id; ?>" />
						<br>
                                   <div class="form-check">
								   			<center>
                                            <label for="name">ประเภท</label>
                                            <label class="form-check-label" for="name">ลากิจ</label>
                                            <input type="radio" name="user_type" value="ลากิจ">
                                            <label class="form-check-label" for="name">ลาป่วย</label>
                                            <input type="radio" name="user_type" value="ลาป่วย">
											</center>
                                        </div>

                                        <div class="form-group col-md-15">
                                            <label for="name">ชื่อ</label>
                                            <input type="text" name="user_name" placeholder="" required value="<?php echo $_SESSION['name']; ?>"readonly class="form-control" />
                                        </div>
                                
                                        <div class="form-group col-md-15">
                                            <label for="name">รหัสพนักงาน</label>
                                            <input type="id" name="user_id" placeholder="" required value="<?php echo $_SESSION['id']; ?>"readonly class="form-control" />
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
                                    
					</div>
					
					<center>
					<div class="form-group">
						<input type="submit" name="update" value="อัพเดต" class="btn btn-dark" />
					</div>
					</center>
				</fieldset>
				<!-- <button onclick="document.location='show_user.php'" class="btn btn-secondary">ย้อนกลับ</button> -->
			</form>
			<!--15.display message -->
			<span class = "text-danger"><?php if (isset($error_msg)) echo $error_msg; ?></span>
		</div>
	</div>
</div>
<!-- <br> -->
<center><button onclick="document.location='history.php'" class="btn btn-dark">ย้อนกลับ</button></center>
</header>
<br>
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