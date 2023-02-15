<?php
    session_start();

    //9.fetch and delete record
    include_once "dbconnect.php"; //หรือใช้ require_once
        if (isset($_GET['user_id'])) {
            $sql = "SELECT * FROM project WHERE user_id = " . $_GET['user_id'];
            $result = mysqli_query($con, $sql);
        }

    // fetch records
    //$sql = "SELECT * FROM post ORDER BY user_id ASC"; //มากไปน้อย DESC น้อยไปมาก ASC
    //$result = mysqli_query($con, $sql);
    $sql = "SELECT * FROM post WHERE user_id = '".$_SESSION['id']."'";
    $result = mysqli_query($con,$sql) or die("Error:" . mysqli_error());

    $cnt = 1;

    // delete record ลบการบันทึก
    if (isset($_GET['user_id'])) {
        $sql = "DELETE FROM post where user_id = " . $_GET['user_id'];
        mysqli_query($con, $sql);
        header("location: show_user.php");
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
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!-- ชื่อระบบมุมซ้าย -->
                <div class="col-md-5"><a class="navbar-brand" href="#!">LOGIN POS</a></div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
                    <?php if (isset($_SESSION['id'])) { ?>
                        <li class="nav-item"><a class="nav-link active" aria-current="page"> รหัสพนักงาน&nbsp;<?php echo $_SESSION['id']; ?>&nbsp;คุณ<?php echo $_SESSION['name']; ?></a></li>
		                <?php }  ?>
                        <li class="nav-item"><a class="nav-link" href="history.php">ประวัติการเข้างาน</a></li>
			            <li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Logout</a></li>
     			    <!-- <li class="active"><a href="admin_login.php">Admin</a></li> -->
                </ul>
                </div>
            </div>
        </nav>

 <header><br>
 <div class="container">
     <!-- <div class="row"> -->
            <div class="form-group">
				<input type="button" onclick="window.location='index.php'" value="ย้อนกลับ" class="btn btn-dark" />
			</div>
            <h1 class="text-center">ตารางลงชื่อ</h1>	
            <div class="table-responsive">
                <table class="table table-bordered  bg-white ">
                    <thead>
                     <tr><center>
                         <th>รหัสพนักงาน</th>
                         <th>ชื่อ</th>
                         <th>ลงชื่อเข้าทำงาน</th>
                         <th>วันที่เริ่มต้น</th>
                         <th>วันที่สิ้นสุด</th>
                         <th>เวลา</th>
                         <th>หมายเหตุ</th>

                         <th colspan="2" style="text-align:center">กิจกรรม</th>
                     </tr></center>
                </thead>
            <tbody>

                <!--10.show all users in this part of table ใช้วน loop ด้วยคำสั่ง while -->
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $row['user_id'];?></td>
                        <td><?php echo $row['user_name'];?></td>
                        <td><?php echo $row['user_type'];?></td>
                        <td><?php echo $row['user_date1'];?></td>
                        <td><?php echo $row['user_date2'];?></td>
                        <td><?php echo $row['user_time'];?></td>
                        <td><?php echo $row['user_note'];?></td>
                        <td><input type="button" value="แก้ไข" name="btn-edit" class="btn btn-dark" onclick = "update_user (<?php echo $row['user_id']; ?>);"></td>
                        <!-- <td><input type="button" value="ลบ" name="btn-delete" class="btn btn-danger" onclick ="delete_user (<?php echo $row['user_id']; ?>);"></td> -->
                    </tr>
                <?php } ?>
                </tbody>
             </table>
            </div>
            <!--12.display number of records -->
            <center><div>มีข้อมูลทั้งหมด <?php echo mysqli_num_rows($result) . " ข้อมูล"; ?></div></center><br>
        <!-- </div> -->
     </div>
 </div>
 <!--11.JavaScript for edit and delete actions -->
     <script>
        //delete
        function delete_user(id) {
            if (confirm("คุณต้องการลบข้อมูลหรือไม่ ?")) {
                window.location.href = "show_user.php?user_id=" + id;
            }
        }
        //update
        function update_user(id) {
            window.location.href = "update_user.php?user_id=" + id;
        }
    </script>
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