'use strict';

    var json_data = '<?php echo json_encode($output); ?>';


    $(window).on('load', function() {
        loadText();
    });


    // テキストグラフの作成
    function loadText() {
        // テキストデータ
        var sentence = json_data;
        // 改行を半角スペースに変換
        sentence = sentence.replace(/\r?\n/g, ' ');
        // グラフ描画
        drawWorldCloud(sentence);
    }


    function drawWorldCloud(sentence) {
        // アニメーションテーマを使う
        // am4core.useTheme(am4themes_animated);

        var chart = am4core.create("chartdiv", am4plugins_wordCloud.WordCloud);
        var series = chart.series.push(new am4plugins_wordCloud.WordCloudSeries());

        series.accuracy = 4;
        series.step = 15;
        series.rotationThreshold = 0.7;
        series.maxCount = 200;
        series.minWordLength = 2; // 最少頻度
        series.labels.template.tooltipText = "{word}: {value}";
        series.fontFamily = "Courier New";
        series.maxFontSize = am4core.percent(30);

        // 文字列を渡すだけ
        series.text = sentence;

        // カラフルになる。
        // series.colors = new am4core.ColorSet();
        // series.colors.passOptions = {}; // makes it loop

        // 配置が動くようになる
        // setInterval(function() {
        //     series.dataItems.getIndex(Math.round(Math.random() * (series.dataItems.length - 1))).setValue("value", Math.round(Math.random() * 10));
        // }, 10000)
    }