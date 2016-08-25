<?php 
class СhangeOrder{

  function printHi(){
    $hi = "russik say hi";
    return $hi;
    
  }
  
  
    function ChangePizzaType($link,$message,$user_id){
     if (!($stmt = $link->prepare("UPDATE russik SET pizzaType = ? WHERE user_id = ?"))) {
               echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
                }
                if (!$stmt->bind_param("si",$message,$user_id)) {
                 echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
                }
  }
  function ChangePizzaSize($link,$message,$user_id){
    if (!($stmt = $link->prepare("UPDATE russik SET pizzaSize = ? WHERE user_id = ?"))) {
               echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
                }
                if (!$stmt->bind_param("si",$message,$user_id)) {
                 echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
                }
  }
  function ChangePizzaQuantity($link,$message,$user_id){
    if (!($stmt = $link->prepare("UPDATE russik SET pizzaQuantity = ? WHERE user_id = ?"))) {
               echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
                }
                if (!$stmt->bind_param("si",$message,$user_id)) {
                 echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
                }
  }
  function ChangePhoneNumber($link,$message,$user_id){
    if (!($stmt = $link->prepare("UPDATE russik SET phoneNumber = ? WHERE user_id = ?"))) {
               echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
                }
                if (!$stmt->bind_param("si",$message,$user_id)) {
                 echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
                }
  }
  function ChangeAdress($link,$message,$user_id){
    if (!($stmt = $link->prepare("UPDATE russik SET Adress = ? WHERE user_id = ?"))) {
               echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
                }
                if (!$stmt->bind_param("si",$message,$user_id)) {
                 echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
                }
  }
  function ChangePizzaSouce($link,$message,$user_id){
    if (!($stmt = $link->prepare("UPDATE russik SET pizzaSouce = ? WHERE user_id = ?"))) {
               echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
                }
                if (!$stmt->bind_param("si",$message,$user_id)) {
                 echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
                }
  }
  
  function ChangeMenu(){
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

return $keyboardСhangeOrder;
  }
  
  
}

?>
