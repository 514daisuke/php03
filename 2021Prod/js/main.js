//ふりがな生成
$(function () {
    $.fn.autoKana('input[name="sei"] ', 'input[name="seikana"]', { katakana: true });　//name属性で判別する場合
    $.fn.autoKana('#mei', '#meikana', { katakana: true });　//idで判別する場合
});