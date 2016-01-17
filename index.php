<?php

    if(isset($_POST)){
        require_once __DIR__ . '/include/auth.php';
        $auth = (new Auth())->generator();
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP + Auth Token (Basic)</title>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/style.css">
        <!--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>-->
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h1>PHP + Auth Token (Basic)</h1>
                    </div>
                    <?php if (!empty($auth)): ?>
                        <div class="alert alert-success" style="color:#000;">
                            <h4>App ID: <?php echo $auth->app_id; ?></h4>
                            <h4>App Secret: <?php echo $auth->app_secret; ?></h4>
                        </div>
                        <div class="alert alert-success" style="color:#000;">
                            <h4>Key: <?php echo $auth->key; ?></h4>
                            <h4>Token: <?php echo $auth->token; ?></h4>
                        </div>
                        <div class="alert alert-success" style="color:#000;">
                            Click: <a href="<?php echo $auth->callback; ?>" target="_blank" style="color:#000; text-decoration: none;"><?php echo $auth->message; ?></a> 
                        </div>
                    <?php endif; ?>
                    <div>
                        <form id="form-upload" class="form-horizontal" method="POST" accept-charset="UTF-8">
                            <button type="submit" class="btn btn-success" style="width: 150px;">Generator</button>
                        </form>
                    </div>
                </div>	
            </div>
	</div>
    </body>
</html>

<!-- end -->