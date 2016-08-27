<?php

class MakeOrder{
  
  function printHi(){
    $hi = "russik make order";
    return $hi;
    
  }
  
  function GetOrderMenuWithSelection($rows, $id, $text){
    file_put_contents("errors.txt",$text);
     $findme   = ',';
           $button = explode($findme, $rows["$text"]);
           
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
           return $data;
  }
  
}

?>
