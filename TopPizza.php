<?php 

$dbHost='upperl.mysql.ukraine.com.ua';// чаще всего это так, но иногда требуется прописать ip адрес базы данных
$dbName='upperl_vadik';// название вашей базы
$dbUser='upperl_vadik';// пользователь базы данных
$dbPass='2shmpzez';// пароль пользователя
$link = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
$link->set_charset("utf8");

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

 if (!($stmt = $link->prepare("UPDATE pizzaMenu SET TopPizza = ? WHERE id = 1"))) {
               echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
                }
                if (!$stmt->bind_param("s",$message)) {
                 echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
                }

?>
