<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require __DIR__ . '/../third_party/vendor/autoload.php';

class Authentication {
   
    // Page header
    function __construct() {
        $fb = new Facebook\Facebook([
            'app_id' => '592740737545404',
            'app_secret' => 'd87d1004d23f3338729d908a2e736e9a',
            'default_graph_version' => 'v2.5',
        ]);
    }
    
}
