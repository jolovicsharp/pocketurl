<?php

require_once("ShortUrl.php");

$urlShortener = new ShortUrl();

if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $orignalUrl = $urlShortener->getOriginalUrl($code);
    header("Location: {$orignalUrl}");
    die();
}
header("Location: index.php");
die();

?>