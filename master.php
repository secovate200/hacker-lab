
    <div class="master-admin-menu">
      <strong>Master</strong> 권한으로 접속 중입니다. 사이트 전체 권한을 제어할
      수 있습니다.
    </div>

    <main>
      <div class="top-control">
        <div class="search-box">
          <select>
            <option>이름</option>
            <option>아이디</option>
            <option>권한</option>
          </select>
          <input type="text" placeholder="사용자 검색" />
          <button
            type="button"
            class="btn btn-search"
            style="
              background-color: #666;
              color: white;
              border: none;
              padding: 8px 15px;
              border-radius: 3px;
              cursor: pointer;
            "
          >
            검색
          </button>
        </div>
        <div class="total-count">검색 결과 <strong>254</strong>명</div>
      </div>

      <table>
        <thead>
          <tr>
            <th style="width: 300px">사용자 정보</th>
            <th>현재 권한</th>
            <th>변경 권한</th>
            <th>실행</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="user-info-cell">
              <strong>김철수</strong>
              <span>user_chulsoo</span>
            </td>
            <td><span class="status-badge status-user">일반유저</span></td>
            <td>
              <select class="role-select">
                <option selected>일반유저</option>
                <option>관리자</option>
                <option>마스터</option>
              </select>
            </td>
            <td>
              <button
                class="btn-master-apply"
                onclick="alert('권한이 변경되었습니다.')"
              >
                적용
              </button>
            </td>
          </tr>
          <tr>
            <td class="user-info-cell">
              <strong>이영희</strong>
              <span>admin_young</span>
            </td>
            <td><span class="status-badge status-admin">관리자</span></td>
            <td>
              <select class="role-select">
                <option>일반유저</option>
                <option selected>관리자</option>
                <option>마스터</option>
              </select>
            </td>
            <td>
              <button class="btn-master-apply">적용</button>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">&raquo;</a>
      </div>
    </main>
