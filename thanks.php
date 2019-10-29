<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        header('Location: reserve.html');
    }

    $familyname = $_POST['familyname'];
    $lastname = $_POST['lastname'];
    $checkcontent = $_POST['checkcontent'];
    $email = $_POST['email'];
    $checkmail=$_POST['checkmail'];
    $reservemonth = $_POST['reservemonth'];
    $reservedate = $_POST['reservedate'];
    $reservetime = $_POST['reservetime'];
    $inquery = $_POST['inquery'];

    require_once('function.php');
    require_once('dbconnect.php'); // 追加

    $stmt = $dbh->prepare('INSERT INTO survey (familyname, lastname, email, checkmail, checkcontent, reservemonth, reservedate, reservetime, inquery) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$familyname, $lastname, $email, $checkmail, $checkcontent, $reservemonth, $reservedate, $reservetime, $inquery]);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>送信完了</title>
    <style>
        body{background: #eeeeee;}
        div{
            text-align:center;

            }
    </style>
</head>
<body>
    <div>
    <h1>お問い合わせありがとうございました。</h1>
    <p><?php echo h("氏名 : $familyname $lastname"); ?></p>
    <p><?php echo h("メール : $email"); ?></p>
    <p><?php echo h("$checkmail"); ?></p>
    <p><?php echo h("内容 : $checkcontent"); ?></p>
    <p><?php echo h("日にち : $reservemonth/$reservedate $reservetime"); ?></p>
    <p><?php echo h("ご相談 : $inquery"); ?></p>
    <br>
    <p>確認用メールを送信しました。</p>
    <p>ご確認のほど、よろしくお願いします。</p>

        </div>
</body>
</html>