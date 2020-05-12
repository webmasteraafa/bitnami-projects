<?php
function letter_coding ($x){
	if ($x < 10)
	{
		switch ($x){
			case  '0':
				$x = 'zero';
				return $x;
				break;
			case  '1':
				$x = 'one';
				return $x;
				break;
			case  '2':
				$x = 'two';
				return $x;
				break;
			case  '3':
				$x = 'three';
				return $x;
				break;
			case  '4':
				$x = 'four';
				return $x;
				break;
			case  '5':
				$x = 'five';
				return $x;
				break;
			case  '6':
				$x = 'six';
				return $x;
				break;
			case '7':
				$x = 'seven';
				return $x;
				break;
			case  '8':
				$x = 'eight';
				return $x;
				break;
			case '9':
				$x = 'nine';
				return $x;
				break;
		}
	}
	else {
		return $x;
	}
}
function value_check($y)
{
	if ($y == 'YES')
	{
		$y = 'grey';
		return $y;
	}
	else if ($y == 'NO')
	{
		$y = 'no_color';
		return $y;
	}


}
 
function pull_point_date ($state)
{
	$sql = "SELECT * FROM `points` WHERE `statename` = '$state'";
	$result = mysql_query($sql)or die (mysql_error());
	return $result;
}
function pull_state_date ($state)
{
	$sql = "SELECT * FROM `state_info` WHERE `statename` = '$state'";
	$result2 = mysql_query($sql)or die (mysql_error());
	return $result2;
}
function pull_state_images (){

	$sql = "SELECT `statename`, `state_image_url` FROM `state_info` ORDER BY `statename` ASC";
	$result = mysql_query($sql) or die ('Could not your information;' . mysql_error());
	return $result;
}

function extra_credit_data (){
	
	$sql = "SELECT `points`.`statename`, `points`.`medical-CI`, `points`.`awareness-CI`, `points`.`school-CI`,`state_info`.`QA`,  `state_info`.`QB`, `state_info`.`QC`, `state_info`.`QD`, `state_info`.`QE`, `state_info`.`QF`, `state_info`.`QG`, `state_info`.`QH`, `state_info`.`QI`,  `state_info`.`QJ`, `state_info`.`QK`, `state_info`.`QL`, `state_info`.`QM` FROM `points`, `state_info`  WHERE `points`.`statename` = `state_info`.`statename`";
	$result = mysql_query($sql) or die ('Could not your information;' . mysql_error());
	return $result;
}
function core_credit_data (){

	$sql = "SELECT `points`.`statename`, `points`.`medical-CP`, `points`.`awareness-CP`, `points`.`school-CP`,`state_info`.`Q1`,  `state_info`.`Q2`, `state_info`.`Q3`, `state_info`.`Q4`, `state_info`.`Q5`, `state_info`.`Q6`, `state_info`.`Q7`, `state_info`.`Q8`, `state_info`.`Q9`,  `state_info`.`Q10`, `state_info`.`Q11`, `state_info`.`Q12`, `state_info`.`Q13`, `state_info`.`Q14`, `state_info`.`Q15`, `state_info`.`Q16`, `state_info`.`Q17`, `state_info`.`Q18`, `state_info`.`Q19`, `state_info`.`Q20`, `state_info`.`Q21`, `state_info`.`Q22`, `state_info`.`Q23` FROM `points`, `state_info`  WHERE `points`.`statename` = `state_info`.`statename`";
	$result = mysql_query($sql) or die ('Could not your information;' . mysql_error());
	return $result;
}
function reporting_check ($data)
{
	
	if ($data == 'YES') 
	{ 
	    $data = '<td><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" width="12px" /></td>';
		return $data;
	}
	else 
	{
		$data = '<td><img alt="" src="http://www.aafa.org/media/x-24x24.png" width="12px" /></td>';
		return $data;
	}
	
}
function insert_state_data($state,$q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10,$q11,$q12,$qA,$qB,$qC,$qD,$qE,$qF,$q13,$q14,$qG,$qH,$q15,$q16,$q17,$q18,$q19,$q20,$q21,$q22,$q23,$qI,$qJ,$qK,$qL,$qM,$policygap,$noteworthy,$source,$imageurl,$year,$medical_cp,$medical_i,$awareness_cp,$awareness_ci,$school_cp,$school_ci)
{
	switch ($year)
	{
		case '2016':
		$sql = "INSERT INTO `state_info`(`idno`, `statename`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`, `Q11`, `Q12`, `QA`, `QB`, `QC`, `QD`, `QE`, `QF`, `Q13`, `Q14`, `QG`, `QH`, `Q15`, `Q16`, `Q17`, `Q18`, `Q19`, `Q20`, `Q21`, `Q22`, `Q23`, `QI`, `QJ`, `QK`, `QL`, `QM`, `policygap`, `noteworthy`, `sources`, `state_image_url`) VALUES (NULL,'$state', '$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$qA','$qB','$qC','$qD','$qE','$qF','$q13','$q14','$qG','$qH','$q15','$q16','$q17','$q18','$q19','$q20','$q21','$q22','$q23','$qI','$qJ','$qK','$qL','$qM','$policygap','$noteworthy','$source','$imageurl')";
$result = mysql_query($sql) or die (mysql_error());
		echo 'insert';
		insert_point_data ($year,$state,$medical_cp,$medical_i,$awareness_cp,$awareness_ci,$school_cp,$school_ci);
		break;
		
	
	case '2017':
	$sql = "INSERT INTO `state_info_2017`(`idno`, `statename`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`, `Q11`, `Q12`, `QA`, `QB`, `QC`, `QD`, `QE`, `QF`, `Q13`, `Q14`, `QG`, `QH`, `Q15`, `Q16`, `Q17`, `Q18`, `Q19`, `Q20`, `Q21`, `Q22`, `Q23`, `QI`, `QJ`, `QK`, `QL`, `QM`, `policygap`, `noteworthy`, `sources`, `state_image_url`) VALUES (NULL,'$state', '$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$qA','$qB','$qC','$qD','$qE','$qF','$q13','$q14','$qG','$qH','$q15','$q16','$q17','$q18','$q19','$q20','$q21','$q22','$q23','$qI','$qJ','$qK','$qL','$qM','$policygap','$noteworthy','$source','$imageurl')";
$result = mysql_query($sql) or die (mysql_error());
		echo 'insert';
		insert_point_data_2017 ($year,$state,$medical_cp,$medical_i,$awareness_cp,$awareness_ci,$school_cp,$school_ci);
		break;
	}
}

function insert_point_data ($year,$state,$medical_cp,$medical_i,$awareness_cp,$awareness_ci,$school_cp,$school_ci)
{
	
	switch ($year)
	{
		case '2016':
		$sql2 ="INSERT INTO `points`(`id`, `statename`, `medical-CP`, `medical-CI`, `awareness-CP`, `awareness-CI`, `school-CP`, `school-CI`) VALUES (NULL,'$state','$medical_cp','$medical_i','$awareness_cp','$awareness_ci','$school_cp','$school_ci')"; 

$result = mysql_query($sql2) or die (mysql_error());
header ("Refresh: 5; URL=" . $redirect  . "");             
          	echo "(If your browser doesn't support this, " .         
          	"<a href='/../statehonorroll/index.php'>click here</a>)"; 
            exit;
		break;
		case '2017':
		$sql2 ="INSERT INTO `points`(`id`, `statename`, `medical-CP`, `medical-CI`, `awareness-CP`, `awareness-CI`, `school-CP`, `school-CI`) VALUES (NULL,'$state','$medical_cp','$medical_i','$awareness_cp','$awareness_ci','$school_cp','$school_ci')"; 

$result = mysql_query($sql2) or die (mysql_error());
header ("Refresh: 5; URL=" . $redirect  . "");             
          	echo "(If your browser doesn't support this, " .         
          	"<a href='../statehonorroll/index.html'>click here</a>)"; 
            exit;
		break;
    } 		
}    
  function  update_state_info ($state,$q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10,$q11,$q12,$qA,$qB,$qC,$qD,$qE,$qF,$q13,$q14,$qG,$qH,$q15,$q16,$q17,$q18,$q19,$q20,$q21,$q22,$q23,$qI,$qJ,$qK,$qL,$qM,$policygap,$noteworthy,$source,$imageurl,$year,$medical_cp,$medical_i,$awareness_cp,$awareness_ci,$school_cp,$school_ci)
{
	switch ($year)
	{
		case '2016':
		$sqlu = "UPDATE`state_info` SET `Q1` = '$q1',
		                                `Q2` = '$q2',
		                                `Q3` = '$q3',
		                                `Q4` = '$q4',
		                                `Q5` =  '$q5',
		                                `Q6` =  '$q6',
		                                `Q7` =  '$q7',
		                                `Q8` =  '$q8',
		                                `Q9` =  '$q9',
		                                `Q10` = '$q10',
		                                `Q11` = '$q11',
		                                `Q12` = '$q12',
		                                `QA` =  '$qA',
		                                `QB` =  '$qB',
		                                `QC` =  '$qC',
		                                `QD` =  '$qD',
		                                `QE` =  '$qE',
		                                `QF` =  '$qF',
		                                `Q13` =  '$q13',
		                                `Q14` =  '$q14',
		                                `QG` =  '$qG',
		                                `QH` =  '$qH',
		                                `Q15` =  '$q15',
		                                `Q16` =  '$q16',
		                                `Q17` =  '$q17',
		                                `Q18` =  '$q18',
		                                `Q19` =  '$q19',
		                                `Q20` =  '$q20',
		                                `Q21` =  '$q21',
		                                `Q22` =  '$q22',
		                                `Q23` =  '$q23',
		                                `QI` =  '$qI',
		                                `QJ` =  '$qJ',
		                                `QK` =  '$qK',
		                                `QL` =  '$qL',
		                                `QM` =  '$qM',
		                                `policygap` =  '$policygap',
		                                `noteworthy` =  '$noteworthy',
		                                `sources` =  '$source'
		                                WHERE `statename` = '$state'";
		                      $result = mysql_query($sqlu) or die (mysql_error());   
		 update_points ($year,$state,$medical_cp,$medical_i,$awareness_cp,$awareness_ci,$school_cp,$school_ci);                            
		break;
		case '2017':
		$sqlu = "UPDATE`state_info_2017` SET `Q1` = '$q1',
		                                `Q2` = '$q2',
		                                `Q3` = '$q3',
		                                `Q4` = '$q4',
		                                `Q5` =  '$q5',
		                                `Q6` =  '$q6',
		                                `Q7` =  '$q7',
		                                `Q8` =  '$q8',
		                                `Q9` =  '$q9',
		                                `Q10` = '$q10',
		                                `Q11` = '$q11',
		                                `Q12` = '$q12',
		                                `QA` =  '$qA',
		                                `QB` =  '$qB',
		                                `QC` =  '$qC',
		                                `QD` =  '$qD',
		                                `QE` =  '$qE',
		                                `QF` =  '$qF',
		                                `Q13` =  '$q13',
		                                `Q14` =  '$q14',
		                                `QG` =  '$qG',
		                                `QH` =  '$qH',
		                                `Q15` =  '$q15',
		                                `Q16` =  '$q16',
		                                `Q17` =  '$q17',
		                                `Q18` =  '$q18',
		                                `Q19` =  '$q19',
		                                `Q20` =  '$q20',
		                                `Q21` =  '$q21',
		                                `Q22` =  '$q22',
		                                `Q23` =  '$q23',
		                                `QI` =  '$qI',
		                                `QJ` =  '$qJ',
		                                `QK` =  '$qK',
		                                `QL` =  '$qL',
		                                `QM` =  '$qM',
		                                `policygap` =  '$policygap',
		                                `noteworthy` =  '$noteworthy',
		                                `sources` =  '$source'
		                                WHERE `statename` = '$state'";
		                                $result = mysql_query($sqlu) or die (mysql_error());
		                                 update_points_2007 ($year,$state,$medical_cp,$medical_i,$awareness_cp,$awareness_ci,$school_cp,$school_ci);
		break;
	}
	
	
	
}    
function update_points ($year,$state,$medical_cp,$medical_i,$awareness_cp,$awareness_ci,$school_cp,$school_ci)
{
	switch ($year)
	{
		case '2016':
		$sqlu = "UPDATE `points` SET `medical-CP` = '$medical_cp', 
		                             `medical-CI` = '$medical_i', 
		                             `awareness-CP` = '$awareness_cp', 
		                             `awareness-CI` = '$awareness_ci', 
		                             `school-CP`    = '$school_cp', 
		                              `school-CI`   = '$school_ci' WHERE `statename` = '$state'";
		                                $result = mysql_query($sqlu) or die (mysql_error());
		header ("Refresh: 5; URL=" . $redirect  . "");             
          	echo "(If your browser doesn't support this, " .         
          	"<a href='../statehonorroll/index.html'>click here</a>)"; 
            exit;
		break;
		
		case '2017':
		"UPDATE `points_2017` SET `medical-CP` = '$medical_cp', 
		                             `medical-CI` = '$medical_i', 
		                             `awareness-CP` = '$awareness_cp', 
		                             `awareness-CI` = '$awareness_ci', 
		                             `school-CP`    = '$school_cp', 
		                              `school-CI`   = '$school_ci' WHERE `statename` = '$state'";
		                                $result = mysql_query($sqlu) or die (mysql_error());
		header ("Refresh: 5; URL=" . $redirect  . "");             
          	echo "(If your browser doesn't support this, " .         
          	"<a href='../statehonorroll/index.html'>click here</a>)"; 
            exit;
		break;
		
		
	}
}
?>