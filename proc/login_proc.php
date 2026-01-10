<?php
session_start();
require_once "../db.php";
$userEmail=$_POST["email"];
$userPassword=$_POST["password"];
$sql= "select * from users WHERE email='$userEmail' and password ='$userPassword'";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res) != 0){
    // 3. 로그인 성공: 세션에 주요 정보 저장
    $user = mysqli_fetch_assoc($res);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role']; // user, admin, master 구분
        echo "<script>alert('로그인되었습니다.'); location.href='../';</script>";
}else{
    echo "<script>alert('존재하지 않는 아이디입니다.'); history.back();</script>";
}
?>