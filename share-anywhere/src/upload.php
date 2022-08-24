<?php

require_once('database.php');
require_once('functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $path = parse_url($_SERVER['REQUEST_URI'])['path'];
    $basename = basename($path);
    if (empty($basename)) {
        $basename = guid().'.bin';
    }

    upload($basename, 'php://input');
}

if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
    upload($_FILES['name'], $_FILES['file']['tmp_name']);
}


function upload($filename, $upload_filepath) {
    $physical_path = '/uploads/'.guid();
    copy($upload_filepath, $physical_path);

    $guid = guid();
    if (empty($filename)) {
        $filename = $guid.'.bin';
    }

    $pdo = get_pdo();
    $sql = "INSERT INTO files (guid, physical_path, filename) VALUES ('$guid', '$physical_path', '$filename')";
    $result = $pdo->exec($sql);
    if ($result == 1) {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443 || $_SERVER['HTTP_X_FORWARDED_PORT'] == 443) ? 'https' : 'http';
        echo "$protocol://${_SERVER['HTTP_HOST']}/download.php?id=$guid";
    } else {
        echo 'Error';
    }
    exit();
}
