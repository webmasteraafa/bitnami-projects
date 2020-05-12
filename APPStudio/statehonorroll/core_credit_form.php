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
                    <h1 class="page-header">Core Credit Indicator Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
      			<div class="col-lg-12 col-md-12 col-sm-12">
      			<div class="table-responsive">
				<table class="table table-bordered">
					<tbody>
					<tr style="text-align:center; font-weight:bold"><td colspan="2"></td>
					<td colspan="12">Medication and Treatment Policies</td>
					    <td colspan="2">Awareness Policies</td>
					    <td colspan="9">School Policies</td>
					</tr>
	    				 <tr style="text-align:center">
	     					 <td>State</td><td>Total</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td></tr>
<?php

	$result = core_credit_data();
	while ($row = mysql_fetch_array($result))
    {
		
    	echo '<tr style="text-align:center"><td>';
		echo $row['statename'];
    	echo '</td><td>';
    	$total = $row['awareness-CP'] + $row['medical-CP'] + $row['school-CP'];
    	echo $total;
    	echo '</td>';
        $data = $row['Q1'];
        $Q1 = reporting_check ($data);
        echo $Q1;
        $data = $row['Q2'];
        $Q2 = reporting_check ($data);
        echo $Q2;
        $data = $row['Q3'];
        $Q3 = reporting_check ($data);
        echo $Q3;
        $data = $row['Q4'];
        $Q4 = reporting_check ($data);
        echo $Q4;
        $data = $row['Q5'];
        $Q5 = reporting_check ($data);
        echo $Q5;
        $data = $row['Q6'];
        $Q6 = reporting_check ($data);
        echo $Q6;
        $data = $row['Q7'];
        $Q7 = reporting_check ($data);
        echo $Q7;
        $data = $row['Q8'];
        $Q8 = reporting_check ($data);
        echo $Q8;
        $data = $row['Q9'];
        $Q9 = reporting_check ($data);
        echo $Q9;
        $data = $row['Q10'];
        $Q10 = reporting_check ($data);
        echo $Q10;
        $data = $row['Q11'];
        $Q11 = reporting_check ($data);
        echo $Q11;
        $data = $row['Q12'];
        $Q12 = reporting_check ($data);
        echo $Q12;
        $data = $row['Q13'];
        $Q13 = reporting_check ($data);
        echo $Q13;
        $data = $row['Q14'];
        $Q14 = reporting_check ($data);
        echo $Q14;
        $data = $row['Q15'];
        $Q15 = reporting_check ($data);
        echo $Q15;
        $data = $row['Q16'];
        $Q16 = reporting_check ($data);
        echo $Q16;
        $data = $row['Q17'];
        $Q17 = reporting_check ($data);
        echo $Q17;
        $data = $row['Q18'];
        $Q18 = reporting_check ($data);
        echo $Q18;
        $data = $row['Q19'];
        $Q19 = reporting_check ($data);
        echo $Q19;
        $data = $row['Q20'];
        $Q20 = reporting_check ($data);
        echo $Q20;
        $data = $row['Q21'];
        $Q21 = reporting_check ($data);
        echo $Q21;
        $data = $row['Q22'];
        $Q22 = reporting_check ($data);
        echo $Q22;
        $data = $row['Q23'];
        $Q23 = reporting_check ($data);
        echo $Q23;
       	//$QA = reporting_check ($data);
     
		echo '</tr>';
	}
?>	


</tbody></table>	</div>
	</div></div></div></div>
	<?php 
	include ('/../main_files/template/footer.php');?>

