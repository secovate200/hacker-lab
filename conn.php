<?php
// DB 접속 정보
$host = "localhost";
$user = "root";     // 실제 DB 사용자명으로 변경하세요
$pass = ""; // 실제 DB 비밀번호로 변경하세요
$db_name = "hacker_lab";

// DB 연결
$conn = mysqli_connect($host, $user, $pass, $db_name);
mysqli_set_charset($conn, "utf8mb4");
// 연결 확인
if (!$conn) {
    die("연결 실패: " . mysqli_connect_error());
}



// 세션 시작 (로그인 정보 등을 유지하기 위해 필요)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>