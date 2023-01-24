<?php
    session_start();
		
    include_once 'connect.php';
    
    if (isset($_POST['login'])){
        $username = $_POST['login-username'];
        $password = $_POST['login-password'];

        $sql = "SELECT * FROM pos WHERE username = '" . $username . "'
        AND password ='" . ($password) ."'"; 
        //AND password ='" . md5 ($password) ."'"; //ใส่md5 เพื่อเอาไว้เช็ครหัส

        //เข้าไปเช็คในคลังข้อมูลว่ามี user หรือ password นี้ไหม
        $result = mysqli_query($con, $sql); //mysqli_query เป็นการดำเนินงานการตรวจสอบค่าในตารางถ้าใส่ชื่อผู้ใช้งานและรหัสผ่านถูกต้อง มันจะรีเทิร์นกัลมาเป็น resultset และจะเลือกมา 1 record โดยที่ $con เป็นการบอกถึง dbconnect
        if ($row = mysqli_fetch_array($result)){ //จะดึง record ออกมา โดยใช้ mysqli_fetch_array เป็นการแปลง mysqli_fetch ให้เก็บใน array และเกํบในตัวแปร row
            $_SESSION['id'] = $row ['id']; //session ใช้ในการเก็บค่าข้อมูล ทุกครั้งที่จะใช้ session จะต้อง start ก่อน โดยการ session_start(); ไว้บนๆเลย บรรทัดที่ 4
            $_SESSION['name'] = $row ['name'];
            header("location: index.php"); //ให้ลิ้งไปที่ไฟล์ index.php
        } else {
            $error_mrg = "Incorrect username or password.";
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
                <a class="navbar-brand" href="#!">LOGIN POS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
                        <!-- แถมเมนู -->
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="data.php">Admin</a></li>
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
                            <!-- <div class="input-group"> -->
                                <!-- <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" /> -->
                                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="name">Username</label>
                                        <input type="text" name="login-username" placeholder="Enter username" required class="form-control" />
                                    </div>
                
                                    <div class="form-group">
                                        <label for="name">Password</label>
                                        <input type="password" name="login-password" placeholder="Enter password" required class="form-control" />
                                    </div>
                                    <br>
                                    <center>
                                    <div class="form-group">
                                        <input id="show" type="submit" name="login" value="Login" class="btn btn-secondary" />
                                    </div>
                                    <dialog id="FirstDialog">
                                            <div class="form-row">
                                                <legend>ยินดีต้อนรับ เข้าสู่ระบบ</legend>
                                            </div>  
                                    </dialog>
                                        <script>
                                            (function () {
                                                var dialog = document.getElementById('FirstDialog');
                                                document.getElementById('show').onclick = function() {
                                                    swal({
                                                        title: "Success!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                        //text: "Redirecting in 1 seconds.", //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                        type: "success", //success, warning, danger
                                                        timer: 1000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                        showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                                    }, function(){
                                                        window.location.href = "index.php"; 
                                                        });         
                                                };
                                            })();
                                        </script>
                                    <!-- <br> -->
                                    <!-- <button class="btn btn-primary" id="button-search" type="button">Login</button> -->
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