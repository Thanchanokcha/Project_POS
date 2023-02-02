<?php
		//2.save regist info into database
		//2.1 เพิ่ม ข้อมูล user สำหรับ ฐานข้อมูล
		session_start();

		include_once "dbconnect.php"; //หรือใช้ require_once

		//เช็คว่า ฟอร์ม มีการกดปุ่ม submit โดยใช้คำสั่ง isset ($_POST['ชื่อปุ่ม'])
		if (isset($_POST['send'])) {
			//ตรวจสอบข้อมูล
			$type =$_POST['user_type'];
			$name = $_POST['user_name'];
			$id = $_POST['user_id'];
			// $breed = $_POST['user_breed'];
			// $color = $_POST['user_color'];
			// $gender = $_POST['user_gender'];
			// $age = $_POST['user_age'];
			$date =$_POST['user_date'];
			$time =$_POST['user_time'];
			$note =$_POST['user_note'];
			// $img = basename($_FILES["user_img"]["name"]);
			//$path="upload/" . $img;
	
			// $img_type = $_FILES['user_img']['type'];
			// $size = $_FILES['user_img']['size'];
			// $img_temp = $_FILES['user_img']['tmp_name'];
			
			// $path = "upload/" . $img;
			// if (!file_exists($path)){
			// 	move_uploaded_file($img_temp, 'upload/' .$img);
			// }
			// if($upload !='') {
			// 	$path="upload/";
			// 	//คัดลอกไฟล์ไปยังโฟลเดอร์
			// 	move_uploaded_file($_FILES['user_img'],$img ); 
			// }

			// if (empty($img)){
			// 	$validate_msg ="กรุณาเลือกรูปภาพ";
			// } else if ($img_type == "image/jpg" || $img_type == "image/jpeg" || $img_type == "image/png" || $img_type == "image/gif") {
			// 	if (!file_exists($path)){ //เช็คว่ามีไฟล์ที่อัปไหม
			// 		if ($size < 5000000) { //เช็คขนาดไฟล์ ไม่เกิน 5 mb
			// 			move_uploaded_file($img_temp, 'upload/' .$img); //เป็นการย้ายไฟล์ที่อัปไปยังโฟลเดอ upload
			// 		} else {
			// 			$validate_msg = "รูปภาพของคุณมีขนาดใหญ่เกิน 5 MB"; //เป็นการแจ้งว่าไฟล์มีขนาดใหญ่เกิน
			// 		}
			// 	} else {
			// 		$validate_msg = "คุณยังไม่อัปโหลดรูปภาพ";
			// 	}
			// } else {
			// 	$validate_msg = "กรุณาอัปโหลดรูปภาพที่มีนามสกุลเป็น JPG , JPEG , PNG และ GIF";
			// }
		
		//2.2 ตรวจสอบความถูกต้องของข้อมูล user 
		//สร้างตัวแปร validate_error เพื่อเช็ค error
		$validate_error = false;
		//สร้างตัวแปรอีกตัว เพื่อแจ้งข้อความ
		$validate_msg = "";

		if (!$validate_error){
			//เพิ่มข้อมูล project ในตาราง
			$sql = "INSERT INTO post(user_type, user_name, user_id, user_date, user_time, user_note )
			VALUE('" . $type . "'  , '" . $name . "'  , '" . $id . "'  , '" . $date . "' , '" . $time . "' , '" . $note . "')"; 
	
			if (mysqli_query($con, $sql));
			//execute without error

			// header("location: index.php");

			// header เป็นการลิ้งไปยังหน้า login โดยการใช้ location: ตามด้วยชื่อไฟล์ที่ต้องการให้ลิ้งไป 
			//เมื่อมีการกด signup จะไปอีกหน้าทันที
		} else {
			//error
		}
	}
		
?>

<!DOCTYPE html>
<html>
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
                        <li class="nav-item"><a class="nav-link"> รหัสพนักงาน&nbsp;<?php echo $_SESSION['id']; ?>&nbsp;คุณ<?php echo $_SESSION['name']; ?></a></li>
		                <?php }  ?>
			            <li class="nav-item"><a class="nav-link" href="login.php">Logout</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li> -->
                        <!-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>

<header>

<header>
	<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  enctype="multipart/form-data" name="sendform">
				<fieldset><br>
				<div class="form-group">
						<label for="name">รหัสพนักงาน</label>
						<?php echo $_SESSION['id']; ?>
					</div>

					<div class="form-group">
						<label for="name">ชื่อ</label>
						<?php echo $_SESSION['name']; ?>
					</div>
				

					<div class="form-group">
						<label for="name">ประเภท</label>
						<label for="name">ลากิจ</label>
						<input type="radio" name="user_type" value="ลากิจ">
						<label for="name">ลาป่วย</label>
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
					 <div class="form-group">
						<label for="name">ชื่อ</label>
						<input type="text" name="user_name" placeholder="" required value="<?php echo $_SESSION['name']; ?>" class="form-control" />
					</div>
			
					<div class="form-group">
						<label for="name">ชื่อ</label>
						<input type="id" name="user_id" placeholder="" required value="<?php echo $_SESSION['id']; ?>" class="form-control" />
					</div>

					<!-- <div class="form-group">
						<label for="name">พันธุ์</label>
						<input type="text" name="user_breed" placeholder="เช่น พุดเดิ้ล , สกอตติชโฟลด์ , เปอร์เซีย" required value="" class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">สี</label>
						<input type="text" name="user_color" placeholder="เช่น ดำ , ขาว , สามสี" required value="" class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">เพศ</label>
						<input type="text" name="user_gender" placeholder="เช่น ตัวผู้ หรือ ตัวเมีย" required value="" class="form-control" />
					</div> -->

					<!-- <div class="form-group">
						<label for="name">เพศ</label>
                        <select name="user_gender"required class="form-control">
                            <option value="ตัวผู้">ตัวผู้</option>
                            <option value="ตัวเมีย">ตัวเมีย</option>
                            <option value="ไม่ทราบ">ไม่ทราบ</option>
                        </select>
					</div> -->

					<!-- <div class="form-group">
						<label for="name">อายุ</label>
						<input type="text" name="user_age" placeholder="เช่น 2 ปี 3 เดือน " required class="form-control" />
					</div> -->

                    <div class="form-group">
						<label for="name">วันที่</label>
						<input type="date" name="user_date" required class="form-control" />
					</div>

                    <div class="form-group">
						<label for="name">เวลา</label>
						<input type="time" name="user_time"  required class="form-control" />
					</div>

                    <div class="form-group">
						<label for="name">หมายเหตุ</label>
						<input type="text" name="user_note" required class="form-control" />
					</div>
					
					<center>
					<div class="form-group">
						<input type="submit" name="send" value="ยืนยัน" class="btn btn-dark"/>
					</div>
					<button onclick="document.location='index.php'" class="btn btn-dark">ย้อนกลับ</button><br><br>
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
	<!-- <div class="row justify-content-center">
		<div class="col-md-4 col-md-offset-4 text-center">
		กรุณาคลิกปุ่มด้านล่างนี้ หากมีบัญชีแล้ว 
		<br><br>
		<button onclick="document.location='login.php'" class="btn btn-secondary">เข้าสู่ระบบ</button>
		</div>
	</div> -->
</div>
</header>

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