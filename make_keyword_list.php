<?php
/**
 * 絵文字画像が配置されているディレクトリを精査して、
 * 変換キーワードの配列を作るスクリプト。
 * 絵文字を追加・削除した場合に実行する。
 */

$emoji_dir = dirname(__FILE__) . '/public/graphics/emojis/';

function make_keyword_list($emoji_dir, $emoji_url = '', $filename = 'keywords.php')
{
    $keywords = array();

    foreach (glob($emoji_dir . '*') as $filename) {
        $image = basename($filename);
        $keyword = str_replace('.png', '', basename($filename));
        $keyword = str_replace('plus', '+', $keyword);
        $keyword = ':' . $keyword . ':';
        $image_tag = "<img src=\"{$emoji_url}{$image}\" height=\"20\" weight=\"20\" />";
        $keywords[$keyword] = $image_tag;
    }

    $php_code  = '<?php ';
    $php_code .= '$keywords = ' . var_export($keywords, true) . ';';

    file_put_contents('keywords.php', $php_code);
}

$emoji_url = 'http://www.emoji-cheat-sheet.com/graphics/emojis/';
make_keyword_list($emoji_dir, $emoji_url);

