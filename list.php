<?php

require_once "./db.php";
mysqli_set_charset($conn, "utf8mb4");

// 1. 페이지 설정
$list_size = 10; // 한 페이지에 보여줄 게시글 수
$page = isset($_GET['p']) ? (int)$_GET['p'] : 1; // 현재 페이지 번호 p가 없는 경우 1로 설정한다.
if ($page < 1) $page = 1; // page가 l보다 작을 경우 page는 1이다. 

$offset = ($page - 1) * $list_size; // SQL 시작 위치 계산 

// 2. 전체 게시글 수 조회
$total_sql = "SELECT COUNT(*) AS cnt FROM posts"; // count 로 post 개수를 계산한다.
$total_res = mysqli_query($conn, $total_sql); // db에 쿼리를 보내서 결과값을 total_res에 저장한다.
$total_row = mysqli_fetch_assoc($total_res); // 연관배열로 값을 변환한다. cnt: ...  이런식으로 저장될것 이다.
$total_posts = $total_row['cnt']; // cnt값을 가져온다.
$total_pages = ceil($total_posts / $list_size); // 전체 페이지 수 계산 

// 3. 현재 페이지에 해당하는 데이터만 조회
$sql = "SELECT p.*, u.name AS author_name 
        FROM posts p 
        LEFT JOIN users u ON p.user_id = u.id 
        ORDER BY p.id DESC 
        LIMIT $offset, $list_size"; // p의 전체걸럼과 u의 전체컬럼중 post의 user_id와 user를 연관시켜 가져온다. 글고 limit절로 포스트 개수를 제한한다.
$res = mysqli_query($conn, $sql);
?>

<div class="admin-menu">
  <?php
  if(!isset($_SESSION["username"])){ // 로그인 상태가 아닌경우 
    echo "안녕하세요 방문해 주셔서 감사합니다. 로그인 해주세요.";
  } else {// 로그인 상태인경우
    echo "<strong>{$_SESSION['username']}</strong>님 반갑습니다. (권한: {$_SESSION['role']})";
  }
  ?>
</div>

<table>
  <thead>
    <tr>
      <th>번호</th>
      <th>제목</th>
      <th>작성자</th>
      <th>날짜</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(mysqli_num_rows($res) > 0) { // db의 row개수가 0개가 아닌경우 실행한다.
      while($row = mysqli_fetch_assoc($res)) { // row를 연관배열로 바꿔서 반복문을 실행한다. 
        $is_secret = $row['is_secret'] == 1; //  is_secret가 1인 경우 true이다.
        $view_link = $is_secret ? "password.php?id={$row['id']}" : "?page=view&id={$row['id']}"; // is_secrit가 true인 경우 비밀글이므로 비밀번호 테스트를 한다. 아닌 경우는 바로 조회한다. 
        $date = date("Y-m-d", strtotime($row['created_at'])); // 날짜 형식을 맞춘다.
        ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td class="title-column">
            <a href="<?php echo $view_link; ?>">
              <?php if($is_secret){// 비밀글인 경우 ?> 
                <span class="secret-tag">[비밀글]</span>
              <?php } ?>
              <?php echo $row['title']; ?>
            </a>
          </td>
          <td><?php echo $row['author_name'] ?? '알 수 없음'; ?></td>
          <td><?php echo $date; ?></td>
        </tr>
        <?php
      }
    } else {
      echo "<tr><td colspan='4' style='text-align:center;'>게시글이 없습니다.</td></tr>";
    }
    ?>
  </tbody>
</table>

<div class="pagination">
  <?php if($page > 1){// page가 1 이상인 경우 아래와 같이 링크연결을 한다.?> 
    <a href="?page=list&p=<?php echo $page-1; ?>">&laquo;</a> 
  <?php } ?>

  <?php for($i=1; $i<=$total_pages; $i++){ ?>
    <a href="?page=list&p=<?php echo $i; ?>" class="<?php echo ($page == $i) ? 'active' : ''; ?>">
      <?php echo $i; ?>
    </a>
  <?php } ?>

  <?php if($page < $total_pages): ?>
    <a href="?page=list&p=<?php echo $page+1; ?>">&raquo;</a>
  <?php endif; ?>
</div>