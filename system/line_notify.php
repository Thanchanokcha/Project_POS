<?php
    session_start();
    require_once("dbconnect.php");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    date_default_timezone_set("Asia/Bangkok");

    $sToken = "pEdSc0O8w2Xstpc2ly2aJR6uDf2JbF8KaZMP5377uEu";
    $sMessage = "จำนวนผู้ที่ลงชื่อเข้างานวันนี้";
    $sMessage = "จำนวนผู้ที่ลางาน/";
    $sMessage = "แจ้งเตือนการสมัครสมาชิก!\r\n";
    $sMessage = "แจ้งเตือนการสมัครสมาชิก!\r\n";


    $chOne = curl_init(); 
    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt( $chOne, CURLOPT_POST, 1); 
    curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
    $result = curl_exec( $chOne ); 

    //Result error 
    if(curl_error($chOne)) 
    { 
        echo 'error:' . curl_error($chOne); 
    } 
    else { 
        $result_ = json_decode($result, true); 
        echo "status : ".$result_['status']; echo "message : ". $result_['message'];
    } 
    curl_close( $chOne );   
              
                    foreach(){
                        notify_message():
                    }
                    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว <a href='login.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: register.php");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: register.php");
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>