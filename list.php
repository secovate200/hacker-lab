<?php

require_once "./db.php";
mysqli_set_charset($conn, "utf8mb4");

// 1. 페이지 설정
$list_size = 10; // 한 페이지에 보여줄 게시글 수
$page = isset($_GET['p']) ? (int)$_GET['p'] : 1; // 현재 페이지 번호
if ($page < 1) $page = 1;

$offset = ($page - 1) * $list_size; // SQL 시작 위치 계산

// 2. 전체 게시글 수 조회
$total_sql = "SELECT COUNT(*) AS cnt FROM posts";
$total_res = mysqli_query($conn, $total_sql);
$total_row = mysqli_fetch_assoc($total_res);
$total_posts = $total_row['cnt'];
$total_pages = ceil($total_posts / $list_size); // 전체 페이지 수 계산

// 3. 현재 페이지에 해당하는 데이터만 조회
$sql = "SELECT p.*, u.name AS author_name 
        FROM posts p 
        LEFT JOIN users u ON p.user_id = u.id 
        ORDER BY p.id DESC 
        LIMIT $offset, $list_size";
$res = mysqli_query($conn, $sql);
?>

<div class="admin-menu">
  <?php
  if(!isset($_SESSION["username"])){
    echo "안녕하세요 방문해 주셔서 감사합니다. 로그인 해주세요.";
  } else {
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
    if(mysqli_num_rows($res) > 0) {
      while($row = mysqli_fetch_assoc($res)) {
        $is_secret = $row['is_secret'] == 1;
        $view_link = $is_secret ? "password.php?id={$row['id']}" : "?page=view&id={$row['id']}";
        $date = date("Y-m-d", strtotime($row['created_at']));
        ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td class="title-column">
            <a href="<?php echo $view_link; ?>">
              <?php if($is_secret): ?>
                <span class="secret-tag">[비밀글]</span>
              <?php endif; ?>
              <?php echo htmlspecialchars($row['title']); ?>
            </a>
          </td>
          <td><?php echo htmlspecialchars($row['author_name'] ?? '알 수 없음'); ?></td>
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
  <?php if($page > 1): ?>
    <a href="?page=list&p=<?php echo $page-1; ?>">&laquo;</a>
  <?php endif; ?>

  <?php for($i=1; $i<=$total_pages; $i++): ?>
    <a href="?page=list&p=<?php echo $i; ?>" class="<?php echo ($page == $i) ? 'active' : ''; ?>">
      <?php echo $i; ?>
    </a>
  <?php endfor; ?>

  <?php if($page < $total_pages): ?>
    <a href="?page=list&p=<?php echo $page+1; ?>">&raquo;</a>
  <?php endif; ?>
</div>