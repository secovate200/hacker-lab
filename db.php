<?php
// db.php
$host = "localhost";
$user = "root";     // DB 아이디
$pass = "";         // DB 비밀번호
$db   = "my_website";

// DB 연결
$conn = mysqli_connect($host, $user, $pass, $db);

// 연결 확인
if (!$conn) {
    die("연결 실패: " . mysqli_connect_error());
}

// 한글 깨짐 방지
mysqli_set_charset($conn, "utf8mb4");
?>