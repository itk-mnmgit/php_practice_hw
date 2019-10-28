<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        header('Location: index.html');
    }

    $familyname = $_POST['familyname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    isset($_POST['checkmail']) ? $checkmail=$_POST['checkmail'] : $checkmail = '';
    $reservemonth = $_POST['reservemonth'];
    $reservedate = $_POST['reservedate'];
    $reservetime = $_POST['reservetime'];
    $inquery = $_POST['inquery'];

    if ($checkmail){
        $checkmail = "前日に確認メールを希望する";
    }else{
        $checkmail = "前日に確認メールを希望しない";
    }

    require_once('function.php');

// 未定義またはNULLではないか、また配列かどうかを確認
    if (isset($_POST['checkcontent']) && is_array($_POST['checkcontent'])) {
        $checkcontent = $_POST['checkcontent'];
    }
//配列を文字列に変換
    if (isset($_POST['checkcontent']) && is_array($_POST['checkcontent'])) {
        $checkcontent = implode(" / ", $_POST["checkcontent"]);
    }

?>




<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>入力内容確認</title>
    <style>
        body{background: #eeeeee;}
        div{
            text-align:center;
            }
        button{
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
            font-size: 16px;
            border-radius: 8px;
}
    </style>
</head>
<body>
    <div>
    <h1>入力内容確認</h1>
    <p><?php echo h("姓 : $familyname"); ?></p>
    <p><?php echo h("名 : $lastname"); ?></p>
    <p><?php echo h("メール : $email"); ?></p>
    <p><?php echo h("$checkmail"); ?></p>
    <p><?php echo h("内容 : $checkcontent"); ?></p>
    <p><?php echo h("日にち : $reservemonth/$reservedate $reservetime~"); ?></p>
    <p><?php echo h("ご相談 : $inquery"); ?></p>


    <form method = "POST" action = "thanks.php">
        <input type="hidden" name="familyname" value="<?php echo h($familyname); ?>">
        <input type="hidden" name="lastname" value="<?php echo h($lastname); ?>">
        <input type="hidden" name="email" value="<?php echo h($email); ?>">
        <input type="hidden" name="checkmail" value="<?php echo h($checkmail); ?>">
        <input type="hidden" name="checkcontent" value="<?php echo h($checkcontent); ?>">
        <input type="hidden" name="reservemonth" value="<?php echo h($reservemonth); ?>">
        <input type="hidden" name="reservedate" value="<?php echo h($reservedate); ?>">
        <input type="hidden" name="reservetime" value="<?php echo h($reservetime); ?>">
        <input type="hidden" name="inquery" value="<?php echo h($inquery); ?>">
        <button type="button" onclick="history.back()">戻る</button>
        <?php if($familyname != '' && $lastname != '' && $email != '' && $checkcontent != NULL && (strcmp("$reservemonth", "月") != 0) && (strcmp("$reservedate", "日") != 0 && $reservetime != '')): ?>
            <button type="submit">OK</button>
        <?php endif;?>
    </form>
        </div>
</body>
</html>