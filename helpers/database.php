<?php 

#################
#CHANGE THIS DATA
#################


# server name
$sName = "localhost";
# user name
$uName = "root";
# password
$pass = "";
# database name
$db_name = "urlshort";

#creating database connection
try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Error : ". $e->getMessage();
}