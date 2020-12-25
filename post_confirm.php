<?php

session_start();

// POSTされたトークンを取得
$token = isset($_POST['token']) ? $_POST['token'] : "" ;

// セッション変数のトークンを取得
$session_token = isset($_SESSION['token']) ? $_SESSION['token'] : "";

// セッション変数のトークンを削除
unset($_SESSION['token']);

$name = $_POST['name'];
$mail = $_POST['mail'];
$nowIncome = $_POST['nowIncome'];
$nowEmploymentStatus = $_POST['nowEmploymentStatus'];
$nowPosition = $_POST['nowPosition'];
$hopeIncome = $_POST['hopeIncome'];
$hopeEmploymentStatus = $_POST['hopeEmploymentStatus'];
$hopePosition = $_POST['hopePosition'];
$changeJobs = $_POST['changeJobs'];
$time = date('Y-m-d H:i:s');

// POSTされたトークンとセッション変数のトークンの比較
if($token != "" && $token == $session_token) {
$file = fopen("./data/data.txt", "a");
fwrite($file, $time . " "  . $name . " " . $mail . " " . $nowIncome . " " . $nowEmploymentStatus . " " . $nowPosition . " " . $hopeIncome . " " . $hopeEmploymentStatus . " " .$hopePosition . " " . $changeJobs . " " . "\n");
fclose($file);
} else {

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }
    console_log( "ERROR:不正な登録処理です" );
}

function hSC ($value) {
    return htmlspecialchars($value, ENT_QUOTES);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ご協力ありがとうございました。</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/confirmStyle.css">
</head>
<body>
    <h1>以下の内容で送信しました。ご協力ありがとうございました。</h1>
    <section class="contents">
        <table class="table-form">
            <tbody>
                <tr>
                    <th class="first-child">お名前</th>
                    <td class="first-child"><?= hSC($name); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= hSC($mail); ?></td>
                </tr>
                <tr>
                    <th>現在の年収</th>
                    <td><?= hSC($nowIncome); ?></td>
                </tr>
                <tr>
                    <th>現在の就業状況</th>
                    <td><?= hSC($nowEmploymentStatus); ?></td>
                </tr>
                <tr>
                    <th>現在のポジション</th>
                    <td><?= hSC($nowPosition); ?></td>
                </tr>
                <tr>
                    <th>希望の年収</th>
                    <td><?= hSC($hopeIncome); ?></td>
                </tr>
                <tr>
                    <th>希望の雇用形態</th>
                    <td><?= hSC($hopeEmploymentStatus); ?></td>
                </tr>
                <tr>
                    <th>希望のポジション</th>
                    <td><?= hSC($hopePosition); ?></td>
                </tr>
                <tr>
                    <th>希望の転職時期</th>
                    <td><?= hSC($changeJobs); ?></td>
                </tr>
            </tbody>
        </table>
    </section>

    <div class="btn-area">
        <a href="http://localhost/gs_dev18_06/index.php" class="btn btn-border-shadow btn-border-shadow--color2">戻る</a>
    </div>
    <div class="btn-area">
        <a href="http://localhost/gs_dev18_06/result.php" class="btn btn-border-shadow btn-border-shadow--color2">結果をみる</a>
    </div>
</body>
</html>
