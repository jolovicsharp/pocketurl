<?php
include_once "config.php";
class ShortUrl {
    function generateRandomCode($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    function insertUrl($url) {
        $url = htmlspecialchars(stripslashes(trim($url)));
        include_once 'database.php';
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            header("Location: ../index.php");
            $_SESSION['error'] = "Your URL isn't in correct format.";
            die();
        }
        $code = $this->generateRandomCode();
        $sql = "INSERT into urls (url,code,added) VALUES (?,?,NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$url,$code]);
        return $code;
    }
    function getOriginalUrl($checkCode) {
        include_once 'database.php';
        $sql = $conn->prepare("SELECT url from urls WHERE code=?");
        $sql->execute([$checkCode]);
        if($sql->rowCount() !== 0) {
        return $sql->fetchColumn();
        }
        else {
            return "Failed";
        }
    }
    function generateLink($code_unique) {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || 
        $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'];
        return '<a href=/' . INSTALLATION_FOLDER . $code_unique . '>' . $protocol . $domainName . "/" . INSTALLATION_FOLDER . $code_unique . '</a>';
    }

}
?>