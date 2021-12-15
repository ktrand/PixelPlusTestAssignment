<?php
session_start();
if (! $_SESSION['user_id']) {
    header('Location: /login/');
} 
use App\Models\User;
require($_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php');
$user = (new User)->select($_SESSION['user_id']);

if ($_POST) {
    $_SESSION['user_id'] = false;
    header('Location: /login/');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title><?= $user['name'] ?></title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <h4><?= $user['name'] ?></h4>
                            <small><cite title="San Francisco, USA"><?= $user['country'] ?><i class="glyphicon glyphicon-map-marker">
                            </i></cite></small>
                            <p>
                                <i class="glyphicon glyphicon-envelope"></i><?= $user['email'] ?>
                                <br />                            
                        </div>
                        <form method="post" action="#" >
                            <button type="submit" name="logout" class="btn btn-primary">Log out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>