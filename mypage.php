
    <main>
      <div class="tabs">
        <button class="tab-link active" onclick="openTab(event, 'info-edit')">
          회원정보 수정
        </button>
        <button class="tab-link" onclick="openTab(event, 'my-posts')">
          내가 쓴 글
        </button>
      </div>

      <div id="info-edit" class="tab-content active">
        <div class="mypage-form">
          <form action="#" method="POST">
            <div class="form-group">
              <label>이름</label>
              <input type="text" value="홍길동" required />
            </div>
            <div class="form-group">
              <label>이메일 주소</label>
              <input type="email" value="gildong@example.com" required />
            </div>
            <div class="form-group">
              <label>현재 비밀번호</label>
              <input
                type="password"
                placeholder="정보 수정을 위해 입력하세요"
              />
            </div>
            <div class="form-group">
              <label>새 비밀번호</label>
              <input type="password" placeholder="변경할 경우에만 입력하세요" />
            </div>
            <button type="submit" class="btn-login" style="width: 100%">
              개인정보 저장하기
            </button>
          </form>

          <div class="withdraw-section">
            <div class="withdraw-title">계정 삭제</div>
            <div class="withdraw-box">
              <span style="font-size: 13px; color: #666">
                계정 탈퇴 시 모든 데이터가 삭제되며 복구할 수 없습니다.
              </span>
              <a
                href="#"
                style="
                  color: #e74c3c;
                  font-size: 14px;
                  font-weight: bold;
                  text-decoration: underline;
                "
              >
                탈퇴하기
              </a>
            </div>
          </div>
        </div>
      </div>

      <div id="my-posts" class="tab-content">
        <table>
          <thead>
            <tr>
              <th>번호</th>
              <th>제목</th>
              <th>작성일</th>
              <th>조회</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>12</td>
              <td class="title-column">
                <a href="view.html">마이페이지 탭 디자인 제안합니다.</a>
              </td>
              <td>2024-05-21</td>
              <td>5</td>
            </tr>
            <tr>
              <td>8</td>
              <td class="title-column">
                <a href="password.html">
                  <span class="secret-tag">[비밀글]</span> 개인정보 관련 문의
                </a>
              </td>
              <td>2024-05-18</td>
              <td>2</td>
            </tr>
          </tbody>
        </table>
        <div class="pagination">
          <a href="#" class="active">1</a>
          <a href="#">2</a>
        </div>
      </div>
    </main>

    <script>
      function openTab(evt, tabName) {
        const tabContents = document.getElementsByClassName("tab-content");
        for (let i = 0; i < tabContents.length; i++) {
          tabContents[i].style.display = "none";
        }
        const tabLinks = document.getElementsByClassName("tab-link");
        for (let i = 0; i < tabLinks.length; i++) {
          tabLinks[i].className = tabLinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
      }
    </script>
 