<?php 
class СhangeOrder{
  
  $dbHost='upperl.mysql.ukraine.com.ua';// чаще всего это так, но иногда требуется прописать ip адрес базы данных
  $dbName='upperl_vadik';// название вашей базы
  $dbUser='upperl_vadik';// пользователь базы данных
  $dbPass='2shmpzez';// пароль пользователя
  $link = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
  $link->set_charset("utf8");
  
  
  function printHi(){
    $hi = "russik say hi";
    return $hi;
    
  }
  
  
  function ChangePizzaType($message,$user_id){
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
  function ChangePizzaSize($message,$user_id){
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
  function ChangePizzaQuantity($message,$user_id){
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
  function ChangePhoneNumber($message,$user_id){
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
  function ChangeAdress($message,$user_id){
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
  function ChangePizzaSouce($message,$user_id){
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
