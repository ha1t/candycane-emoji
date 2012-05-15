<?php
/**
 *
 *
 */

function emoji_convert($text)
{
    include dirname(__FILE__) . '/keywords.php';

    return str_replace(array_keys($keywords), array_values($keywords), $text);
}

$text = <<<EOD
I am smiling :smile:
EOD;

$result = emoji_convert($text);

var_dump($result);
