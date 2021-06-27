<?php
session_start();

ini_set("display_errors", 1);
ini_set("error_reporting", E_ALL);

require_once "config.php";

$usr = filter_input(INPUT_POST, "usr", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$pwd = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$token = filter_input(INPUT_POST, "token", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($_SERVER["REQUEST_METHOD"] === "POST" && $token === $_SESSION["token"]) {

    if (isset($auth[$usr]) && password_verify($pwd, $auth[$usr]["pwd"])) {

        session_regenerate_id();
        $_SESSION["id"] = $auth[$usr]["id"];

        header("Location: " . BASE_URL . "/input.php");
        exit;
    } else {

        echo "<script>(function(){alert('ユーザー名またはパスワードが違います。');}());</script>";
    }
}

$_SESSION["token"] = md5(mt_rand());

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homeapp</title>
</head>

<body>
    <form method="post">

        <fieldset>
            <legend>介護用申し送りノート</legend>
            <div>
                ユーザー名: <input type="text" name="usr">
            </div>
            <div>
                パスワード: <input type="text" name="pwd">
            </div>
            <div>
                <input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
                <input type="submit">
            </div>
        </fieldset>
    </form>

</body>

</html>