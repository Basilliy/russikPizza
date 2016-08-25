<?php
/**
 * Created by PhpStorm.
 * User: russik
 * Date: 18.07.2016
 * Time: 10:56
 */
 
include 'СhangeOrder.php';
file_put_contents("fb.txt",file_get_contents("php://input"));
$fb = file_get_contents("fb.txt");
$fb = json_decode($fb);
$id = $fb->entry[0]->messaging[0]->sender->id;
$reid = $fb->entry[0]->messaging[0]->recipient->id;
$message = $fb->entry[0]->messaging[0]->message->text;
$token = "EAAUZC7GZBxEEoBAMpGrZB1yEfdZBihr0mWMN7rU1J3nf2KXQlTpymxcZBjbyfQXASNsCRwcfGbA2S8nh2hrZBGnZA8NkWeHaDS5O3MKEjLBggOVyOUSeZBupfHM76ABTPcNBSev0Ioc0M0Y0Ouh0CMZAkzmukoZAXkrOSncdkiJet9PQZDZD";
$fp = json_decode(file_get_contents('user.json'), true);

//$rus = new СhangeOrder;

//$before = file_get_contents("errors.txt");
$be = json_decode(file_get_contents('user.json'), true);
//$text = $be['1275823659124425'];
//file_put_contents("errors.txt",$text);
foreach ( $be as $key=> $value) {
        if($key==$id){
            $before = $value;
        }
    }
    
//file_put_contents("errors.txt",$rus->printHi());

$dbHost='upperl.mysql.ukraine.com.ua';// чаще всего это так, но иногда требуется прописать ip адрес базы данных
$dbName='upperl_vadik';// название вашей базы
$dbUser='upperl_vadik';// пользователь базы данных
$dbPass='2shmpzez';// пароль пользователя
$link = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
$link->set_charset("utf8");

//$host = 'upperl.mysql.ukraine.com.ua'; // адрес сервера 
//$database = 'upperl_vadik'; // имя базы данных
//$user = 'upperl_vadik'; // имя пользователя
//$password = '2shmpzez'; // пароль
//$link = mysqli_connect($host, $user, $password,$database)
//    or die('Не удалось соединиться: ' . mysql_error());
//echo 'Соединение успешно установлено';

$query = 'SELECT COUNT(1) FROM russik';
$count = $link->query($query) or die('Запрос не удался: ' . mysql_error());
           
$coun = $count->fetch_assoc();


 $query = 'SELECT * FROM russik';
                $order = $link->query($query) or die('Запрос не удался: ' . mysql_error());
               // print_r($result);
               $menu = $order->fetch_assoc();
                // $mass = $rowas['user_id'];
                //$arr3 = json_encode($mass);
                
                for($i=0; $i < $coun['COUNT(1)']; $i++){
            //$newId = (string)$mass[$i];
            if($menu['user_id'] == $id){
                       
             $final = $menu['user_id'];
             //file_put_contents('errors.txt',$final);
            }
             //    $mass[$i] = $menu['user_id'];
              //   $arr3 = json_encode($mass);
           }


// if (!($stmt = $link->prepare("SELECT * FROM russik WHERE user_id = ?"))) {
  //             echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
 //               }
 //               if (!$stmt->bind_param("i", $id)) {
 //                echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
//               }
//              if (!$stmt->execute()) {
 //               echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
  //              }
//$stmt->bind_result($district);
//$stmt->fetch();


$query = 'SELECT * FROM pizzaMenu';
 $result = $link->query($query) or die('Запрос не удался: ' . mysql_error());
     // print_r($result);
           $rows = $result->fetch_assoc();
//print_r($rows['pizzaType']);
           //$mystring = 'Generate Insult,Language,Homepage';



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

$buttonOrder = array(
        "content_type" => "text",
        "title" => "Make Order",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_buttonMenu"
 );
$buttonСhange = array(
        "content_type" => "text",
        "title" => "Сhange Order",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_buttonSite"
 );
 
 
$keyboardOrder =[$buttonOrder,$buttonСhange];


$pizzaType = array(
        "content_type" => "text",
        "title" => "pizza Type",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_pizzaType"
 );
$pizzaSize = array(
        "content_type" => "text",
        "title" => "pizza Size",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_pizzaSize"
 );
 $pizzaQuantity = array(
        "content_type" => "text",
        "title" => "pizza Quantity",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_pizzaQuantity"
 );
 $phoneNumber = array(
        "content_type" => "text",
        "title" => "phone Number",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_phoneNumber"
 );
 $Adress = array(
        "content_type" => "text",
        "title" => "Adress",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_Adress"
 );
  $pizzaSouce = array(
        "content_type" => "text",
        "title" => "pizza Souce",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_pizzaSouce"
 );
$keyboardСhangeOrder =[$pizzaType,$pizzaSize,$pizzaSouce,$pizzaQuantity,$phoneNumber,$Adress];


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
           
           case 'Make Order':

           
           $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "Your order is on the way"
           
           )
           );

        break;
           
       case 'Сhange Order':

           
           $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "Select the field you want to change",
            "quick_replies" => json_encode($keyboardСhangeOrder)
           )
           );

        break;
       
        case 'Pizza Menu':
         $query = 'SELECT user_id FROM russik';
         $results = $link->query($query) or die('Запрос не удался: ' . mysql_error());
     
           $rowas = $results->fetch_assoc();
           

           
           
           // print_r($rowas);
           //$mystring = 'Generate Insult,Language,Homepage';
           $flag = "false";
           //$mass =  $rowas['user_id'];
           for($i=0; $i < $coun['COUNT(1)']; $i++){
            //$newId = (string)$mass[$i];
            if($rowas['user_id'] == $id){
             $flag = "true";
              
            }
           
           
           }
          
           if($flag == "false"){
                 if (!($stmt = $link->prepare("INSERT INTO russik(user_id) VALUES (?)"))) {
               echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
                }
                if (!$stmt->bind_param("i", $id)) {
                 echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
                }
            }
           $findme   = ',';
           $button = explode($findme, $rows['pizzaType']);
           
           for($i = 0; $i < count($button); $i ++){
            
            ${$button[$i]}= array(
            "content_type" => "text",
            "title" => "$button[$i]",
            "payload" => "$button[$i]"
            );
            $keyboardMenu[$i] = ${$button[$i]};
            
            }
           
           $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "Pizza type",
           "quick_replies" => json_encode($keyboardMenu)
           )
           );
           
           $mass[$id] = "Pizza type";
           $arr3 = json_encode($mass);
           file_put_contents('user.json', $arr3);
           
           //file_put_contents("errors.txt","Pizza type");
        break;
        case 'Our location':                                                                                                                                              
           $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "Функция в разработке",
           "quick_replies" => json_encode($keyboardSet)
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
        case 'Top offers':                                                                                                                                              
           $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "Функция в разработке",
           "quick_replies" => json_encode($keyboardSet)
            )
           );
           
        break;
          default:
           switch($before){
            case 'Pizza type':                                                                                                                                              
           $findme   = ',';
           $button = explode($findme, $rows['pizzaSize']);
           
           for($j = 0; $j < count($button); $j ++){
            
            ${$button[$j]}= array(
            "content_type" => "text",
            "title" => "$button[$j]",
            "payload" => "$button[$j]"
            );
            $keyboardSize[$j] = ${$button[$j]};
            
            }
            
            $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "Size",
           "quick_replies" => json_encode($keyboardSize)
           )
           );
           
           $mass[$id] = "Size";
           $arr3 = json_encode($mass);
           file_put_contents('user.json', $arr3);
           //file_put_contents("errors.txt","Size");
           
           //$rus->ChangePizzaType($message,$id);
            if (!($stmt = $link->prepare("UPDATE russik SET pizzaType = ? WHERE user_id = ?"))) {
               echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
                }
                if (!$stmt->bind_param("si",$message,$id)) {
                 echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
                }
            break;   
             
             case 'Size':                                                                                                                                              
             $findme   = ',';
           $button = explode($findme, $rows['pizzaSouce']);
           
           for($j = 0; $j < count($button); $j ++){
            
            ${$button[$j]}= array(
            "content_type" => "text",
            "title" => "$button[$j]",
            "payload" => "$button[$j]"
            );
            $keyboardSouce[$j] = ${$button[$j]};
            
            }
            
            $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "Souce",
           "quick_replies" => json_encode($keyboardSouce)
           )
           );
           $mass[$id] = "Souce";
           $arr3 = json_encode($mass);
           file_put_contents('user.json', $arr3);
           //file_put_contents("errors.txt","Souce");
           if (!($stmt = $link->prepare("UPDATE russik SET pizzaSize = ? WHERE user_id = ?"))) {
               echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
                }
                if (!$stmt->bind_param("si",$message,$id)) {
                 echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
                }
             break;  
               
             case 'Souce':                                                                                                                                              
            $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "Enter quantity of pizza",
           
           )
           );
           $mass[$id] = "Quantity";
           $arr3 = json_encode($mass);
           file_put_contents('user.json', $arr3);
          // file_put_contents("errors.txt","Quantity");
           
           
           if (!($stmt = $link->prepare("UPDATE russik SET 	pizzaSouce = ? WHERE user_id = ?"))) {
               echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
                }
                if (!$stmt->bind_param("si",$message,$id)) {
                 echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
                }
           
           
             break;  
              
              
              case 'Quantity':                                                                                                                                              
            $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "Enter your phone number",
           
           )
           );
           $mass[$id] = "Phone";
           $arr3 = json_encode($mass);
           file_put_contents('user.json', $arr3);
           //file_put_contents("errors.txt","Phone");
           if (!($stmt = $link->prepare("UPDATE russik SET pizzaQuantity = ? WHERE user_id = ?"))) {
               echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
                }
                if (!$stmt->bind_param("ii",$message,$id)) {
                 echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
                }
           
             break;
               
              case 'Phone':                                                                                                                                              
            $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "Enter your Adress",
           
           )
           );
           $mass[$id] = "Adress";
           $arr3 = json_encode($mass);
           file_put_contents('user.json', $arr3);
          // file_put_contents("errors.txt","Adress");
           if (!($stmt = $link->prepare("UPDATE russik SET phoneNumber = ? WHERE user_id = ?"))) {
               echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
                }
                if (!$stmt->bind_param("ii",$message,$id)) {
                 echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
                }
             break;    
               
               case 'Adress':       
                          
           $mass[$id] = "Finish";
           $arr3 = json_encode($mass);
           file_put_contents('user.json', $arr3); 
           
          // file_put_contents("errors.txt","Finish");
           if (!($stmt = $link->prepare("UPDATE russik SET Adress = ? WHERE user_id = ?"))) {
               echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
                }
                if (!$stmt->bind_param("si",$message,$id)) {
                 echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
                }
                
                
           
          
               // for($i=0; $i < $coun['COUNT(1)']; $i++){
                 //$newId = (string)$mass[$i];
                //if($rowas['user_id'] == $id){
                // $flag = "true";
              
                 //}
                //}
           $query = 'SELECT * FROM russik';
                $order = $link->query($query) or die('Запрос не удался: ' . mysql_error());
               // print_r($result);
               $menu = $order->fetch_assoc();
                // $mass = $rowas['user_id'];
                //$arr3 = json_encode($mass);
                
                for($i=0; $i < $coun['COUNT(1)']; $i++){
            //$newId = (string)$mass[$i];
            if($menu['user_id'] == $id){
             $final = $menu;
             //file_put_contents('errors.txt',$final['pizzaType']);
            }
             //    $mass[$i] = $menu['user_id'];
              //   $arr3 = json_encode($mass);
           }
                
               //  file_put_contents('user.json', $arr3);
                 
                
                $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "ваш заказ : пицца - ".$final['pizzaType']."\n размер - ".$final['pizzaSize']."\n соус - ".$final['pizzaSouce']."\n количество - ".$final['pizzaQuantity']."\n ваш номер - ".$final['phoneNumber']."\n ваш адресс - ".$final['Adress'],     
           "quick_replies" => json_encode($keyboardOrder)
           )
           );
             break;
               
               
            default:   
            $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "Hello",
           "quick_replies" => json_encode($keyboardSet)
           )
           );
            
            
            
           }
           
           
          
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
