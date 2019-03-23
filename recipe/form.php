<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>

<div class= "wrap">
<form method="post" action="insert.php" enctype="multipart/form-data">
    <div class="form-wrap">
        <div class="form-inner">
        <h1>レシピを追加</h1>
        <p><input type="text" name="name" class="form-parts" placeholder="レシピ名"></p>
        <p>ジャンル：<select name="junle">
          <option value="お肉のおかず">お肉のおかず</option>
          <option value="魚介のおかず">魚介のおかず</option>
          <option value="副菜">副菜</option>
        </select></p>
        <p><input type="text" name="material" class="form-parts" placeholder="材料"></p>
        <p><textarea name="method" cols="32" rows="10" placeholder="作り方"></textarea></p>
        <p><input type="text" name="memo" class="form-parts" placeholder="メモ"></p>
        <p>写真：<input type="file" id="upfile" name="upfile"></p>
        <img id="img1" style="width:350px;height:200px;" />
     <div class="submit"><input id="submitbtn" type="submit" class="j_btn" value="upload"></div>
    </div>
    </div>
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