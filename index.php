
<?php
  require_once "db.php";
  require_once "./layout/header.php";
  $page=$_GET["page"]?? "list";
  
    switch($page){
      case "list":require_once "list.php"; break;
      case "login": require_once "login.php"; break;
      case "write":require_once "write.php";break;
      case "register":require_once "register.php";break;
      case "mypage":require_once "mypage.php";break;
      case "view":require_once "view.php";break;
      case "admin":require_once "admin.php";break;
      case "master":require_once "master.php";break;
    }
  

  require_once "./layout/footer.php";

?>
  
  
