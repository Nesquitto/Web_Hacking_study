<?php
$conn = mysqli_connect("localhost", "root", "111111", "info");

if($_POST['pw']==$_POST['pw_re']){

  $sql = "
    INSERT INTO privacy
      (id, pw, profile)
      VALUES(
          '{$_POST['id']}',
          '{$_POST['pw']}',
          '{$_POST['profile']}'
        )
    ";

    $result = mysqli_query($conn, $sql);
    if($result === false){
    echo "데이터가 올바르지 않습니다. 관리자에게 문의해주세요.";
    }
    else {
    echo '가입 완료했습니다. <a href="index.php">돌아가기</a>';
    }
}
else {
  echo "비밀번호가 올바르지 않습니다. 다시 시도해주세요.";
  ?>
  <a href="sign_up.php">돌아가기</a>
<?php
}
?>
