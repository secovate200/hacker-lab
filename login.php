<?php
require_once "conn.php";
if (isset($_POST["username"], $_POST["password"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql="select * from users where username='$username'and password='$password'";
    $result= mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) !=0){
      $user=mysqli_fetch_assoc($result);
      $_SESSION['user_idx'] = $user['idx'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        echo "<script>alert('".$user['username']."님, 환영합니다!'); location.href='index.php';</script>";
    }else {
        echo "<script>alert('로그인 정보가 올바르지 않습니다.'); history.back();</script>";
    }
}

?>
    <main class="login-container">
      <h2>로그인</h2>
      <form action="login.php" method="POST">
        <div class="form-group">
          <label for="username">아이디</label>
          <input
            type="text"
            id="username"
            name="username"
            placeholder="아이디를 입력하세요"
            required
          />
        </div>
        <div class="form-group">
          <label for="password">비밀번호</label>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="비밀번호를 입력하세요"
            required
          />
        </div>

        <button type="submit" class="btn-login">로그인하기</button>
      </form>

      <div class="login-footer">
        <a href="?page=register">회원가입</a> |
        <a href="#">아이디/비밀번호 찾기</a>
      </div>
    </main>
  