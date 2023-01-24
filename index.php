<?php
		//2.save regist info into database
		//2.1 เพิ่ม ข้อมูล user สำหรับ ฐานข้อมูล
        session_start();
		include_once "connect.php"; //หรือใช้ require_once

		$message = "คุณได้ทำการลงชื่อเข้าทำงานแล้ว";
		
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
                        <a><p class="text-secondary">รหัสพนักงาน&nbsp;<?php echo $_SESSION['id']; ?>&nbsp;คุณ<?php echo $_SESSION['name']; ?></p></a>
		            <?php }  ?>
			            
                        <li class="nav-item mx-0 mx-lg-1"><a  class="btn btn-info" href="login.php">Logout</a></li>
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
            <input id="submit" type="submit" name="signup" value="ลงชื่อเข้างาน" class="btn btn-secondary"/>&nbsp;&nbsp;

            <dialog id="FirstDialog">
                <div class="form-row">
                <legend>คุณ<?php echo $_SESSION['name']; ?> ยืนยันการเข้าทำงานหรือไม่?</legend>
                    <div class="form-group">
                        <button type="submit" name="submit" value="Submit" class="btn btn-primary" >ยืนยัน</button>
                        <button type="close" id="hide" class="btn btn-primary">ปฏิเสธ</button>
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
            <!-- แจ้งเตือนแบบง่อยๆ -->
        <?php
            // echo "<script type='text/javascript'>alert('$message');</script>";
            ?>

            <button id="leave" onclick="document.location='form.php'" class="btn btn-secondary">ลากิจ/ลาป่วย</button>
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="form" enctype="multipart/form-data" name="sendform">
            <dialog id="SecondDialog">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-md-offset-4 well">
                                <fieldset>
                                    <div class="form-group">
                                        <center>
                                        <div class="form-group col-md-15">
                                            <label for="name">วัน</label>
                                            <input type="date" name="date" required class="form-control" />
                                        </div><br>

                                        <div class="form-group">
                                            <label for="name" >เวลา</label>
                                            <input type="time" name="time" required class="form-control" />
                                        </div>
                                        </center>
                                        <label for="name">ประเภท</label>
                                        <center><br>
                                        <label for="name">ลาป่วย</label>
                                        <input type="radio" name="type" value="ลาป่วย">
                                        <!-- <input type="radio" name="user_type" value="สุนัข"><img src="https://cdn.discordapp.com/attachments/881810685317742603/900789788142096424/3089512.png" height="55" width="55"> -->
                                        <label for="name">ลากิจ</label>
                                        <input type="radio" name="type" value="ลากิจ">
                                        <!-- <input type="radio" name="user_type" value="แมว"><img src="https://cdn.discordapp.com/attachments/881810685317742603/900789782878240798/1864514.png" height="55" width="55"> -->
                                        </center>
                                    </div><br>
                                    
                                    <center>
                                    <div class="form-group">
                                        <label for="name">หมายเหตุ</label>
                                        <input type="text" name="note" placeholder="หมายเหตุ" required value="" class="form-control" />
                                    </div>
                                        <button type="submit" name="login" value="Login" class="btn btn-primary">ยืนยัน</button>
                                        <button type="close" id="hide1" class="btn btn-primary">ปิด</button>
                                    </center>
            </dialog>
            
            <script>
                (function () {
                    var dialog = document.getElementById('SecondDialog');
                    document.getElementById('leave').onclick = function() {
                        dialog.showModal();
                    };
                    document.getElementById('hide1').onclick = function() {
                        dialog.close();
                    };
                })();
            </script>
            </form>     
            <br><br>
            
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