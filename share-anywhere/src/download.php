<?php

require_once('database.php');

$pdo = get_pdo();
$res = $pdo->query("SELECT * FROM files WHERE guid = '${_GET['id']}'", PDO::FETCH_ASSOC);

if (!$res) {
    http_response_code(404);
    die('File doesn\'t exist.');
}

$file = $res->fetch();
if (!$file or !file_exists($file['physical_path'])) {
    http_response_code(404);
    die('File doesn\'t exist.');
}

header('Cache-Control: no-cache, must-revalidate');
header('Content-Disposition: attachment; filename="'.basename($file['filename']).'"');
header('Content-Type: ' . (mime_content_type($file['physical_path'])?:'application/octet-stream'));
readfile($file["physical_path"]);
