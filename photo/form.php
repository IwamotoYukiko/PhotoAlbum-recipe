<?php
session_start();

$error_message = "";
  if(isset($_POST["login"])) {
  if($_POST["user_name"] == "aaa" && $_POST["password"] == "bbb") {
  $_SESSION["user_name"] = $_POST["user_name"];
  $login_success_url = "login_success.php";
  header("Location: {$login_success_url}");
  exit;
  }
}
$error_message = "※ID、もしくはパスワードが間違っています。<br>　もう一度入力して下さい。";

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Photos</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>

<nav>
    <a href="index.php"><h1 id="title">Photo Album</h1></a>
</nav>
    
<div class="form-wrap">
    <form method="post" action="insert.php" enctype="multipart/form-data">


        <p><select name="junle" required>
          <option value="レース">Race</option>
          <option value="パドック">Padokk</option>
          <option value="ウィナーズ">Winners</option>
          <option value="馬">Horse</option>
          <option value="騎手">Jockey</option>
        </select></p>
        <p><input type="text" name="memo" class="form-parts" placeholder="騎手、馬名、レース"></p>
        <p><input  type="date" name="date" id="date"></p>
        <p><input type="file" id="upfile" name="upfile" required></p>
        <img id="img1"style="width:400px;height:300px;object-fit:contain;" />
     <p><input id="submitbtn" type="submit" value="upload"></p>
    
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(function(){
  $('#upfile').change(function(e){
    //ファイルオブジェクトを取得する
    var file = e.target.files[0];
    var reader = new FileReader();
 
    //画像でない場合は処理終了
    if(file.type.indexOf("image") < 0){
      alert("画像ファイルを指定してください。");
      return false;
    }
 
    //アップロードした画像を設定する
    reader.onload = (function(file){
      return function(e){
        $("#img1").attr("src", e.target.result);
        $("#img1").attr("title", file.name);
      };
    })(file);
    reader.readAsDataURL(file);
 
  });
});
</script>
    
</body>
</html>