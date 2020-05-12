<?php
include ('/../main_files/template/header.php');
require('/inc/statehonorroll_lib.php');
db_connect();
$state='';
$state=$_GET['state'];
$title = $state;

	
	  
	
?>

<body>
<div id="wrapper">

       <?php $data = check_nav($SA, $CG, $DG); 
             $data = '/../main_files/'.$data;
             include ($data);
   ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $state ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
      			<div class="col-lg-12 col-md-12 col-sm-12">

<?php

	$result = pull_point_date($state);
    while ($row = mysql_fetch_array($result))
    {
		$total_cp = 0;
		$totel_ci = 0;
		$total_cp = $row['medical-CP'] + $row['awareness-CP'] + $row['school-CP'];
		$total_ci = $row['medical-CI'] + $row['awareness-CI'] + $row['school-CI'];
		$medical_cp = $row['medical-CP'];
		$awareness_cp = $row['awareness-CP'];
		$school_cp = $row['school-CP'];
		$medical_ci = $row['medical-CI'];
		$awareness_ci = $row['awareness-CI'];
		$school_ci = $row['school-CI'];
	}
	$result2 = pull_state_date($state);
    while ($row = mysql_fetch_array($result2))
    {
		
	?>	
	<div style="width:720px">
	<div class="main_logo_box">
<div class="logo_box"><img alt="State Honor Roll 2016 logo&amp;" src="http://www.aafa.org/media/SHR-Logo-2016.png" /></div>

<div class="state_data_box">
<h2><?php echo strtoupper($row['statename']);?></h2>

<p>Overall, <?php echo $row['statename'];?> meets <?php 
$total_cp = letter_coding($total_cp);
echo $total_cp;
?> of 23 core policy standards and 
<?php
$total_ci = letter_coding($total_ci);
echo $total_ci;
?> of 13 extra credit indicators.</p>
</div>


<div class="state_box">
<?php echo'<img alt="';
echo $row['statename'];
echo ' state icon" src="';
echo $row['state_image_url'];
echo'" />';
?>
</div>
</div>
<br clear="both"/>
<p></p>
	<div class="main_heading_box">
<h3 style="color:#fff; margin-top:7px; margin-left:5px;">Medication and Treatment Policies:</h3>
</div>

<div class="sub_heading_box">
<p style="margin-top:5px; margin-left:5px;">Meets <?php
$medical_cp = letter_coding($medical_cp);?>

<?php echo $medical_cp;?> of 12 core policy standards in this category:</p>
</div>
<table class="data_tables">
	<tbody>
		<tr>
		<?php 
			$q1 = $row['Q1'];
			$q1 = value_check($q1);
		    if ($q1 == 'grey') {?>
			<td class="grey_box">1.&nbsp;State requires physician&rsquo;s written instructions to be on file to dispense prescription medication to students.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
			else {?>
			<td class="no_color_box">1.&nbsp;State requires physician&rsquo;s written instructions to be on file to dispense prescription medication to students.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
		</tr>
		<tr>
		    <?php
			$q2 = $row['Q2'];
			$q2 = value_check($q2);
		    if ($q2 == 'grey') {?>
			<td class="grey_box">2.&nbsp;State policy ensures students&rsquo; right to self-carry and self-administer prescribed asthma medication.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
			else {?>
			 <td class="no_color_box">2.&nbsp;State policy ensures students&rsquo; right to self-carry and self-administer prescribed asthma medication.</td>
			 <td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
		    </tr>
		    <tr> 
		    <?php
			$q3 = $row['Q3'];
			$q3 = value_check($q3);
		    if ($q3 == 'grey') {?>
			<td class="grey_box">3.&nbsp;State policy ensures students&rsquo; right to self-carry and self-administer prescribed anaphylaxis medication.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
			else {?>
			 <td class="no_color_box">3.&nbsp;State policy ensures students&rsquo; right to self-carry and self-administer prescribed anaphylaxis medication.</td>
			 <td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png"></td>
			<?php }?>
		    </tr>
		    <tr> 
		    <?php
			$q4 = $row['Q4'];
			$q4 = value_check($q4);
		    if ($q4 == 'grey') {?>
			<td class="grey_box">4.&nbsp;State policies or procedures shield school personnel from liability for unintended injuries.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
			else {?>
			 <td class="no_color_box">4.&nbsp;State policies or procedures shield school personnel from liability for unintended injuries.</td>
			 <td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
		    </tr>
		<tr> 
		    <?php
			$q5 = $row['Q5'];
			$q5 = value_check($q5);
		    if ($q5 == 'grey') {?>
			<td class="grey_box">5.&nbsp;State requires local school districts to create asthma and anaphylaxis medication policy and provides resources, guidelines and parameters.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
			else {?>
			 <td class="no_color_box">5.&nbsp;State requires local school districts to create asthma and anaphylaxis medication policy and provides resources, guidelines and parameters.</td>
			 <td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
		    </tr>
		    <tr>
		    <?php
			$q6 = $row['Q6'];
			$q6 = value_check($q6);
			if ($q6 == 'grey') {?>
			<td class="grey_box">6.&nbsp;State policy mandates schools to identify and maintain records for students with chronic conditions including asthma and anaphylaxis.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
			else
			{?>
			 <td class="no_color_box">6.&nbsp;State policy mandates schools to identify and maintain records for students with chronic conditions including asthma and anaphylaxis.</td>
			 <td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
		    </tr>
		    <tr>
		    <?php
			$q7 = $row['Q7'];
			$q7 = value_check($q7);
			if ($q7 == 'grey') {?>
			<td class="grey_box">7.&nbsp;State requires a procedure updating health records periodically.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
			else
			{?>
			 <td class="no_color_box">7.&nbsp;State requires a procedure updating health records periodically.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
		    </tr>
		     <tr>
		    <?php
			$q8 = $row['Q8'];
			$q8 = value_check($q8);
			if ($q8 == 'grey') {?>
			<td class="grey_box">8.&nbsp;State requires that schools maintain asthma/allergy incident reports for reactions, attacks, and medications administered.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
			else
			{?>
			 <td class="no_color_box">8.&nbsp;State requires that schools maintain asthma/allergy incident reports for reactions, attacks, and medications administered.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
		    </tr>
		    <tr>
		    <?php
			$q9 = $row['Q9'];
			$q9 = value_check($q9);
			if ($q9 == 'grey') {?>
			<td class="grey_box">9.&nbsp;State requires a student health history form that includes asthma/allergy information to be maintained for each student.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
			else
			{?>
			 <td class="no_color_box">9.&nbsp;State requires a student health history form that includes asthma/allergy information to be maintained for each student.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
		    </tr>
		    <tr>
		    <?php
			$q10 = $row['Q10'];
			$q10 = value_check($q10);
			if ($q10 == 'grey') {?>
			<td class="grey_box">10.&nbsp;State requires schools to have emergency protocols for asthma.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td><?php }
			else
			{?>
			 <td class="no_color_box">10.&nbsp;State requires schools to have emergency protocols for asthma.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
		    </tr>
		    <tr>
		    <?php
			$q11 = $row['Q11'];
			$q11 = value_check($q11);
			if ($q11 == 'grey') {?>
			<td class="grey_box">11.&nbsp;State requires schools to have emergency protocols for anaphylaxis.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" ></td><?php }
			else
			{?>
			 <td class="no_color_box">11.&nbsp;State requires schools to have emergency protocols for anaphylaxis.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
		    </tr>
		    <tr>
		    <?php
			$q12 = $row['Q12'];
			$q12 = value_check($q12);
			if ($q12 == 'grey') {?>
			<td class="grey_box">12.&nbsp;Nurse-to-student ratio is 1:750 or better.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td><?php }
			else
			{?>
			 <td class="no_color_box">12.&nbsp;Nurse-to-student ratio is 1:750 or better.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
		    </tr>
		    
			</tbody></table>
<div class="sub_heading_box">
<p style="margin-top:5px; margin-left:5px;">Meet
<?php $medical_ci = letter_coding($medical_ci);
echo $medical_ci;?>
 of six extra credit indicators in this category:</p>
 
</div>
<table class="data_tables">
	<tbody>
	     <tr>
		    <?php
			$qa = $row['QA'];
			$qa = value_check($qa);
			if ($qa == 'grey') {?>
			<td class="grey_box">A.&nbsp;State requires anaphylaxis epinephrine stocking and authority to administer in schools.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td><?php }
			else
			{?>
			 <td class="no_color_box">A.&nbsp;State requires anaphylaxis epinephrine stocking and authority to administer in schools.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
		
			<?php }?>
		    </tr>
	      <tr>
		    <?php
			$qb = $row['QB'];
			$qb = value_check($qb);
			if ($qb == 'grey') {?>
			<td class="grey_box">B.&nbsp;State requires or allows albuterol asthma medication stocking and authority to administer in schools.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
		    else
			{?>
			 <td class="no_color_box">B.&nbsp;State requires or allows albuterol asthma medication stocking and authority to administer in schools.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
		    </tr>
	<tr>
		    <?php
			$qc = $row['QC'];
			$qc = value_check($qc);
			if ($qc == 'grey') {?>
			<td class="grey_box">C.&nbsp;State has or is preparing an explicit asthma program with policies, procedures and resources for schools to manage students with asthma.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
		    else
			{?>
			 <td class="no_color_box">C.&nbsp;State has or is preparing an explicit asthma program with policies, procedures and resources for schools to manage students with asthma.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
		<?php }?>
		    </tr>
		    <tr>
		    <?php
			$qd = $row['QD'];
			$qd = value_check($qd);
			if ($qd == 'grey') {?>
			<td class="grey_box">D.&nbsp;State has or is preparing an explicit anaphylaxis program with policies, procedures and resources for schools to manage students with allergies.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
		    else
			{?>
			 <td class="no_color_box">D.&nbsp;State has or is preparing an explicit anaphylaxis program with policies, procedures and resources for schools to manage students with allergies.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
		    </tr>
		     <tr>
		    <?php
			$qe = $row['QE'];
			$qe = value_check($qe);
			if ($qe == 'grey') {?>
			<td class="grey_box">E.&nbsp;State has adopted policy that each school will have one full-time nurse.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
		    else
			{?>
			 <td class="no_color_box">E.&nbsp;State has adopted policy that each school will have one full-time nurse.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
		<?php }?>
		    </tr>
		     <tr>
		    <?php
			$qf = $row['QF'];
			$qf = value_check($qf);
			if ($qf == 'grey') {?>
			<td class="grey_box">F.&nbsp;State has adopted policy that school districts provide case management for students with chronic health conditions such as asthma.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
		    else
			{?>
			 <td class="no_color_box">F.&nbsp;State has adopted policy that school districts provide case management for students with chronic health conditions such as asthma.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
		<?php }?>
		    </tr>
		
	</tbody>
</table>
	<div class="main_heading_box">
<h3 style="color:#fff; margin-top:7px; margin-left:5px;">Awareness Policies:</h3>
</div>

<div class="sub_heading_box">
<p style="margin-top:5px; margin-left:5px;">Meets <?php
$awareness_cp = letter_coding($awareness_cp);?>

<?php echo $awareness_cp;?> of two core policy standards in this category:</p>
</div>

<table class="data_tables">
	<tbody>
	    <tr>
		    <?php
			$q13 = $row['Q13'];
			$q13 = value_check($q13);
			if ($q13 == 'grey') {?>
			<td class="grey_box">13.&nbsp;State recognizes problem of asthma in schools and has begun to address it.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
		    else
			{?>
			<td class="no_color_box">13.&nbsp;State recognizes problem of asthma in schools and has begun to address it.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
		    </tr>
		 <tr>
		    <?php
			$q14 = $row['Q14'];
			$q14 = value_check($q14);
			if ($q14 == 'grey') {?>
			<td class="grey_box">14.&nbsp;State recognizes problem of allergy in schools and has begun to address it.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
		    else
			{?>
			 <td class="no_color_box">14.&nbsp;State recognizes problem of allergy in schools and has begun to address it.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
		
		<?php }?></tr>
	</tbody>
</table>

<div class="sub_heading_box">
<p style="margin-top:5px; margin-left:5px;">Meets <?php
$awareness_ci = letter_coding($awareness_ci);?>

<?php echo $awareness_ci;?> of two extra credit indicators in this category:</p>
</div>

<table class="data_tables">
	<tbody>
		 <tr>
		    <?php
			$qG = $row['QG'];
			$qG = value_check($qG);
			if ($qG == 'grey') {?>
			<td class="grey_box">G.&nbsp;State sponsors or provides funding for staff training in asthma awareness covering school asthma program/policy and procedures.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
		<?php }
		    else
			{?>
			 <td class="no_color_box">G.&nbsp;State sponsors or provides funding for staff training in asthma awareness covering school asthma program/policy and procedures.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
		
		<?php }?></tr>
		 <tr>
		    <?php
			$qH = $row['QH'];
			$qH = value_check($qH);
			if ($qH == 'grey') {?>
			<td class="grey_box">H.&nbsp;State sponsors or provides funding for staff training in food allergies.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
		    else
			{?>
			 <td class="no_color_box">H.&nbsp;State sponsors or provides funding for staff training in food allergies.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
		
		<?php }?></tr>
	</tbody>
</table>

<div class="main_heading_box">
<h3 style="color:#fff; margin-top:7px; margin-left:5px;">School Environment Policies:</h3>
</div>

<div class="sub_heading_box">
<p style="margin-top:5px; margin-left:5px;">Meets <?php
$school_cp = letter_coding($school_cp);?>

<?php echo $school_cp;?> of nine core policy standards in this category:</p>
</div>

<table class="data_tables">
	<tbody>
	<tr>
		    <?php
			$q15 = $row['Q15'];
			$q15 = value_check($q15);
			if ($q15 == 'grey') {?>
			<td class="grey_box">15.&nbsp;State has mandated that all schools must have Indoor Air Quality (IAQ) management policies.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
		    else
			{?>
			 <td class="no_color_box">15.&nbsp;State has mandated that all schools must have Indoor Air Quality (IAQ) management policies.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
		
		<?php }?></tr>
		<tr>
		    <?php
			$q16 = $row['Q16'];
			$q16 = value_check($q16);
			if ($q16 == 'grey') {?>
			<td class="grey_box">16.&nbsp;State has adopted a policy requiring that districts and schools conduct periodic inspections ofheating, ventilation and air conditioning (HVAC) system &amp; other items important in asthma/allergymanagement.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
		    else
			{?>
			 <td class="no_color_box">16.&nbsp;State has adopted a policy requiring that districts and schools conduct periodic inspections ofheating, ventilation and air conditioning (HVAC) system &amp; other items important in asthma/allergymanagement.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
	
		<?php }?></tr>
		<?php
			$q17 = $row['Q17'];
			$q17 = value_check($q17);
			if ($q17 == 'grey') {?>
			<td class="grey_box">17.&nbsp;State has IAQ policies that include specific components important in asthma/allergy management (HVAC, HEPA, carpeting, pesticide use).</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
		    else
			{?>
			<td class="no_color_box">17.&nbsp;State has IAQ policies that include specific components important in asthma/allergy management (HVAC, HEPA, carpeting, pesticide use).</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
		<?php }?></tr><tr>
		<?php
			$q18 = $row['Q18'];
			$q18 = value_check($q18);
			if ($q18 == 'grey') {?>
			<td class="grey_box">18.&nbsp;State recommends/requires that districts or schools use integrated pest management (IPM)techniques OR ban use of pesticides inside school.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
		    else
			{?>
			<td class="no_color_box">18.&nbsp;State recommends/requires that districts or schools use integrated pest management (IPM)techniques OR ban use of pesticides inside school.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
	<?php }?></tr><tr>
	<?php
			$q19 = $row['Q19'];
			$q19 = value_check($q19);
			if ($q19 == 'grey') {?>
			<td class="grey_box">19.&nbsp;State requires schools to notify parents of upcoming pesticide applications.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
		    else
			{?>
			<td class="no_color_box">19.&nbsp;State requires schools to notify parents of upcoming pesticide applications.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?></tr><tr>
			<?php
			$q20 = $row['Q20'];
			$q20 = value_check($q20);
			if ($q20 == 'grey') {?>
			<td class="grey_box">20.&nbsp;State limits school bus idling time and establishes proximity restrictions.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
		    else
			{?>
			<td class="no_color_box">20.&nbsp;State limits school bus idling time and establishes proximity restrictions.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
			</tr><tr>
			<?php
			$q21 = $row['Q21'];
			$q21 = value_check($q21);
			if ($q21 == 'grey') {?>
			<td class="grey_box">21.&nbsp;All smoking is prohibited in school buildings and on school grounds.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
		    else
			{?>
			<td class="no_color_box">21.&nbsp;All smoking is prohibited in school buildings and on school grounds.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
			</tr><tr>
			<?php
			$q22 = $row['Q22'];
			$q22 = value_check($q22);
			if ($q22 == 'grey') {?>
			<td class="grey_box">22.&nbsp;All smoking is prohibited on school buses and at school-related functions.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
			<?php }
		    else
			{?>
			<td class="no_color_box">22.&nbsp;All smoking is prohibited on school buses and at school-related functions.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
			
			</tr>
			<tr>
			<?php
			$q23 = $row['Q23' ];
			$q23 = value_check($q23);
			if ($q23 == 'grey') {?>
			<td class="grey_box">23.&nbsp;Tobacco use prevention is required in health education curriculum.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
		     <?php }
		    else
			{?>
			<td class="no_color_box">23.&nbsp;Tobacco use prevention is required in health education curriculum..</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
			</tr>
	</tbody>
</table>
<div class="sub_heading_box">
<p style="margin-top:5px; margin-left:5px;">Meets <?php
$school_ci = letter_coding($school_ci);?>

<?php echo $school_ci;?> of five extra credit indicators in this category:</p>
</div>

<table class="data_tables">
	<tbody><tr>
		<?php
			$qI = $row['QI'];
			$qI = value_check($qI);
			if ($qI == 'grey') {?>
			<td class="grey_box">I.&nbsp;State makes funding or resources available for technical IAQ assistance to schools.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
		     <?php }
		    else
			{?>
			<td class="no_color_box">I.&nbsp;State makes funding or resources available for technical IAQ assistance to schools.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
		<?php }?>
			</tr><tr>
		<?php
			$qJ = $row['QJ' ];
			$qJ = value_check($qJ);
			if ($qJ == 'grey') {?>
			<td class="grey_box">J.&nbsp;State recommends standards and programs to promote environmentally preferable materials for school construction, maintenance and cleaning.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
		     <?php }
		    else
			{?>
			<td class="no_color_box">J.&nbsp;State recommends standards and programs to promote environmentally preferable materials for school construction, maintenance and cleaning.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
		<?php }?>
		
			</tr>
		<tr>
		<?php
			$qK = $row['QK' ];
			$qK = value_check($qK);
			if ($qK == 'grey') {?>
			<td class="grey_box">K.&nbsp;State requires school facility design standards that include low emission construction materials,pollutant source controls, durable and easy to clean surfaces and floors, moisture/mold controls.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
		     <?php }
		    else
			{?>
			<td class="no_color_box">K.&nbsp;State requires school facility design standards that include low emission construction materials,pollutant source controls, durable and easy to clean surfaces and floors, moisture/mold controls.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
			<?php }?>
		</tr>
		<tr>
		<?php
			$qL = $row['QL' ];
			$qL = value_check($qL);
			if ($qL == 'grey') {?>
			<td class="grey_box">L.&nbsp;State has implemented or actively promotes diesel school bus engine retrofitting program.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
		     <?php }
		    else
			{?>
			<td class="no_color_box">L.&nbsp;State has implemented or actively promotes diesel school bus engine retrofitting program.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
		<?php }?>
		</tr>
		<tr>
		<?php
			$qM = $row['QM' ];
			$qM = value_check($qM);
			if ($qM == 'grey') {?>
			<td class="grey_box">M.&nbsp;State requires districts or schools to provide tobacco use cessation services to students.</td>
			<td class="grey_check"><img alt="" src="http://www.aafa.org/media/checkmark24x24.png" /></td>
		     <?php }
		    else
			{?>
			<td class="no_color_box">M.&nbsp;State requires districts or schools to provide tobacco use cessation services to students.</td>
			<td class="no_check"><img alt="" src="http://www.aafa.org/media/x-24x24.png" /></td>
		<?php }?>
		</tr>
		
	</tbody>
</table>
<div class="main_heading_box">
<h3 style="color:#fff; margin-top:7px; margin-left:5px;">Policy Gaps:</h3>
</div>

<table class="data_tables">
	<tbody>
		<tr>
			<td class="policy_text"><?php echo $row['policygap'];?></td>
		</tr>
	</tbody>
</table>
			<div class="main_heading_box">
<h3 style="color:#fff; margin-top:7px; margin-left:5px;">Noteworthy:</h3>
</div>

<table class="data_tables">
	<tbody>
		<tr>
			<td class="no_color_box"><?php echo $row['noteworthy'];?></td>
		</tr>
	</tbody>
</table>
<div class="main_heading_box">
<h3 style="color:#fff; margin-top:7px; margin-left:5px;">Sources:</h3>
</div>

<table class="data_tables">
	<tbody>
		<tr>
			<td class="no_color_box"><?php echo $row['sources'];?></td>
		</tr>
	</tbody>
</table>

<p>Please view and download the full report</p>

			</div><?php
			
	}?>
	</div></div></div></div>
	<?php 
	include ('/../main_files/template/footer.php');?>

