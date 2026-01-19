<?php
require_once "conn.php";

// 1. 페이지네이션 설정
$list_size = 10; // 한 페이지에 보여줄 게시글 수
$page_num = isset($_GET['p']) ? (int)$_GET['p'] : 1; // 현재 페이지 번호
$offset = ($page_num - 1) * $list_size; // 데이터를 가져올 시작 지점

// 2. 전체 게시글 수 조회
$total_sql = "SELECT COUNT(*) AS cnt FROM board";
$total_res = mysqli_query($conn, $total_sql);
$total_row = mysqli_fetch_assoc($total_res);
$total_posts = $total_row['cnt'];
$total_pages = ceil($total_posts / $list_size); // 전체 페이지 수

// 3. 현재 페이지에 해당하는 데이터만 가져오기
$sql = "SELECT * FROM board ORDER BY idx DESC LIMIT $offset, $list_size";
$result = mysqli_query($conn, $sql);
?>

<div class="admin-menu">
    <?php if (isset($_SESSION['username'])): ?>
        <strong><?= $_SESSION['username'] ?></strong>님 반갑습니다. 
        (권한: <?= $_SESSION['role'] ?>)
    <?php else: ?>
        로그인이 필요합니다. <a href="?page=login" style="color: #00ffcc; text-decoration: underline;">로그인 하러 가기</a>
    <?php endif; ?>
</div>

<div class="top-control">
    <div class="search-box">
        </div>
    <a href="?page=write" class="btn-write">새 글 쓰기</a>
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
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['idx'] ?></td>
                    <td class="title-column">
                        <?php 
                        $link = ($row['is_secret'] == 1) ? "password.php?idx=".$row['idx'] : "?page=view&idx=".$row['idx'];
                        ?>
                        <a href="<?= $link ?>">
                            <?= ($row['is_secret'] == 1) ? "<span class='secret-tag'>[비밀글]</span> " : "" ?>
                            <?= htmlspecialchars($row['title']) ?>
                        </a>
                    </td>
                    <td><?= htmlspecialchars($row['author']) ?></td>
                    <td><?= date("Y-m-d", strtotime($row['reg_date'])) ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="4">게시글이 없습니다.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<div class="pagination">
    <?php if($page_num > 1): ?>
        <a href="?page=list&p=<?= $page_num - 1 ?>">&laquo;</a>
    <?php endif; ?>

    <?php for($i = 1; $i <= $total_pages; $i++): ?>
        <a href="?page=list&p=<?= $i ?>" class="<?= ($i == $page_num) ? 'active' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>

    <?php if($page_num < $total_pages): ?>
        <a href="?page=list&p=<?= $page_num + 1 ?>">&raquo;</a>
    <?php endif; ?>
</div>