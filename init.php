<?php
// @note http://blog.candycane.jp/archives/1103

$pluginContainer = ClassRegistry::getObject('PluginContainer');
$pluginContainer->installed('cc_emoji','1.1');

require 'emoji_convert.php';
App::uses('CakeEventManager', 'Event');
CakeEventManager::instance()->attach('emoji_callback', 'Helper.Candy.afterTextilizable');

function emoji_callback($event)
{
    $event->result['text'] = $event->data['text'] = emoji_convert($event->data['text']);
}
