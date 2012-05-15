<?php
/**
 *
 *
 */

require_once dirname(dirname(__FILE__)) . '/emoji_convert.php';

class emoji_convert_test extends PHPUnit_Framework_TestCase
{
    public function testSimple()
    {
        $text = <<<EOD
I am smiling :smile:
EOD;
        $text = emoji_convert($text);
        $this->assertTrue(strpos($text, 'smile.png') !== false);
    }

    public function testSimple2()
    {
        $text = <<<EOD
I am smiling :smile: :cry:
EOD;
        $text = emoji_convert($text);
        $this->assertTrue(strpos($text, 'smile.png') !== false);
        $this->assertTrue(strpos($text, 'cry.png') !== false);
    }
}
