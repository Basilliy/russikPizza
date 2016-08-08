<?php
/**
 * Created by PhpStorm.
 * User: russik
 * Date: 18.07.2016
 * Time: 10:56
 */
file_put_contents("fb.txt",file_get_contents("php://input"));
$fb = file_get_contents("fb.txt");
$fb = json_decode($fb);
$id = $fb->entry[0]->messaging[0]->sender->id;
$reid = $fb->entry[0]->messaging[0]->recipient->id;
$message = $fb->entry[0]->messaging[0]->message->text;
$token = "EAAUZC7GZBxEEoBAOZCZCaTq85jvjA7wIZCvZAyK8NVTMJZAt1yoPZBqhHpavhomi0JJOgDaD6F4z3AVy62vXxX9ToZBZCY0oYo0xTMHBsQlUifR0qF4y3IKSb7CVDp7hQtBoDVWlt3t47so9aMZC0is2QrpKoO2ZBv9puX0rMRzhsTQnoAZDZD";
$fp = json_decode(file_get_contents('user.json'), true);
$data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "hi",
           
            )
           );
 $options = array(
          'http' => array(
             'method' => 'POST',
             'content' => json_encode($data),
             'header' => "Content-Type: application/json"
             )
 );
 $option = array(
          'http' => array(
             'method' => 'POST',
             'content' => json_encode($date),
             'header' => "Content-Type: application/json"
             )
 );
$context = stream_context_create($options);
$contexts = stream_context_create($option);
file_get_contents("https://graph.facebook.com/v2.7/me/messages?access_token=$token",false, $contexts);
file_get_contents("https://graph.facebook.com/v2.7/me/messages?access_token=$token",false, $context);
