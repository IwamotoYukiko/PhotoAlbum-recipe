<?php
//1. POSTデータ取得
var_dump($_POST);
$name = $_POST["name"];
$junle = $_POST["junle"];
$material = $_POST["material"];
$method = $_POST["method"];
$memo = $_POST["memo"];
$upfile = $_FILES["upfile"]['tmp_name']; //画像を上げる際は$_FILES

//2. DB接続
try {
  $pdo = new PDO('mysql:dbname=recipe_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//3．データ登録SQL作成 
$stmt = $pdo->prepare("INSERT INTO r_table(id, name, junle, material, method, memo, upfile)
VALUES(NULL, :a1, :a2, :a3, :a4, :a5, :a6)");
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);  
$stmt->bindValue(':a2', $junle, PDO::PARAM_STR);  
$stmt->bindValue(':a3', $material, PDO::PARAM_STR); 
$stmt->bindValue(':a4', $method, PDO::PARAM_STR);
$stmt->bindValue(':a5', $memo, PDO::PARAM_STR);
$stmt->bindValue(':a6', file_get_contents($upfile), PDO::PARAM_STR);  
$status = $stmt->execute();

//4．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //5．index.phpへリダイレクト注意
  header("Location: form.php");
  exit;
}
?>
