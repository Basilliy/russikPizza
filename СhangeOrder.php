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
  
  
}





?>
