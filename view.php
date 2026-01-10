<?php
require_once "./db.php";
mysqli_set_charset($conn, "utf8mb4");
$postId= isset($_GET['id']) ? (int)$_GET['id']:0;// id가 존재하는지 알아본다.
?>
<main>
 <?php
 if($postId !=0){
  $sql= "SELECT p.*, u.name AS author_name 
            FROM posts p 
            LEFT JOIN users u ON p.user_id = u.id 
            WHERE p.id = $postId";
  $res =mysqli_query($conn,$sql);
  $post= mysqli_fetch_assoc($res);
  // 게시글이 존재하지 않을 경우 처리
    if (!$post) {
        echo "<script>alert('존재하지 않는 게시글입니다.'); history.back();</script>";
        exit;
    }
 }else {
    echo "<script>alert('잘못된 접근입니다.'); location.href='?page=list';</script>";
    exit;
}

 $date = date("Y-m-d", strtotime($post['created_at'])); // 날짜 형식을 맞춘다.
 ?>
  <div class="view-container">
    <div class="view-header">
      <h2><?= $post['title']?></h2>
      
      <div class="post-info">
        <span><strong>작성자:</strong><?=$post['author_name']?></span>
        <span><strong>날짜:</strong> <?=$date?></span>
      </div>
    </div>
<?php if(!empty($post['file_name'])){?>
    <div class="file-section">
      <strong>첨부파일</strong>
      <a href="<?= $post['file_path'] ?>" download class="file-link"
        ><?=$post['file_name']?></a
      >
    </div>
<?php } ?>
    <div class="view-content">
      <?= $post['content'];
      
      ?>
    </div>
  </div>

  <div class="view-footer">
    <a href="index.html" class="btn-write" style="background-color: #666"
      >목록으로</a
    >
    <div style="display: flex; gap: 10px">
      <a
        href="password.html?type=edit"
        class="btn-write"
        style="background-color: #f39c12"
        >수정</a
      >
      <a
        href="password.html?type=delete"
        class="btn-write"
        style="background-color: #e74c3c"
        >삭제</a
      >
    </div>
  </div>
</main>
