<?php
if (! $_SESSION['auth']) {
    header('Location: /login/');
} 

use App\Models\User;
require($_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php');
session_start();
$user = (new User)->select($_SESSION['auth']);
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
                            <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                            </i></cite></small>
                            <p>
                                <i class="glyphicon glyphicon-envelope"></i><?= $user['email'] ?>
                                <br />
                                <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                                <br />
                                <i class="glyphicon glyphicon-gift"></i><?= $user['age'] ?></p>
                            <!-- Split button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary">
                                    Social</button>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span><span class="sr-only">Social</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                    <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Github</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>