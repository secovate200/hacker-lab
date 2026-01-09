<?php
  require_once "layout/header.php";
?>
<main>
  <div class="password-container">
    <h2 id="pass-title">비밀번호 확인</h2>
    <p id="pass-msg">게시글 작성 시 설정한 비밀번호를 입력해주세요.</p>

    <form action="#" method="POST" onsubmit="return checkPassword()">
      <input
        type="password"
        class="password-input"
        placeholder="비밀번호 입력"
        required
        autofocus
      />

      <div class="btn-group">
        <button type="submit" class="btn-pass btn-submit">확인</button>
        <a href="javascript:history.back();" class="btn-pass btn-cancel"
          >취소</a
        >
      </div>
    </form>
  </div>
</main>
