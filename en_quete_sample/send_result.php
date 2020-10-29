<?php 
    ///////////////////////
    // 定義
    ///////////////////////

    // ファイルパス
    $fliePath="./log/log";

    // 標準時設定
    date_default_timezone_set('Asia/Tokyo');
    
    // 時間表記
    $time = date("Y/m/d H:i:s");


    // ファイルアクセス
    $fp=fopen($fliePath, "a+");

    // アクセスロック
    flock($fp, LOCK_EX);

    // ファイル出力

    // 名前と時間
    $name = $_POST['name']; //名前
    fputs($fp,$time.",".$name);

    // 果物    
    $fruits = $_POST['fruits'];
    foreach($fruits as $value){
        fputs($fp,",".$value);
    }

    // 自由記述
    $freeForm = $_POST['freeForm'];
    fputs($fp,",".$freeForm);

    // 改行
    fputs($fp,"\n");

    // アクセスアンロック
    flock($fp,LOCK_UN);

    header("Location: ./success.php");
    exit();

?>

<html>
<head><title>送信中</title></head>
<body>
</body>
</html>