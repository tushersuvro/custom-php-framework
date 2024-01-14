<?php

require BASE_PATH . 'Database.php';

$db = new Database();

$video = $db->query('select * from videos where id = ?', [ $_POST['id'] ] )->findOrFail();

authorize( isset($_SESSION['user']) && ( $video['user_id'] == $_SESSION['user']['id'] )  );

//dd($video);

$db->query('delete from videos where id = ?', [ $video['id'] ]);

header('location: /videos');
exit();