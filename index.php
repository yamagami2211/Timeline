<?php
//ライブラリを読み込む
require './vendor/autoload.php';
//Configを読み込む
require './conf/config.php';

use mpyw\Co\Co;
use mpyw\Co\CURLException;
use mpyw\Cowitter\Client;
use mpyw\Cowitter\HttpException;


$client = new Client([TwConfig::$API_Key, TwConfig::$API_Secret_Key, TwConfig::$API_Access_Token, TwConfig::$API_Access_Token_Secret]);

$TimeLine = $client->get('statuses/user_timeline', ['count' => TwConfig::$count]);
//var_dump($TimeLine);
?>

<html lang="ja">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <title>自家製タイムライン(テスト版)</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-8">

                <div class="panel panel-default">
                    <div class="panel-heading">User TimeLine</div>
                    <div class="panel-body">


                        <?php
                        //$tl->id_str など
                        foreach ($TimeLine as $tl) {
                            $rep = str_replace('\r\n', '<br>', $tl->text);
                        ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img src="<?php echo $tl->user->profile_image_url_https; ?>" alt="UserIcon" class="img-circle">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><?php echo $tl->user->name; ?></h4>
                                            " <?php echo $rep; ?> "
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                
            </div><!-- div.col-xs-12 col-sm-6 col-md-8 -->
        </div><!-- div.row -->
    </div><!-- div.container -->

</body>

</html>

<?php //var_dump($TimeLine); ?>