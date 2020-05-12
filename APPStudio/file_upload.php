<?php
  $counter = count($_FILE['upload']['name']);
  echo $counter;
  for ($i=0; $i < $counter; $i++)
  {
  	  echo "Upload: " . $_FILES["upload"]["name"][$i] . "<br>";
      echo "Type: " . $_FILES["upload"]["type"][$i] . "<br>";
      echo "Size: " . ($_FILES["upload"]["size"][$i] / 5000) . " kB<br>";
      echo "Temp file: " . $_FILES["upload"]["tmp_name"][$i] . "<br>";
  	
  	 $ext = array();
     $ext =  explode('.',$_FILES["upload"]["name"][$i]);
     echo $ext[1];
   
   
  }

    
  
?> 