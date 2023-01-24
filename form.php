<?php
		//2.save regist info into database
		//2.1 เพิ่ม ข้อมูล user สำหรับ ฐานข้อมูล
        session_start();
		include_once "connect.php"; //หรือใช้ require_once

		//เช็คว่า ฟอร์ม มีการกดปุ่ม submit โดยใช้คำสั่ง isset ($_POST['ชื่อปุ่ม'])
		if (isset($_POST['send'])) {
			//ตรวจสอบข้อมูล
			$id =$_POST['id'];
			$name =$_POST['name'];
			$type =$_POST['type'];
			$note = $_POST['note'];
            $date = $_POST['date'];
            $time = $_POST['time'];
			
		//2.2 ตรวจสอบความถูกต้องของข้อมูล user 
		//สร้างตัวแปร validate_error เพื่อเช็ค error
		$validate_error = false;
		//สร้างตัวแปรอีกตัว เพื่อแจ้งข้อความ
		$validate_msg = "";

		if (!$validate_error){
			//เพิ่มข้อมูล project ในตาราง
			$sql = "INSERT INTO form (id , name , type, note , date , time)
			VALUE('" . $id . "' , '" . $name . "' , '" . $type . "' , '" . $note . "' , '" . $date . "' , '" . $time . "')"; 
	
			if (mysqli_query($con, $sql));
			//execute without error

			header("location: index.php"); 

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

                        <?php if (isset($_SESSION['id'])) { ?>
                        <a><p class="text-secondary">รหัสพนักงาน&nbsp;<?php echo $_SESSION['id']; ?>&nbsp;คุณ<?php echo $_SESSION['name']; ?></p></a>
		            <?php }  ?>
			            
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="login.php">Logout</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li> -->
                        <!-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>


<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="form"  enctype="multipart/form-data" name="sendform">
				<fieldset>
					<div class="form-group">
                        <center>
                        <div class="form-group">
						    <label for="name">วัน</label>
						    <input type="date" name="date" required class="form-control" />
					    </div><br>

                        <div class="form-group">
						    <label for="name">เวลา</label>
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
                    </center>
					
					<center><br>
					<div class="form-group">
						<input type="submit" name="send" value="ส่ง" class="btn btn-secondary"/>
					</div>
                    <br>
					<button onclick="document.location='index.php'" class="btn btn-secondary">ย้อนกลับ</button>
					</center>
				</fieldset>
			</form>
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
</body>
</html>
