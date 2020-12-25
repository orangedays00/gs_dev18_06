<?php

session_start();

// 二重送信防止用トークンの発行
$token = uniqid('', true);

// トークンをセッション変数にセット
$_SESSION['token'] = $token;

?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>あなたの状況を教えてください</h1>
    <section class="contents">
        <form action="post_confirm.php" method="post">
            <table class="table-form">
                <tbody>
                    <tr>
                        <th class="required first-child">お名前</th>
                        <td class="first-child"><input type="text" name="name" class="textbox" required></td>
                    </tr>
                    <tr>
                        <th class="required">Email</th>
                        <td><input type="email" name="mail" class="textbox" required></td>
                    </tr>
                    <tr>
                        <th class="required">現在の年収は？</th>
                        <td>
                            <input type="radio" name="nowIncome" id="nowIncome1" value="200万円以下" checked><label for="nowIncome1">200万円以下</label>
                            <input type="radio" name="nowIncome" id="nowIncome2" value="200万円以上300万円未満"><label for="nowIncome2">200万円以上300万円未満</label>
                            <input type="radio" name="nowIncome" id="nowIncome3" value="300万円以上400万円未満"><label for="nowIncome3">300万円以上400万円未満</label>
                            <input type="radio" name="nowIncome" id="nowIncome4" value="400万円以上500万円未満"><label for="nowIncome4">400万円以上500万円未満</label>
                            <input type="radio" name="nowIncome" id="nowIncome5" value="500万円以上600万円未満"><label for="nowIncome5">500万円以上600万円未満</label>
                            <input type="radio" name="nowIncome" id="nowIncome6" value="600万円以上700万円未満"><label for="nowIncome6">600万円以上700万円未満</label>
                            <input type="radio" name="nowIncome" id="nowIncome7" value="700万円以上800万円未満"><label for="nowIncome7">700万円以上800万円未満</label>
                            <input type="radio" name="nowIncome" id="nowIncome8" value="800万円以上900万円未満"><label for="nowIncome8">800万円以上900万円未満</label>
                            <input type="radio" name="nowIncome" id="nowIncome9" value="900万円以上1000万円未満"><label for="nowIncome9">900万円以上1000万円未満</label>
                            <input type="radio" name="nowIncome" id="nowIncome10" value="1000万円以上"><label for="nowIncome10">1000万円以上</label>
                        </td>
                    </tr>
                    <tr>
                        <th class="required">現在の就業状況は？</th>
                        <td>
                            <input type="radio" name="nowEmploymentStatus" id="nowEmploymentStatus1" value="正社員" checked><label for="nowEmploymentStatus1">正社員</label>
                            <input type="radio" name="nowEmploymentStatus" id="nowEmploymentStatus2" value="契約社員"><label for="nowEmploymentStatus2">契約社員</label>
                            <input type="radio" name="nowEmploymentStatus" id="nowEmploymentStatus3" value="派遣社員"><label for="nowEmploymentStatus3">派遣社員</label>
                            <input type="radio" name="nowEmploymentStatus" id="nowEmploymentStatus4" value="パート・アルバイト"><label for="nowEmploymentStatus4">パート・アルバイト</label>
                            <input type="radio" name="nowEmploymentStatus" id="nowEmploymentStatus5" value="業務委託"><label for="nowEmploymentStatus5">業務委託</label>
                            <input type="radio" name="nowEmploymentStatus" id="nowEmploymentStatus6" value="その他"><label for="nowEmploymentStatus6">その他</label>
                            <input type="radio" name="nowEmploymentStatus" id="nowEmploymentStatus7" value="離職中"><label for="nowEmploymentStatus7">離職中</label>
                        </td>
                    </tr>
                    <tr>
                        <th class="required">現在のポジションは？</th>
                        <td>
                            <input type="radio" name="nowPosition" id="nowPosition1" value="役職なし" checked><label for="nowPosition1">役職なし</label>
                            <input type="radio" name="nowPosition" id="nowPosition2" value="主任クラス"><label for="nowPosition2">主任クラス</label>
                            <input type="radio" name="nowPosition" id="nowPosition3" value="課長クラス"><label for="nowPosition3">課長クラス</label>
                            <input type="radio" name="nowPosition" id="nowPosition4" value="部長・次長クラス"><label for="nowPosition4">部長・次長クラス</label>
                            <input type="radio" name="nowPosition" id="nowPosition5" value="本部長・事業部長クラス"><label for="nowPosition5">本部長・事業部長クラス</label>
                            <input type="radio" name="nowPosition" id="nowPosition6" value="経営者・役員"><label for="nowPosition6">経営者・役員</label>
                        </td>
                    </tr>
                    <tr>
                        <th class="required">希望の年収は？</th>
                        <td>
                            <input type="radio" name="hopeIncome" id="hopeIncome1" value="200万円以下" checked><label for="hopeIncome1">200万円以下</label>
                            <input type="radio" name="hopeIncome" id="hopeIncome2" value="200万円以上300万円未満"><label for="hopeIncome2">200万円以上300万円未満</label>
                            <input type="radio" name="hopeIncome" id="hopeIncome3" value="300万円以上400万円未満"><label for="hopeIncome3">300万円以上400万円未満</label>
                            <input type="radio" name="hopeIncome" id="hopeIncome4" value="400万円以上500万円未満"><label for="hopeIncome4">400万円以上500万円未満</label>
                            <input type="radio" name="hopeIncome" id="hopeIncome5" value="500万円以上600万円未満"><label for="hopeIncome5">500万円以上600万円未満</label>
                            <input type="radio" name="hopeIncome" id="hopeIncome6" value="600万円以上700万円未満"><label for="hopeIncome6">600万円以上700万円未満</label>
                            <input type="radio" name="hopeIncome" id="hopeIncome7" value="700万円以上800万円未満"><label for="hopeIncome7">700万円以上800万円未満</label>
                            <input type="radio" name="hopeIncome" id="hopeIncome8" value="800万円以上900万円未満"><label for="hopeIncome8">800万円以上900万円未満</label>
                            <input type="radio" name="hopeIncome" id="hopeIncome9" value="900万円以上1000万円未満"><label for="hopeIncome9">900万円以上1000万円未満</label>
                            <input type="radio" name="hopeIncome" id="hopeIncome10" value="1000万円以上"><label for="hopeIncome10">1000万円以上</label>
                        </td>
                    </tr>
                    <tr>
                        <th class="required">希望の雇用形態は？</th>
                        <td>
                            <input type="radio" name="hopeEmploymentStatus" id="hopeEmploymentStatus1" value="正社員" checked><label for="hopeEmploymentStatus1">正社員</label>
                            <input type="radio" name="hopeEmploymentStatus" id="hopeEmploymentStatus2" value="契約社員"><label for="hopeEmploymentStatus2">契約社員</label>
                            <input type="radio" name="hopeEmploymentStatus" id="hopeEmploymentStatus3" value="派遣社員"><label for="hopeEmploymentStatus3">派遣社員</label>
                            <input type="radio" name="hopeEmploymentStatus" id="hopeEmploymentStatus4" value="パート・アルバイト"><label for="hopeEmploymentStatus4">パート・アルバイト</label>
                            <input type="radio" name="hopeEmploymentStatus" id="hopeEmploymentStatus5" value="業務委託"><label for="hopeEmploymentStatus5">業務委託</label>
                            <input type="radio" name="hopeEmploymentStatus" id="hopeEmploymentStatus6" value="その他"><label for="hopeEmploymentStatus6">その他</label>
                        </td>
                    </tr>
                    <tr>
                        <th class="required">希望のポジションは？</th>
                        <td>
                            <input type="radio" name="hopePosition" id="hopePosition1" value="役職なし" checked><label for="hopePosition1">役職なし</label>
                            <input type="radio" name="hopePosition" id="hopePosition2" value="主任クラス"><label for="hopePosition2">主任クラス</label>
                            <input type="radio" name="hopePosition" id="hopePosition3" value="課長クラス"><label for="hopePosition3">課長クラス</label>
                            <input type="radio" name="hopePosition" id="hopePosition4" value="部長・次長クラス"><label for="hopePosition4">部長・次長クラス</label>
                            <input type="radio" name="hopePosition" id="hopePosition5" value="本部長・事業部長クラス"><label for="hopePosition5">本部長・事業部長クラス</label>
                            <input type="radio" name="hopePosition" id="hopePosition6" value="経営者・役員"><label for="hopePosition6">経営者・役員</label>
                        </td>
                    </tr>
                    <tr>
                        <th class="required">希望の転職時期は？</th>
                        <td>
                            <input type="radio" name="changeJobs" id="changeJobs1" value="すぐにでも" checked><label for="changeJobs1">すぐにでも</label>
                            <input type="radio" name="changeJobs" id="changeJobs2" value="3ヶ月以内"><label for="changeJobs2">3ヶ月以内</label>
                            <input type="radio" name="changeJobs" id="changeJobs3" value="半年以内"><label for="changeJobs3">半年以内</label>
                            <input type="radio" name="changeJobs" id="changeJobs4" value="1年以内"><label for="changeJobs4">1年以内</label>
                            <input type="radio" name="changeJobs" id="changeJobs5" value="未定"><label for="changeJobs5">未定</label>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="token" value="<?= $token; ?>">
            <input type="submit" value="送信" class="btn center">
        </form>
    </section>
</body>
</html>
