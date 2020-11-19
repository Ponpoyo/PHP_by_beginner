<?php
// 四則演算を行うAPIもどき

// 文字コード設定
header('Content-Type: application/json; charset=UTF-8');

// IDチェック(XXXXのところは正常なIDを入力)
if(isset($_GET["key_id"]) && ($_GET["key_id"]=="XXXXXXX")){  // IDが正常か
} else{   
    $arr["status"] = "NO";
    $arr["error"]="Wrong key_id.";

    print json_encode($arr, JSON_PRETTY_PRINT); //ステータスを返す
    exit();
}

// 正常状態
if((isset($_GET["A"]) && !preg_match('/[^0-9]/', $_GET["A"])) && isset($_GET["B"]) && !preg_match('/[^0-9]/', $_GET["B"])) {
    // エスケープ処理
    $A = htmlspecialchars($_GET["A"]);
    $B = htmlspecialchars($_GET["B"]);
    
    $arr["status"] = "YES"; //status正常
    $arr["error"] = "None";
    $arr["add"] = (string)((int)$A + (int)$B); //足し算
    $arr["sub"] = (string)((int)$A - (int)$B); //引き算
    $arr["mul"] = (string)((int)$A * (int)$B); //掛け算
    $arr["div"] = (string)((int)$A / (int)$B); //割り算
} else { //異常状態
    //GETが不正な場合
    $arr["status"] = "NO";
    $arr["error"]="Check GET whether you wrote of get only number.";
}


print json_encode($arr, JSON_PRETTY_PRINT);

?>
