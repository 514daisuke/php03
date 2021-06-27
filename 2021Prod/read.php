<?php

// 関数ファイル読み込み
include("functions.php");
// DB接続&id名でテーブルから検索
$pdo = connect_to_db();

// SQLの実行
$sql = 'SELECT * FROM user_info';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// アウトプットの情報をうまく変更する
if ($status == false) {
    // 失敗の場合
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    // 成功した場合
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($result as $record) {
        $output .= "<tr>";
        $output .= "<td>{$record["no"]}</td>";
        // $output .= "<td>{$record["day"]}</td>";
        $output .= "<td>{$record["name"]}</td>";
        $output .= "<td>{$record["brithday"]}</td>";
        $output .= "<td>{$record["recoder"]}</td>";
        $output .= "<td>{$record["memo"]}</td>";
        $output .= "</tr>";

        // edit deleteリンクを追加
        // 送信先にデータを送ってる getでデータ（id）を送る
        $output .= "<td><a href='edit.php?id={$record["id"]}'>edit</a></td>";
        $output .= "<td><a href='delete.php?id={$record["id"]}'>delete</a></td>";
        unset($record);
    }
}

$jsonArray = json_encode($output);

?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homeapp</title>
</head>

<!-- amcharts用のライブラリ -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/plugins/wordCloud.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./css/style.css">
<script src="./js/main.js"></script>
<script src="./js/chartdiv.js"></script>


<body>
    <fieldset>
        <legend>利用者申し送り</legend>
        <a href="input.php">入力画面</a>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <!-- <th>DAY</th> -->
                    <th>利用者氏名</th>
                    <th>生年月日</th>
                    <th>記録者氏名</th>
                    <th>記録</th>
                </tr>
            </thead>
            <tbody>
                <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
                <?= $output ?>
            </tbody>
        </table>

    </fieldset>
    <section class="section">

        <!-- /* グラフの描画先 */ -->
        <div id="chartdiv" class="chartdiv"></div>
        </div>

    </section>

</body>

</html>