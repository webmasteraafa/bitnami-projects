
<?php
    $data = get_server_images($album);
    $counter = mysql_num_rows($data);
    echo '<div class="col-lg-4 col-md-4 col-sm-4">';
    while ($row = mysql_fetch_array($data))
    {
      
      echo '<div style="height:200px; padding:3px;">';
      echo '<img src="';
      echo $row['file-location'];
      echo $row ['imagename'];
      echo '"width="50%" class="img-responsive" alt="';
      echo $row ['imagename'];
      echo '">';
      echo '<br/>';
      echo '<a href="';
	  echo $row['file-location'];
      echo $row ['imagename'];
      echo '" target="_blank">View Large</a>';
      echo '<br/>';
      echo '</div>';
      $counter = $counter -1;
      if ($counter == 0)
      {
	  	echo '</div>';
	  }
      else 
      {
	  	echo '</div><div class="col-lg-4 col-md-4 col-sm-4">';
	  }
		
	}?>
