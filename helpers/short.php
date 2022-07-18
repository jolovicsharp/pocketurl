<?php
session_start();
include_once 'ShortUrl.php';
$urlProcess = new ShortUrl();
if(isset($_POST['url'])) {
$url = $_POST['url'];
$getDownloadCode = $urlProcess->insertUrl($url);
$_SESSION['message'] = $urlProcess->generateLink($getDownloadCode);
header("Location: ../index.php");
}
else {
    $_SESSION['message'] = "Fail. Please type url.";
}
?>