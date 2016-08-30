<?php 
class TopPizza{
function SetTopPizza($link,$user_id){
$random = rand(1, 3);
switch($random){
           case 1:   
           $message = 'Neapolitan';
           break;
            
           case 2:   
           $message = 'Gourmet';
           break;
           
           case 3:   
           $message = 'Italiano';
           break;
           }
 if (!($stmt = $link->prepare("UPDATE pizzaMenu SET TopPizza = ? WHERE user_id = ?"))) {
               echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
                }
                if (!$stmt->bind_param("si",$message,$user_id)) {
                 echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
                }
}

function SetNewDate($link,$message,$user_id){
   if (!($stmt = $link->prepare("UPDATE pizzaMenu SET date = ? WHERE user_id = ?"))) {
               echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
                }
                if (!$stmt->bind_param("si",$message,$user_id)) {
                 echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
                }
}

function DateCheck($link,$message,$user_id){

$important = 'true';
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
            if($menu['user_id'] ==$user_id){
                       
             $date = $menu['date'];
             //file_put_contents('errors.txt',$final);
            }
             //    $mass[$i] = $menu['user_id'];
              //   $arr3 = json_encode($mass);
           }  
   if($date!=$message){
      $important = 'false';
      
   }        
 return $important;
}


}
?>
