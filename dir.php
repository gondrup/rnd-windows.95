<?php

define('BASE_DIR', '/home/adrian/Dev/rnd-windows-95/c');

$dir = $_GET['dir'];
$contents = [
    'folders' => [],
    'files' => [],
];

$files = scandir(BASE_DIR.'/'.$dir);
foreach ($files as $file) {
    if ($file === '.' || $file === '..') {
        continue;
    }

    if (is_dir(BASE_DIR.$dir.'/'.$file)) {
        $contents['folders'][] = $file;
    } else {
        $contents['files'][] = $file;
    }
}

header('Content-type: application/json');
echo json_encode($contents);