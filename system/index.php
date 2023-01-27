<?php
	session_start();
	include_once 'dbconnect.php';
    
    //dog
    $sql_dog = "select * from post where user_type = 'สุนัข' order by user_id";
    $result_dog = mysqli_query($con, $sql_dog);

    //cat
    $sql_cat = "select * from post where user_type = 'แมว' order by user_id";
    $result_cat = mysqli_query($con, $sql_cat);
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
                <a class="navbar-brand" href="#!">LOGIN POS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
                        <!-- แถมเมนู -->

                        <?php if (isset($_SESSION['id'])) { ?>
                        <li class="nav-item"><a class="nav-link"> รหัสพนักงาน&nbsp;<?php echo $_SESSION['id']; ?>&nbsp;คุณ<?php echo $_SESSION['name']; ?></a></li>
		                <?php }  ?>
			            <li class="nav-item"><a class="nav-link" href="login.php">Logout</a></li>
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
                <div class>
                    <!-- Featured blog post-->
                    
                        <div class="container">
                            <div class="text-center my-1">
                                <!-- ข้อความอธิบาย -->
                                <a href="#!"><img  src="https://upload.wikimedia.org/wikipedia/th/3/39/CPALL2015.png" height="200" width="300"/></a>
                                <!-- <h1 class="fw-bolder">ยินดีต้อนรับ !!</h1> -->
                                <br><br/> <!-- ขึ้นบรรทัดใหม่ -->
                                <p class="lead mb-0">Welcome to Login System.</p><br>
                            </div>
                        </div> 
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4 col-md-offset-4 text-center">
            <input id="submit" type="submit" name="signup" value="ลงชื่อเข้างาน" class="btn btn-dark"/>&nbsp;&nbsp;

            <dialog id="FirstDialog">
                <div>
                <legend>คุณ<?php echo $_SESSION['name']; ?><br>รหัสพนักงาน&nbsp;<?php echo $_SESSION['id']; ?><br>ยืนยันการเข้าทำงานหรือไม่?</legend>
                    <div class="form-group">
                        <button type="submit" name="submit" value="submit" class="btn btn-dark">ยืนยัน</button>
                        <button type="close" id="hide" class="btn btn-dark">ปฏิเสธ</button>
                    </div>
                </div>
            </dialog>
            <script>
                (function () {
                    var dialog = document.getElementById('FirstDialog');
                    document.getElementById('submit').onclick = function() {
                        dialog.showModal();
                    };
                    document.getElementById('hide').onclick = function() {
                        dialog.close();
                    };
                })();
            </script>

            <button onclick="document.location='post.php'" class="btn btn-dark">ลาป่วย/ลากิจ</button><br><br>
            
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