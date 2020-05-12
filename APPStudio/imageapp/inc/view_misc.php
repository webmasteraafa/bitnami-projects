
<?php
   
    $data = get_images($album);
    $counter = mysql_num_rows($data);
    echo '<div class="col-lg-4 col-md-4 col-sm-4">';
    while ($row = mysql_fetch_array($data))
    {
      
      
      echo '<div style="height:260px; padding:3px;">';
      echo '<img src="';
      $location = array();
      $location = explode('/', $row['filelocation']);
      if ($location[0] == 'C:Inetpubvhostskidswithfoodallergies.orgstandupforasthma.org')
      {
	  	$location_new = 'http://www.standupforasthma.org';
	  	$filelocation = $location_new . '/' . $location[1] . '/' . $location[2] .'/' . $location[3] . '/';
	  	
	  }
      echo $filelocation;
      echo $row ['imagename'];
      echo '"width="30%" class="img-responsive" alt="';
      echo $row ['imagename'];
      echo '">';
      echo '<br/>';
      echo '<a href="';
	  echo $filelocation;
      echo $row ['imagename'];
      echo '" target="_blank">View Large</a>';
      echo '<br/></div>';
      $counter = $counter -1;
      if ($counter == 0)
      {
	  	echo '</div>';
	  }
      else 
      {
	  	echo '</div><div class="col-lg-4 col-md-4 col-sm-4">';
	  }
		
	}
	?>
