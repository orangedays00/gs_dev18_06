<?php

$contents = file("./data/data.txt");

// 空配列を用意
$array = [];

$nowIncomeArray = [
    '200万円以下' => 0,
    '200万円以上300万円未満' => 0,
    '300万円以上400万円未満' => 0,
    '400万円以上500万円未満' => 0,
    '500万円以上600万円未満' => 0,
    '600万円以上700万円未満' => 0,
    '700万円以上800万円未満' => 0,
    '800万円以上900万円未満' => 0,
    '900万円以上1000万円未満' => 0,
    '1000万円以上' => 0
];

$nowEmploymentArray = [
    '正社員' => 0,
    '契約社員' => 0,
    '派遣社員' => 0,
    'パート・アルバイト' => 0,
    '業務委託' => 0,
    'その他' => 0,
    '離職中' => 0
];

$nowPositionArray = [
    '役職なし' => 0,
    '主任クラス' => 0,
    '課長クラス' => 0,
    '部長・次長クラス' => 0,
    '本部長・事業部長クラス' => 0,
    '経営者・役員' => 0
];

$hopeIncomeArray = [
    '200万円以下' => 0,
    '200万円以上300万円未満' => 0,
    '300万円以上400万円未満' => 0,
    '400万円以上500万円未満' => 0,
    '500万円以上600万円未満' => 0,
    '600万円以上700万円未満' => 0,
    '700万円以上800万円未満' => 0,
    '800万円以上900万円未満' => 0,
    '900万円以上1000万円未満' => 0,
    '1000万円以上' => 0
];

$hopeEmploymentArray = [
    '正社員' => 0,
    '契約社員' => 0,
    '派遣社員' => 0,
    'パート・アルバイト' => 0,
    '業務委託' => 0,
    'その他' => 0,
    '離職中' => 0
];

$hopePositionArray = [
    '役職なし' => 0,
    '主任クラス' => 0,
    '課長クラス' => 0,
    '部長・次長クラス' => 0,
    '本部長・事業部長クラス' => 0,
    '経営者・役員' => 0
];

$jobChangeArray = [
    'すぐにでも' => 0,
    '3ヶ月以内' => 0,
    '半年以内' => 0,
    '1年以内' => 0,
    '未定' => 0
];

foreach ($contents as $content) {
    $value = explode(' ', $content);
    // print_r($value);
    array_push($array,$value);

    // 現在年収の値を振り分けて加算する
    for($ni = 0; $ni < count($nowIncomeArray); $ni++) {
        if($value[4] == array_keys($nowIncomeArray)[$ni]) {
            $nowIncomeArray[array_keys($nowIncomeArray)[$ni]] += 1;
        }
    }

    // 現在雇用形態の値を振り分けて加算する
    for($ne = 0; $ne < count($nowEmploymentArray); $ne++) {
        if($value[5] == array_keys($nowEmploymentArray)[$ne]) {
            $nowEmploymentArray[array_keys($nowEmploymentArray)[$ne]] += 1;
        }
    }

    // 現在役職の値を振り分けて加算する
    for($np = 0; $np < count($nowPositionArray); $np++) {
        if($value[6] == array_keys($nowPositionArray)[$np]) {
            $nowPositionArray[array_keys($nowPositionArray)[$np]] += 1;
        }
    }

    // 希望年収の値を振り分けて加算する
    for($hi = 0; $hi < count($hopeIncomeArray); $hi++) {
        if($value[7] == array_keys($hopeIncomeArray)[$hi]) {
            $hopeIncomeArray[array_keys($hopeIncomeArray)[$hi]] += 1;
        }
    }

    // 希望雇用形態の値を振り分けて加算する
    for($he = 0; $he < count($hopeEmploymentArray); $he++) {
        if($value[8] == array_keys($hopeEmploymentArray)[$he]) {
            $hopeEmploymentArray[array_keys($hopeEmploymentArray)[$he]] += 1;
        }
    }

    // 希望役職の値を振り分けて加算する
    for($hp = 0; $hp < count($hopePositionArray); $hp++) {
        if($value[9] == array_keys($hopePositionArray)[$hp]) {
            $hopePositionArray[array_keys($hopePositionArray)[$hp]] += 1;
        }
    }

    // 転職時期の値を振り分けて加算する
    for($jc = 0; $jc < count($jobChangeArray); $jc++) { 
        if($value[10] == array_keys($jobChangeArray)[$jc]) {
            $jobChangeArray[array_keys($jobChangeArray)[$jc]] += 1;
        }
    }

}

// ファイルを閉じる
fclose($openFile);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/resultStyle.css">
    <title>投稿結果</title>
</head>
<body>
    <h1>アンケート結果</h1>
    <div class="parents">
        <div class="child">
            <p class="title">現在の年収について</p>
            <?php
            echo "<table>";

            foreach ($nowIncomeArray as $key=>$val) {
                echo "<tr><th>" . $key . "</th><td>" . $val . "</td></tr>";
            }

            echo "</table>";

            ?>
        </div>
        <div class="child">
            <p class="title">現在の雇用形態について</p>
            <?php
            echo "<table>";

            foreach ($nowEmploymentArray as $key=>$val) {
                echo "<tr><th>" . $key . "</th><td>" . $val . "</td></tr>";
            }

            echo "</table>";

            ?>
        </div>
        <div class="child">
            <p class="title">現在の役職について</p>
            <?php
            echo "<table>";

            foreach ($nowPositionArray as $key=>$val) {
                echo "<tr><th>" . $key . "</th><td>" . $val . "</td></tr>";
            }

            echo "</table>";

            ?>
        </div>
        <div class="child">
            <p class="title">希望の年収について</p>
            <?php
            echo "<table>";

            foreach ($hopeIncomeArray as $key=>$val) {
                echo "<tr><th>" . $key . "</th><td>" . $val . "</td></tr>";
            }

            echo "</table>";

            ?>
        </div>
        <div class="child">
            <p class="title">希望の雇用形態について</p>
            <?php
            echo "<table>";

            foreach ($hopeEmploymentArray as $key=>$val) {
                echo "<tr><th>" . $key . "</th><td>" . $val . "</td></tr>";
            }

            echo "</table>";

            ?>
        </div>
        <div class="child">
            <p class="title">希望の役職について</p>
            <?php
            echo "<table>";

            foreach ($hopePositionArray as $key=>$val) {
                echo "<tr><th>" . $key . "</th><td>" . $val . "</td></tr>";
            }

            echo "</table>";

            ?>
        </div>
        <div class="child">
            <p class="title">転職希望時期について</p>
            <?php
            echo "<table>";

            foreach ($jobChangeArray as $key=>$val) {
                echo "<tr><th>" . $key . "</th><td>" . $val . "</td></tr>";
            }

            echo "</table>";

            ?>
        </div>
    </div>
    <div class="btn-area">
        <a href="http://localhost/gs_dev18_06/index.php" class="btn btn-border-shadow btn-border-shadow--color2">戻る</a>
    </div>

</body>
</html>

