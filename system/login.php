<?php
		//4.check login info from users table
		//star using session
		session_start();
		
		include_once 'dbconnect.php';

		//check whether login button is clicked เช็คปุ่ม login 
		if (isset($_POST['login'])){
			$email = $_POST['login-email'];
			$passwd = $_POST['login-password'];

			$sql = "SELECT * FROM project WHERE user_email = '" . $email . "'
			AND user_passwd ='" .  ($passwd) ."'"; //ใส่md5 เพื่อเอาไว้เช็ครหัส

			//เข้าไปเช็คในคลังข้อมูลว่ามี user หรือ password นี้ไหม
			$result = mysqli_query($con, $sql); //mysqli_query เป็นการดำเนินงานการตรวจสอบค่าในตารางถ้าใส่ชื่อผู้ใช้งานและรหัสผ่านถูกต้อง มันจะรีเทิร์นกัลมาเป็น resultset และจะเลือกมา 1 record โดยที่ $con เป็นการบอกถึง dbconnect
			if ($row = mysqli_fetch_array($result)){ //จะดึง record ออกมา โดยใช้ mysqli_fetch_array เป็นการแปลง mysqli_fetch ให้เก็บใน array และเกํบในตัวแปร row
				$_SESSION['id'] = $row ['user_id']; //session ใช้ในการเก็บค่าข้อมูล ทุกครั้งที่จะใช้ session จะต้อง start ก่อน โดยการ session_start(); ไว้บนๆเลย บรรทัดที่ 4
				$_SESSION['name'] = $row ['user_name'];
				header("location: index.php"); //ให้ลิ้งไปที่ไฟล์ index.php
			} else {
				$error_mrg = "Incorrect e-mail or password.";
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
                <div class="col-md-9"><a class="navbar-brand" href="#!">LOGIN POS</a> </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto"> 
                        <!-- แถมเมนู -->
                        <li class="nav-item"><a class="nav-link "  href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="admin.php">Admin</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li> -->
                        <!-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page content-->
        
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
                        <center><div class="card-header">Login System</div></center>


<div class="card-body">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<div class="form-group">
						<label for="name">ชื่อผู้ใช้งาน</label>
						<input type="text" name="login-email" placeholder="ป้อนชื่อผู้ใช้งาน" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">รหัสผ่าน</label>
						<input type="password" name="login-password" placeholder="ป้อนรหัสผ่าน" required class="form-control" />
					</div>

					<center>
					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-dark"/>
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
        </div>

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