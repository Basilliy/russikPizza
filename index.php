<?php
/**
 * Created by PhpStorm.
 * User: russik
 * Date: 18.07.2016
 * Time: 10:56
 */
 
include 'СhangeOrder.php';
include 'MakeOrder.php';
include 'TopPizza.php';

file_put_contents("fb.txt",file_get_contents("php://input"));
$fb = file_get_contents("fb.txt");
$fb = json_decode($fb);
$id = $fb->entry[0]->messaging[0]->sender->id;
$reid = $fb->entry[0]->messaging[0]->recipient->id;
$message = $fb->entry[0]->messaging[0]->message->text;
$token = "EAAUZC7GZBxEEoBALidvMoIe53cHsMJj0ubYzRjd13XseZBCJgilHdm4TBeb0ZC1ceslDOEeMaiNLSwawudAQDDpZC1bAKeK8nsQdDp9ZBZCg1MgJIEvqTBoSZBrQZAr4klBGDHkqDrQegreaNY3WZAK9arQQEvne22sxaILwd7AAD5UQZDZD";
$fp = json_decode(file_get_contents('user.json'), true);

$rus = new СhangeOrder;
$MakeCheck = new MakeOrder;
$TopPizza = new TopPizza;

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


//$before = file_get_contents("errors.txt");
$be = json_decode(file_get_contents('user.json'), true);
//$text = $be['1275823659124425'];

//if($today == '08.30.16'){
// file_put_contents("errors.txt",$today);
//}


foreach ( $be as $key=> $value) {
        if($key==$id){
            $before = $value;
        }
    }
    

$findme   = ' ';
$ru = explode($findme, $before);
//file_put_contents("errors.txt",$ru[0]);




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
            "quick_replies" => json_encode($rus->ChangeMenu())
           )
           );

        break;
       
        case 'Pizza Menu':
         $text = 'pizzaType';
         $data = $MakeCheck->GetOrderMenuWithSelection($rows, $id, $text);
           
           $mass[$id] = $text;
           $arr3 = json_encode($mass);
           file_put_contents('user.json', $arr3);
           
           //file_put_contents("errors.txt","Pizza type");
        break;
        case 'Our location':                                                                                                                                              
          $attachment = array( "type" => "image",
            "payload" => array("url" => "https://presentpizza.herokuapp.com/map.jpg")
            );
           
           
            $datar = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("attachment" => json_encode($attachment)
            )
           );
           
            $optionsr = array(
          'http' => array(
             'method' => 'POST',
             'content' => json_encode($datar),
             'header' => "Content-Type: application/json"
             )
 );
           $contextr = stream_context_create($optionsr);
file_get_contents("https://graph.facebook.com/v2.7/me/messages?access_token=$token",false, $contextr);
           
           
           $date = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => " ",
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
  
         $today = date("m.d.y");
         $checkTop = $TopPizza->DateCheck($link,$today,$id);
         if($checkTop == 'false'){
         $TopPizza->SetNewDate($link,$today,$id);
         $TopPizza->SetTopPizza($link,$id);
         }
         
         $query = 'SELECT * FROM russik';
         $offers = $link->query($query) or die('Запрос не удался: ' . mysql_error());
         
         $menu = $offers->fetch_assoc();
         
         
         
         for($i=0; $i < $coun['COUNT(1)']; $i++){
            if($menu['user_id'] == $id){
             $TOP = $menu['TopPizza'];
            }
           }
           if($TOP=='Neapolitan')
           $url = "https://presentpizza.herokuapp.com/Neapolitan.jpg";
           if($TOP=='Gourmet')
           $url = "https://presentpizza.herokuapp.com/Gourmet.jpg";
           if($TOP=='Italiano')
           $url = "https://presentpizza.herokuapp.com/Italiano.jpg";
           
           $attachment = array( "type" => "image",
            "payload" => array("url" => "$url")
            );
           
           
            $datar = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("attachment" => json_encode($attachment)
            )
           );
           
            $optionsr = array(
          'http' => array(
             'method' => 'POST',
             'content' => json_encode($datar),
             'header' => "Content-Type: application/json"
             )
 );
           $contextr = stream_context_create($optionsr);
file_get_contents("https://graph.facebook.com/v2.7/me/messages?access_token=$token",false, $contextr);
           
           
           $date = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => " ",
           "quick_replies" => json_encode($keyboardSet)
            )
           );
           
           
           

           
          // $data = array(
         //  'recipient' => array('id' => "$id" ),
         //  'message' => array("text" => "$TOP",
        //   "quick_replies" => json_encode($keyboardSet)
         //   )
        //   );
           
        break;
          default:
           switch($before){
           case 'pizzaType':   
           $text = "pizzaSize";
           $data = $MakeCheck->GetOrderMenuWithSelection($rows, $id, $text);
           
           $mass[$id] = $text;
           $arr3 = json_encode($mass);
           file_put_contents('user.json', $arr3);
           //file_put_contents("errors.txt","Size");
           
           $rus->ChangePizzaType($link,$message,$id);
           
            break;   
             
             case 'pizzaSize': 
              
              $text = "pizzaSouce";
           $data = $MakeCheck->GetOrderMenuWithSelection($rows, $id, $text);
           
           $mass[$id] = $text;
           $arr3 = json_encode($mass);
           file_put_contents('user.json', $arr3);
              
           //file_put_contents("errors.txt","Souce");
           $rus->ChangePizzaSize($link,$message,$id);
          
             break;  
               
             case 'pizzaSouce':
              $text = "pizzaQuantity";
             $data = $MakeCheck->GetOrderMenuOhneSelection($id, $text);
           $mass[$id] = "pizzaQuantity";
           $arr3 = json_encode($mass);
           file_put_contents('user.json', $arr3);
          // file_put_contents("errors.txt","Quantity");
           
           $rus->ChangePizzaSouce($link,$message,$id);
          
             break;  
              
              
              case 'pizzaQuantity':   
                $text = "phoneNumber";
             $data = $MakeCheck->GetOrderMenuOhneSelection($id, $text);
           $mass[$id] = "phoneNumber";
           $arr3 = json_encode($mass);
           file_put_contents('user.json', $arr3);
           //file_put_contents("errors.txt","Phone");
           $rus->ChangePizzaQuantity($link,$message,$id);
           
             break;
               
              case 'phoneNumber':    
             $text = "Adress";
             $data = $MakeCheck->GetOrderMenuOhneSelection($id, $text);
           $mass[$id] = "Adress";
           $arr3 = json_encode($mass);
           file_put_contents('user.json', $arr3);
          // file_put_contents("errors.txt","Adress");
          $rus->ChangePhoneNumber($link,$message,$id);
          
             break;    
               
               case 'Adress':       
                          
           $mass[$id] = "Finish";
           $arr3 = json_encode($mass);
           file_put_contents('user.json', $arr3); 
           
          // file_put_contents("errors.txt","Finish");
          $rus->ChangeAdress($link,$message,$id);
          
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
           
if(($message=='pizzaType')||($message=='pizzaSize')||($message=='pizzaQuantity')){
$data = $MakeCheck->GetOrderMenuWithSelection($rows, $id, $message);
$mass[$id] = "GetUpdate ".$message;
           $arr3 = json_encode($mass);
           file_put_contents('user.json', $arr3);
}

if(($message=='phoneNumber')||($message=='Adress')||($message=='pizzaQuantity')){
 $data = $MakeCheck->GetOrderMenuOhneSelection($id, $message);
$mass[$id] = "GetUpdate ".$message;
           $arr3 = json_encode($mass);
           file_put_contents('user.json', $arr3);
}

 
 if($ru[0]=='GetUpdate'){
 
if($ru[1]=='phoneNumber'){
$rus->ChangePhoneNumber($link,$message,$id);
}

if($ru[1]=='Adress'){
$rus->ChangeAdress($link,$message,$id);
}

if($ru[1]=='pizzaSouce'){
$rus->ChangePizzaSouce($link,$message,$id);
}

if($ru[1]=='pizzaType'){
$rus->ChangePizzaType($link,$message,$id);
}

if($ru[1]=='pizzaSize'){
$rus->ChangePizzaSize($link,$message,$id);
}
if($ru[1]=='pizzaQuantity'){
$rus->ChangePizzaQuantity($link,$message,$id);
}

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
