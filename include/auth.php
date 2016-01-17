<?php

/* =============================================
 * Auth Token
 * ============================================= */

class Auth {
    
    public $key;
    public $key_length = 32; 
    public $app_length = 9;
    
    public $app_id;
    public $app_secret;
    public $token;
    
    public $callback;
    public $message;
   
    public function generator(){
        
        require_once __DIR__ . '/setting.php';
        require_once __DIR__ . '/connect.db.php';
        
        $this->key = openssl_random_pseudo_bytes($this->key_length); // PHP 7 random_bytes($length);
        
        $this->app_id = bin2hex(openssl_random_pseudo_bytes($this->app_length));
        $this->app_secret = bin2hex($this->key);
        
        $this->token = hash('sha256', $this->key);
        
        # Save
        $db = $conn->prepare("INSERT INTO tbl_authenticate (app_id, app_secret, token, expires) VALUES (:app_id, :app_secret, :token, :expires);");
        
        $params = array(
            'app_id' => $this->app_id,
            'app_secret' => $this->app_secret,
            'token' => $this->token,
            'expires' => date('Y-m-d H:i:s',time() + 3600) //  +1 (3600) hour
        );
        
        if ($db->execute($params)){
            
            $this->message = 'Successful';
            $this->callback = 'http://localhost/php-auth-token/validator.php?app_id=' . $this->app_id . '&app_secret=' . $this->app_secret;
            
        } else {
            
            $this->message = 'Unsuccessful';
            
        }
        
        return $this;
        
    }
    
    public function validator($app_id, $app_secret){
        
        require_once __DIR__ . '/setting.php';
        require_once __DIR__ . '/connect.db.php';
        
        $db = $conn->prepare('SELECT * FROM tbl_authenticate WHERE app_id = :app_id AND app_secret = :app_secret AND expires <= NOW() LIMIT 1;');
        $db->setFetchMode(\PDO::FETCH_OBJ);
        
        $params = array(
            'app_id' => $app_id,
            'app_secret' => $app_secret,
        );
        
        $db->execute($params);
        
        if(!empty($row = $db->fetch(\PDO::FETCH_ASSOC))){
            
            $auth_hash = hash('sha256', hex2bin($app_secret));
            
            if (hash_equals($auth_hash, $row['token'])) {
                
                $this->message = 'Successful';
                
            } else {
                
                $this->message = 'Unsuccessful';
                
            }
            
        } else {
            
            $this->message = 'Unsuccessful';
            
        }
        
        return $this;
        
    }
    
}