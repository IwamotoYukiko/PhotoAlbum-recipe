<?php
//DBに接続
try {
$pdo = new PDO('mysql:dbname=hralbum;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//レース
$stmt = $pdo->prepare("SELECT * FROM p_table WHERE junle = 'レース'ORDER BY date DESC");
$status = $stmt->execute();//降順
$r_view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $enc_img = base64_encode($result["upfile"]);
		try {
			$imginfo = @getimagesize('data:application/octet-stream;base64,' . $enc_img);
		} catch(Exception $e) {
			$imginfo = false;
         }
       $r_view .= '<li>';
      if($imginfo){
         $r_view .= '<img src="data:' . $imginfo['mime'] . ';base64,'.$enc_img.'" style="width:350px;height:100%;">';
        
    }
       $r_view .= '<p>'.'DATE:'.$result['date'].'</p>';
       $r_view .= '<p>'.$result['memo'].'</p>';
  } 
}

//パドック
$stmt = $pdo->prepare("SELECT * FROM p_table WHERE junle = 'パドック'ORDER BY date DESC");
$status = $stmt->execute();//降順
$p_view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $enc_img = base64_encode($result["upfile"]);
		try {
			$imginfo = @getimagesize('data:application/octet-stream;base64,' . $enc_img);
		} catch(Exception $e) {
			$imginfo = false;
         }
       $p_view .= '<li>';
      if($imginfo){
         $p_view .= '<img src="data:' . $imginfo['mime'] . ';base64,'.$enc_img.'"style="width:350px;height:100%;">';  
    }
       $p_view .= '<p>'.'DATE:'.$result['date'].'</p>';
       $p_view .= '<p>'.$result['memo'].'</p>';
  } 
}

//ウィナーズ
$stmt = $pdo->prepare("SELECT * FROM p_table WHERE junle = 'ウィナーズ'ORDER BY date DESC");
$status = $stmt->execute();//降順
$w_view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $enc_img = base64_encode($result["upfile"]);
		try {
			$imginfo = @getimagesize('data:application/octet-stream;base64,' . $enc_img);
		} catch(Exception $e) {
			$imginfo = false;
         }
       $w_view .= '<li>';
      if($imginfo){
         $w_view .= '<img src="data:' . $imginfo['mime'] . ';base64,'.$enc_img.'" style="width:350px;height:100%;">';    
    }
       $w_view .= '<p>'.'DATE:'.$result['date'].'</p>';
       $w_view .= '<p>'.$result['memo'].'</p>';
  } 
}

//馬
$stmt = $pdo->prepare("SELECT * FROM p_table WHERE junle = '馬'ORDER BY date DESC");
$status = $stmt->execute();//降順
$h_view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $enc_img = base64_encode($result["upfile"]);
		try {
			$imginfo = @getimagesize('data:application/octet-stream;base64,' . $enc_img);
		} catch(Exception $e) {
			$imginfo = false;
         }
       $h_view .= '<li>';
      if($imginfo){
         $h_view .= '<img src="data:' . $imginfo['mime'] . ';base64,'.$enc_img.'" style="width:350px;height:100%;">';
        
    }
       $h_view .= '<p>'.'DATE:'.$result['date'].'</p>';
       $h_view .= '<p>'.$result['memo'].'</p>';
  } 
}

//騎手
$stmt = $pdo->prepare("SELECT * FROM p_table WHERE junle = '騎手' ORDER BY date DESC");
$status = $stmt->execute();//降順
$j_view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $enc_img = base64_encode($result["upfile"]);
		try {
			$imginfo = @getimagesize('data:application/octet-stream;base64,' . $enc_img);
		} catch(Exception $e) {
			$imginfo = false;
         }
       $j_view .= '<li>';
      if($imginfo){
         $j_view .= '<img src="data:' . $imginfo['mime'] . ';base64,'.$enc_img.'" style="width:350px;height:100%;">';
        
    }
       $j_view .= '<p>'.'DATE:'.$result['date'].'</p>';
       $j_view .= '<p>'.$result['memo'].'</p>';
  } 
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>SlideShow</title>
        
</head>
<body>
    <nav>
    <a href="index.php"><h1 id="title">Photo Album</h1></a>
    <a href="form.php" class="right"><img src="img/camera.png"></a>
    </nav>
    
     <div class="wrap">

     <div class="welcom">
        <h1>Welcom to phot exhibition!</h1>
        <p>Scroll Down yo see more</p>
        <h2>«</h2>
    </div>

    <menu>
    <ul class="menuList">
        <li class="blur" id="race"><p>Race</p></li>
        <li class="blur" id="paddok"><p>paddok</p></li>
        <li class="blur" id="winners"><p>Winners</p></li>
        <li class="blur" id="horse"><p>Horse</p></li>
        <li class="blur" id="jockey"><p>Jockey</p></li>
    </ul>
    </menu>

    <ul class="thumbnails">
              <!-- <?=$p_view?>  -->
    </ul>

    <p id="page-top"><a href="#">«</a></p>


    </div>

    
    <footer>©Yukiko  All Rights Reserved.</footer>

    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>

    $('#title').click(function() {
        $('.welcom h1').html('Welcom to phot exhibition!');
        $('menu').removeClass('hidden');
        $('.thumbnails').html('');
    });

    $('#race').click(function() {
        $('.welcom h1').html('Race');
        $('menu').addClass('hidden');
        $('.thumbnails').html('<?=$r_view?>');;
    });

    $('#paddok').click(function() {
        $('.welcom h1').html('Paddok');
        $('menu').addClass('hidden');
        $('.thumbnails').html('<?=$p_view?>');
    });

    $('#winners').click(function() {
        $('.welcom h1').html('Winners');
        $('menu').addClass('hidden');
        $('.thumbnails').html('<?=$w_view?>');
    });

    $('#horse').click(function() {
        $('.welcom h1').html('Horse');
        $('menu').addClass('hidden');
        $('.thumbnails').html('<?=$h_view?>');
    });

    $('#jockey').click(function() {
        $('.welcom h1').html('Jockey');
        $('menu').addClass('hidden');
        $('.thumbnails').html('<?=$j_view?>');
    });

    $(function() {
    var topBtn = $('#page-top');    
    topBtn.hide();
  
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            topBtn.fadeIn();
        } else {
            topBtn.fadeOut();
        }
    });
    
    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
});


  </script>
</body>
</html>