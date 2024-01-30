<?php

use Core\App;
use Core\Session;
use voku\helper\Paginator;

//$db = App::container()->get('Core\Database');
$db = App::resolve('Core\Database');

$header = "All Videos"; //dd($welcome);

$pages = new Paginator(6, 'p');

$all_videos_count = $db->query( "select count(*) as count from videos where user_id = ? order by id desc" , [ $_SESSION['user']['id'] ] )->find(); //dd($all_videos_count);

$videos = $db->query( "select * from videos where user_id = ? order by id desc". $pages->get_limit() , [ $_SESSION['user']['id'] ] )->get();

$pages->set_total($all_videos_count['count']);

$success = Session::get('success');

view('videos/index', compact( 'header' , 'videos' , 'success' , 'pages' ) );

