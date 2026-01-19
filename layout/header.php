<?php
  require_once "conn.php";
  header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <title>커뮤니티 게시판 - 목록</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
<header>
  <h1>자유 게시판</h1>
  <div class="auth-links">
    <a href="./">홈</a>
    <?php
    if (isset($_SESSION['username'])) { 
        // 세션이 존재함 = 로그인 된 상태
    ?>
        <a href="?page=mypage">마이페이지</a>
        <a href="?page=master">마스터페이지</a>
        <a href="?page=admin">관리자 페이지</a>
        <a href="logout.php">로그아웃</a>
    <?php 
    } else { 
        // 세션이 존재하지 않음 = 비로그인 상태
    ?>
        <a href="?page=login">로그인</a>
        <a href="?page=register">회원가입</a>
    <?php 
    } 
    ?>
  </div>
</header>