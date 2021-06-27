<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homeapp</title>
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js?ver=3.4.1"></script>
    <script src="./js/main.js"></script>
</head>

<body>

    <header>
        <div>
            <!-- イメージ図は用意してから -->
            <!-- <h1><img src="./image/logo.png"><br>グループホーム申し送りノート</h1> -->
            <h1><br>グループホーム申し送りノート</h1>

        </div>
    </header>

    <form action="create.php" method="post">

        <fieldset>
            <legend>KakeH@shi</legend>

            <main>
                <div class="wrap-tab">
                    <p class="menu"><a href="input.php">入力画面</a> | <a href="read.php">一覧画面</a> | <a href="home.php">事業所用</a> | <a href="hospital.php">病院用</a> | <a href="medicine.php">薬用</a></p>
                    <div class="wrap-tab-content">
                        <div class="tab-content active">
                            <h2 id="kiroku">申し送り</h2>
                            <table>
                                <tr>
                                    <td>
                                        <!-- No.をkeyに設定 -->
                                        <label for="number">No：</label>
                                    </td>
                                    <td>
                                        <input type="number" name="no" min="1" max="100">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        種類
                                    </td>
                                    <td>
                                        <label><input type="checkbox" name="home" value="事業所"> 事業所</label><br>
                                        <label><input type="checkbox" name="hospital" value="入院"> 入院</label><br>
                                        <label><input type="checkbox" name="hospital" value="通院"> 通院</label><br>
                                        <label><input type="checkbox" name="medicine" value="薬"> 薬</label><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="day">日付：</label>
                                    </td>
                                    <td>
                                        <input type="date" name="day" value="2021-06-26">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="name">利用者氏名</label>
                                    </td>
                                    <td id="tdName">
                                        <input type="name" name="name" id="name">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="name">利用者カナ</label>
                                    </td>
                                    <td id="tdName">
                                        <input type="name" name="name" id="name">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="brithday">生年月日</label>
                                    </td>
                                    <td>
                                        <input type="date" name="brithday" value="1960-01-01">
                                    </td>
                                    <!-- 年齢は後から自動計算予定 -->
                                    <!-- <td>
                                            <span id="age"></span>歳
                                        </td> -->
                                </tr>
                                <tr>
                                    <td>
                                        <label for="repName">介護記録者氏名</label>
                                    </td>
                                    <td>
                                        <input type="name" name="recoder">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="memo">記録</label>
                                    </td>
                                    <td>
                                        <textarea class="note" type="text" name=" memo" rows="3" cols="62"></textarea>
                                    </td>
                                </tr>
                            </table>
                            <div>
                                <button id="reload" class="btn">Reload</button>
                                <button id="save" class="btn">記録</button>
                            </div>
                            <div>
                                <h3><a href="delete.php">削除画面</a></h3>
                            </div>
                            <div>
                                <h3><a href="update.php">更新画面</a></h3>
                            </div>
                        </div>
                    </div>
            </main>
        </fieldset>
    </form>
    <footer>グループホームDegitalノート</footer>

</body>

</html>