
    <main class="write-page-container">
      <form action="#" method="POST" enctype="multipart/form-data">
        <table class="write-form-table">
          <tr>
            <th>제목</th>
            <td>
              <input
                type="text"
                placeholder="제목을 입력하세요"
                required
                autofocus
              />
            </td>
          </tr>

          <tr>
            <th>보안 설정</th>
            <td>
              <div class="auth-flex">
                <input
                  type="password"
                  class="input-password"
                  placeholder="비밀번호(수정/삭제 시 필요)"
                  required
                />
                <label class="checkbox-label">
                  <input type="checkbox" name="is_secret" />
                  비밀글로 설정
                </label>
              </div>
            </td>
          </tr>

          <tr>
            <th>파일 첨부</th>
            <td>
              <div class="file-upload-wrapper">
                <input type="file" name="attachment" />
                <span class="file-info-text"
                  >* 최대 10MB까지 업로드 가능합니다.</span
                >
              </div>
            </td>
          </tr>

          <tr>
            <th>내용</th>
            <td style="padding: 10px 20px">
              <textarea
                class="input-content"
                placeholder="건전한 커뮤니티 문화를 위해 타인에 대한 비방은 삼가주세요."
                required
              ></textarea>
            </td>
          </tr>
        </table>

        <div class="btn-group">
          <button
            type="submit"
            class="btn-login"
            style="margin: 0; width: 140px; background: #333; font-weight: bold"
          >
            등록하기
          </button>
          <a
            href="javascript:history.back();"
            class="btn-login"
            style="
              margin: 0;
              width: 140px;
              background: #888;
              text-decoration: none;
              display: flex;
              align-items: center;
              justify-content: center;
              font-weight: bold;
            "
            >취소</a
          >
        </div>
      </form>
    </main>
