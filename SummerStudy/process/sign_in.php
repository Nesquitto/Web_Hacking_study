<?php
session_start();
$conn = mysqli_connect("localhost", "root", "111111", "info");
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['id']),
  'pw'=>mysqli_real_escape_string($conn, $_POST['pw'])
);

  $sql = "SELECT * FROM privacy";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)){
    if($row['id']==$filtered['id']){
      if($row['pw']==$filtered['pw']){
        $_SESSION['id'] = $row['id'];
        $_SESSION['num'] = $row['num'];
        header('Location: ../index.php');

      }
    }
  }
  if($success !=1){
    $success = 0;
?>
    <form action="../index.php" method="post">
      <h1>로그인에 실패했습니다. 다시 입력해주세요.</h1>
      <input type="hidden" name="success" value="<?=$success?>">
      <input type="submit" name="submit" value="메인창으로 돌아가기">
    </form>
<?php
  }
?>
