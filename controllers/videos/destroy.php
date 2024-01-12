<?php

require BASE_PATH . 'Database.php';

$db = new Database();

$db->query('delete from videos where id = ?', [ $_GET['id'] ]);

header('location: /videos');
exit();