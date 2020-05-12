<?php
include ('/../main_files/template/header.php');
require('/inc/statehonorroll_lib.php');
db_connect();


	
	  
	
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
                    <h1 class="page-header">Extra Credit Indicator Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
      			<div class="col-lg-12 col-md-12 col-sm-12">
      			<div class="table-responsive">
				<table class="table table-bordered">
					<tbody>
					<tr style="text-align:center; font-weight:bold"><td colspan="2"></td>
					<td colspan="6">Medication and Treatment Policies</td>
					    <td colspan="2">Awareness Policies</td>
					    <td colspan="5">School Policies</td>
					</tr>
	    				 <tr style="text-align:center">
	     					 <td>State</td><td>Total</td><td>A</td><td>B</td><td>C</td><td>D</td><td>E</td><td>F</td><td>G</td><td>H</td><td>I</td><td>J</td><td>K</td><td>L</td><td>M</td></tr>
<?php

	$result = extra_credit_data();
	while ($row = mysql_fetch_array($result))
    {
		
    	echo '<tr style="text-align:center"><td>';
		echo $row['statename'];
    	echo '</td><td>';
    	$total = $row['awareness-CI'] + $row['medical-CI'] + $row['school-CI'];
    	echo $total;
    	echo '</td>';
        $data = $row['QA'];
        $QA = reporting_check ($data);
        echo $QA;
        $data = $row['QB'];
        $QB = reporting_check ($data);
        echo $QB;
        $data = $row['QC'];
        $QC = reporting_check ($data);
        echo $QC;
        $data = $row['QD'];
        $QD = reporting_check ($data);
        echo $QD;
        $data = $row['QE'];
        $QE = reporting_check ($data);
        echo $QE;
        $data = $row['QF'];
        $QF = reporting_check ($data);
        echo $QF;
        $data = $row['QG'];
        $QG = reporting_check ($data);
        echo $QG;
        $data = $row['QH'];
        $QH = reporting_check ($data);
        echo $QH;
        $data = $row['QI'];
        $QI = reporting_check ($data);
        echo $QI;
        $data = $row['QJ'];
        $QJ = reporting_check ($data);
        echo $QJ;
        $data = $row['QK'];
        $QK = reporting_check ($data);
        echo $QK;
        $data = $row['QL'];
        $QL = reporting_check ($data);
        echo $QL;
        $data = $row['QM'];
        $QM = reporting_check ($data);
        echo $QM;
       	//$QA = reporting_check ($data);
     
		echo '</tr>';
	}
?>	


</tbody></table>	</div>
	</div></div></div></div>
	<?php 
	include ('/../main_files/template/footer.php');?>

