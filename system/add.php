<?php
		//2.save regist info into database
		//2.1 เพิ่ม ข้อมูล user สำหรับ ฐานข้อมูล
		include_once "dbconnect.php"; //หรือใช้ require_once

		//เช็คว่า ฟอร์ม มีการกดปุ่ม submit โดยใช้คำสั่ง isset ($_POST['ชื่อปุ่ม'])
		if (isset($_POST['signup'])) {
			//ตรวจสอบข้อมูล
            $id = $_POST['user-id'];
			$name = $_POST['user-name'];
			$email = $_POST['user-email'];
			$passwd = $_POST['user-password'];


		//2.2 ตรวจสอบความถูกต้องของข้อมูล user 
		//สร้างตัวแปร validate_error เพื่อเช็ค error
		$validate_error = false;
		//สร้างตัวแปรอีกตัว เพื่อแจ้งข้อความ
		$validate_msg = "";
		
		//เช็ครูปแบบของ e-mail
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$validate_error = true;
			$validate_msg = "อีเมลไม่ถูกต้อง";
		}


		if (!$validate_error){
			//เพิ่มข้อมูล project ในตาราง
			$sql = "INSERT INTO project(user_id , user_name, user_email, user_passwd)
			VALUE('" . $id . "' , '" . $name . "' , '" . $email . "' , '" . ($passwd) . "')"; 
	
			if (mysqli_query($con, $sql));
			//execute without error
			// header("location: login.php");
			// header เป็นการลิ้งไปยังหน้า login โดยการใช้ location: ตามด้วยชื่อไฟล์ที่ต้องการให้ลิ้งไป 
			//เมื่อมีการกด signup จะไปอีกหน้าทันที
		} else {
			//error
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
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <title>LOGIN POS</title> <!-- ชื่อเว็บ -->

        <!-- ไอคอนชื่อเว็บ-->
        <link rel="icon" type="image/x-icon" href="assets/CPALL1.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>

    <!-- <body class="py-5 bg-light border-bottom mb-4"> -->
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!-- ชื่อระบบมุมซ้าย -->
                <div class="col-md-6"><a class="navbar-brand" href="#!">LOGIN POS</a> </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto"> 
                        <!-- แถมเมนู -->
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="show_user1.php">ลงชื่อเข้างาน</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="show_user.php">ลาป่วย/ลากิจ</a></li>
                    <li class="nav-item"><a class="nav-link" href="add.php">เพิ่มพนักงาน</a></li>
			        <li class="nav-item"><a class="nav-link active" aria-current="page" href="member.php">รายชื่อพนักงาน</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Logout</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li> -->
                        <!-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page content-->
        <br>
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-6">
                    <!-- Featured blog post-->
                    
                        <div class="container">
                            <div class="text-center my-1">
                                <!-- ข้อความอธิบาย --><br>
                                <a href="#!"><img  src="https://upload.wikimedia.org/wikipedia/th/3/39/CPALL2015.png" height="200" width="300"/></a>
                                <!-- <h1 class="fw-bolder">ยินดีต้อนรับ !!</h1> -->
                                <br><br/> <!-- ขึ้นบรรทัดใหม่ -->
                                <p class="lead mb-0">Welcome to Login System.</p>
                            </div>
                        </div>
                        
                </div>

                <!-- ข้อมูลฝั่งขวา -->
                <!-- Side widgets-->
                
                <div class="col-lg-4" ><br>
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <center><div class="card-header">Register POS</div></center>


<div class="card-body">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
                    <div class="form-group">
						<label for="name">รหัสพนักงาน</label>
						<input type="text" name="user-id" placeholder="ป้อนรหัสพนักงาน" required class="form-control" />
					</div>

                    <div class="form-group">
						<label for="name">ชื่อ</label>
						<input type="text" name="user-name" placeholder="ป้อนชื่อ" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">ชื่อผู้ใช้งาน</label>
						<input type="text" name="user-email" placeholder="ป้อนชื่อผู้ใช้งาน" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">รหัสผ่าน</label>
						<input type="password" name="user-password" placeholder="ป้อนรหัสผ่าน" required class="form-control" />
					</div>

					<center>
                    <div class="form-group">
						<input type="submit" name="signup" value="เพิ่มข้อมูลพนักงาน" class="btn btn-dark"/>
					</div>
					</center>
				</fieldset>
			</form>

			<!--5.display message แสดงข้อความที่กรอกผิด danger แสดงสีแดง -->
			<span class="text-danger">
				                <?php 
					                if (isset($error_mrg)) {
						                echo $error_mrg; //ถ้ามี error ให้แสดงข้อความ
					                }
				                ?>
			                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div><br>

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