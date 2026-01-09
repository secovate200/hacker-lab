
    <main class="login-container">
      <h2>로그인</h2>
      <form action="index.html" method="POST">
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
  