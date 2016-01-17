<?php
    
if (!empty($_GET['app_id']) && !empty($_GET['app_secret'])){
    
    require_once __DIR__ . '/include/auth.php';
    $auth = (new Auth())->validator($_GET['app_id'],$_GET['app_secret']);
    
    echo $auth->message;
    
}