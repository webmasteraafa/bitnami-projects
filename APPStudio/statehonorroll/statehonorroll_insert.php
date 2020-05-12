<?php
include ('/../main_files/inc/lib.php');
require('/inc/statehonorroll_lib.php');
db_connect();
	  
$state = $_POST['state'];
$imageurl = $_POST['imageurl'];
$year = $_POST['year'];
$action = $_POST['action'];
$q1 = $_POST['1'];
$q2 = $_POST['2'];
$q3 = $_POST['3'];
$q4 = $_POST['4'];
$q5 = $_POST['5'];
$q6 = $_POST['6'];
$q7 = $_POST['7'];
$q8 = $_POST['8'];
$q9 = $_POST['9'];
$q10 = $_POST['10'];
$q11 = $_POST['11'];
$q12 = $_POST['12'];
$qA = $_POST['A'];
$qB = $_POST['B'];
$qC = $_POST['C'];
$qD = $_POST['D'];
$qE = $_POST['E'];
$qF = $_POST['F'];
$q13 = $_POST['13'];
$q14 = $_POST['14'];
$qG = $_POST['G'];
$qH = $_POST['H'];
$q15 = $_POST['15'];
$q16 = $_POST['16'];
$q17 = $_POST['17'];
$q18 = $_POST['18'];
$q19 = $_POST['19'];
$q20 = $_POST['20'];
$q21 = $_POST['21'];
$q22 = $_POST['22'];
$q23 = $_POST['23'];
$qI = $_POST['I'];
$qJ = $_POST['J'];
$qK = $_POST['K'];
$qL = $_POST['L'];
$qM = $_POST['M'];



//Initial values
$medical_cp = 0;
$medical_i = 0;
$school_cp = 0;
$school_ci = 0;
$awareness_cp = 0;
$awareness_ci = 0;
$noteworthy = mysql_real_escape_string($_POST['noteworthy']);
$imageurl = mysql_real_escape_string($_POST['imageurl']);
$policygap = mysql_real_escape_string($_POST['policygap']);
$source = mysql_real_escape_string($_POST['sources']);
if ($q1 == 'yes')
{
	
	$medical_cp = $medical_cp + 1;
}
if ($q2 == 'yes')
{
	
	$medical_cp = $medical_cp + 1;
}
if ($q3 == 'yes')
{
	
	$medical_cp = $medical_cp + 1;
}
if ($q4 == 'yes')
{
	
	$medical_cp = $medical_cp + 1;
}
if ($q5 == 'yes')
{
	
	$medical_cp = $medical_cp + 1;
}
if ($q6 == 'yes')
{
	
	$medical_cp = $medical_cp + 1;
}
if ($q7 == 'yes')
{
	
	$medical_cp = $medical_cp + 1;
}
if ($q8 == 'yes')
{
	
	$medical_cp = $medical_cp + 1;
}
if ($q9 == 'yes')
{
	
	$medical_cp = $medical_cp + 1;
}


if ($q10 == 'yes')
{
	
	$medical_cp = $medical_cp + 1;
}
if ($q11 == 'yes')
{
	
	$medical_cp = $medical_cp + 1;
}
if ($q12 == 'yes')
{
	
	$medical_cp = $medical_cp + 1;
}


if ($qA == 'yes')
{
	
	$medical_i = $medical_i + 1;
}
if ($qB == 'yes')
{
	
	$medical_i = $medical_i + 1;
}
if ($qC == 'yes')
{
	
	$medical_i = $medical_i + 1;
}
if ($qD == 'yes')
{
	
	$medical_i = $medical_i + 1;
}
if ($qE == 'yes')
{
	
	$medical_i = $medical_i + 1;
}
if ($qF == 'yes')
{
	
	$medical_i = $medical_i + 1;
}

if ($q13 == 'yes')
{
	$awareness_cp = $awareness_cp + 1;
}
if ($q14 =='yes')
{
	$awareness_cp = $awareness_cp + 1;
}

  if ($qG == 'yes') 
{
   $awareness_ci = $awareness_ci +1;
}
if ($qH =='yes')
{
	$awareness_ci = $awareness_ci + 1;
}
 if ($q15 == 'yes')
{
	
	$school_cp = $school_cp + 1;
}
if ($q16 == 'yes')
{
	
	$school_cp = $school_cp + 1;
}
if ($q17 == 'yes')
{
	
	$school_cp = $school_cp + 1;
}
if ($q18 == 'yes')
{
	
	$school_cp = $school_cp + 1;
}
if ($q19 == 'yes')
{
	
	$school_cp = $school_cp + 1;
}
if ($q20 == 'yes')
{
	
	$school_cp = $school_cp + 1;
}
if ($q21 == 'yes')
{
	
	$school_cp = $school_cp + 1;
}
if ($q22 == 'yes')
{
	
	$school_cp = $school_cp + 1;
}
if ($q21 == 'yes')
{
	
	$school_cp = $school_cp + 1;
}


if ($qI == 'yes')
{
	
	$school_ci = $school_ci + 1;
}
if ($qJ == 'yes')
{
	
	$school_ci = $school_ci + 1;
}
if ($qK == 'yes')
{
	
	$school_ci = $school_ci + 1;
}
if ($qL == 'yes')
{
	
	$school_ci = $school_ci + 1;
}
if ($qM == 'yes')
{
	
	$school_ci = $school_ci + 1;
}

switch ($_POST['action'])
{
	case 'add':
	insert_state_data($state,$q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10,$q11,$q12,$qA,$qB,$qC,$qD,$qE,$qF,$q13,$q14,$qG,$qH,$q15,$q16,$q17,$q18,$q19,$q20,$q21,$q22,$q23,$qI,$qJ,$qK,$qL,$qM,$policygap,$noteworthy,$source,$imageurl,$year,$medical_cp,$medical_i,$awareness_cp,$awareness_ci,$school_cp,$school_ci);
    break;
	case 'update':
	update_state_info ($state,$q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10,$q11,$q12,$qA,$qB,$qC,$qD,$qE,$qF,$q13,$q14,$qG,$qH,$q15,$q16,$q17,$q18,$q19,$q20,$q21,$q22,$q23,$qI,$qJ,$qK,$qL,$qM,$policygap,$noteworthy,$source,$imageurl,$year,$medical_cp,$medical_i,$awareness_cp,$awareness_ci,$school_cp,$school_ci);
	break;
}


?>