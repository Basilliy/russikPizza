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

$host = 'upperl.mysql.ukraine.com.ua'; // адрес сервера 
$database = 'upperl_vadik'; // имя базы данных
$user = 'upperl_vadik'; // имя пользователя
$password = '2shmpzez'; // пароль
$link = mysqli_connect($host, $user, $password,$database)
    or die('Не удалось соединиться: ' . mysql_error());
//echo 'Соединение успешно установлено';


$buttonMenu = array(
        "content_type" => "text",
        "title" => "Pizza Menu",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_buttonMenu"
 );
$buttonSite = array(
        "content_type" => "text",
        "title" => "Visit our site",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_buttonSite"
 );
 
 $buttonLocation = array(
        "content_type" => "text",
        "title" => "Our location",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_buttonLocation"
 );
 
 $buttonOffers = array(
        "content_type" => "text",
        "title" => "Top offers",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_buttonOffers"
 );
 
$keyboardSet =[$buttonMenu,$buttonSite,$buttonLocation, $buttonOffers];



$site =json_encode(array(
         "type" => "web_url",
         "url" => " http://appartika.com ",
         "title" => "Our web site"
 ));
$element = array(
            "title" => "Appartika",
            "image_url" => "https://presentpizza.herokuapp.com/appartika.jpg",
            "subtitle" => "Click",
            "buttons" => [$site]
             );
$URL= array(
         "type" => "template",
         "payload" => array(
               "template_type" => "generic",
               "elements" => [$element]
        )
 );

$Map = array(
         "type" => "location",
         "payload" => array(
               "coordinates" => array("lat"=> 55, "long"=> 37)
               
        )
 );



switch ($message) {
        case 'Pizza Menu':
           $link =$this->connectToDB();
           $query = 'SELECT * FROM menu';
           $result = $link->query($query) or die('Запрос не удался: ' . mysql_error());
           //print_r($result);
           $rows = $result->fetch_assoc();
           //print_r($rows['ButtonsName']);
           //$mystring = 'Generate Insult,Language,Homepage';
           $findme   = ',';
           $button = explode($findme, $rows['pizzaType']);
           
           for($i = 0; $i < count($button); $i ++){
            
            ${$button[$i]}= array(
            "content_type" => "text",
            "title" => "$button[$i]",
            "payload" => "$button[$i]"
            );
          $keyboardSet[$i] = "hi";
           }

           
           
           $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "Pizza type",
           "quick_replies" => json_encode($keyboardSet)
            )
           );
        break;
        case 'Our location':                                                                                                                                              
           $date = array(
           'recipient' => array('id' => "$id" ),
           'message' => array(
                      "attachment" =>$Map 
                              )
           );
        break;
        case 'Visit our site':                                                                                                                                              
           $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => " ",
           "quick_replies" => json_encode($keyboardSet)
            )
           );
           $date = array(
           'recipient' => array('id' => "$id" ),
           'message' => array(
                      "attachment" =>$URL
                              )
           );
        break;
          default:
          $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "Welcome",
           "quick_replies" => json_encode($keyboardSet)
            )
           );
}           
           
           
           
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
