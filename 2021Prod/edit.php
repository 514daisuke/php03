<?php
// var_dump($GET);
// exit();

// 関数ファイル読み込み
include("functions.php");
// 送信されたidをgetで受け取る
$id = $_GET['id'];
// DB接続&id名でテーブルから検索
$pdo = connect_to_db();
// 現在のテーブル情報を取得する WHERE id=:id' そのidだけを取得する
$sql = 'SELECT * FROM todo_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// fetch()で1レコード取得できる.
if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // １件だけならfetch 多くの場合はfetch_all
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB連携型todoリスト（編集画面）</title>
</head>

<body>
    <form action="todo_update.php" method="POST">
        <fieldset>
            <legend>DB連携型todoリスト（編集画面）</legend>
            <a href="todo_read.php">一覧画面</a>
            <!-- htmlのタグに初期値として設定 -->
            <div>
                todo: <input type="text" name="todo" value="<?= $record["todo"] ?>">
            </div>
            <div>
                deadline:<input type="date" name="deadline" value="<?= $record["deadline"] ?>">
            </div>
            <input type="hidden" name="id" value="<?= $record["id"] ?>">
            <div>
                <button>submit</button>
            </div>




        </fieldset>
    </form>

</body>

</html>