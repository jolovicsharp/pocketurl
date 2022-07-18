<?php
session_start();
?>
<html lang="en">
<head>
<style>
* {
    font-family: 'Raleway', sans-serif;
}
.top {
    background-color: #3d3d3d;
    color: white;
    padding-top: 40px;
    height: 35vh;
}
.btnd {
    height: fit-content;
    margin-left: 10px;
}
a {
    text-decoration: none!important;
    color: white!important;
    font-size: 15px!important;  
}
.whi {
    height: 40px;
    background-color: #3d3d3d;
    color: white;
    width: 22.5rem;
    text-align: center;
}
.labela {
    width: 520px;
}
@media only screen and (max-width: 768px) {
  .whi {
    width: fit-content;
  }
  .labela {
    max-width: 20rem;

  }
}
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShortUrl</title>
</head>
<body>
<div class="top d-flex flex-column w-100 justify-content-center align-items-center">
<div class="heading"><h1>Welcome to Pocketurl</div>
<div class="text mb-3"><small>PocketUrl is free and open-source tool to make short urls</small></div>
<form class="forma d-inline-flex flex-row" action="helpers/short.php" method="post">
<input type="text" name="url" class="labela form-control mb-2" id="link" placeholder="Enter your URL here">
<input type="submit" class="btnd btn btn-success" value="Shorten URL!">
</form>
<?php
if(isset($_SESSION['message'])) { 
?>
<div class="whi d-inline-flex flex-row justify-content-center align-items-center border border-2 border-success rounded p-2 m-3">
<?php
echo $_SESSION['message'];
unset($_SESSION['message']);
}?>
</div>
</div>
</body>
</html>