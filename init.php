<?php
// @note http://blog.candycane.jp/archives/1103
require 'emoji_convert.php';
App::uses('CakeEventManager', 'Event');
CakeEventManager::instance()->attach('emoji_callback', 'Helper.Candy.afterTextilizable');


function emoji_callback($event) {
	
	$event->result['text'] = emoji_convert($event->data['text']);
}
