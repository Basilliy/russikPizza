<?php
/**
 * Created by PhpStorm.
 * User: russik
 * Date: 08.08.2016
 * Time: 15:27
 */
$verify_token = "hi"; // Verify token 
if (!empty($_REQUEST['hub_mode']) && $_REQUEST['hub_mode'] == 'subscribe' && $_REQUEST['hub_verify_token'] == $verify_token) { 
echo $_REQUEST['hub_challenge']; 
}
