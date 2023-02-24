<!-- แถบเมนูindex -->
<?php if (isset($_SESSION['id'])) { ?>
                        <li class="nav-item"><a class="nav-link"> รหัสพนักงาน&nbsp;<?php echo $_SESSION['id']; ?>&nbsp;คุณ<?php echo $_SESSION['name']; ?></a></li>
		                <?php }  ?>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="history1.php">ประวัติการเข้างาน</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="history.php">ประวัติการลางาน</a></li>
			            <li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Logout</a></li>



<!-- แถบเมนู history -->
<li class="nav-item"><a class="nav-link active" aria-current="page"> รหัสพนักงาน&nbsp;<?php echo $_SESSION['id']; ?>&nbsp;คุณ<?php echo $_SESSION['name']; ?></a></li>
		                <?php }  ?>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="history1.php">ประวัติการเข้างาน</a></li>
                        <li class="nav-item"><a class="nav-link" href="history.php">ประวัติการลางาน</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">ย้อนกลับ</a></li>
			            <li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Logout</a></li>