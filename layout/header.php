<?php
session_start();
require_once "./db.php";
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
            
            <?php if (!isset($_SESSION["name"])): ?>
                <a href="?page=login">로그인</a>
                <a href="?page=register">회원가입</a>
            <?php else: ?>
             

                <?php if ($_SESSION["role"] == "master"): ?>
                    <a href="?page=master">마스터페이지</a>
                <?php endif; ?>

                <?php if ($_SESSION["role"] == "admin" || $_SESSION["role"] == "master"): ?>
                    <a href="?page=admin">관리자 페이지</a>
                <?php endif; ?>

                <a href="?page=mypage">마이페이지</a>
                <a href="proc/logout.php">로그아웃</a>
            <?php endif; ?>
        </div>
    </header>