<div class="form-group" style="padding:6px">
    				<label for= "inputStateName" class="control-label">State Name</label>
    					<input type="text" class="form-control" id="inputStateName" name="state" value ="<?php echo $row['statename'];?>" maxlength="40" placeholder="category name">
    				</div>
    					<div class="form-group" style="padding:6px">
    				<label for= "inputStateImage" class="control-label">State Image Url</label>
    					<input type="text" class="form-control" id="inputStateImage" name="imageurl" value="<?php echo $row['state_image_url'];?>" maxlength="120" placeholder="category name">
    				</div><div class="form-group" style="padding:6px"><table style="width:100%; padding:5px;">
		<tr><td colspan="2"><label><u>Medication and Treatment Policies: Core Policy Standards</u></label></td></tr>
 			<tr> 
 			<td width="70%">1.&nbsp;State requires physician&rsquo;s written instructions to be on file to dispense prescription medication to students.</td>
 			<td width="30%"><?php 
 			if ($row['Q1'] == 'YES')
 			{   ?>
				<input type="radio" name="1" value="yes" checked>Yes 
				<input type="radio" name="1" value="no" />No
				
			<?php
			}
			else
			{?>
			<input type="radio" name="1" value="yes"/>Yes
 			<input type="radio" name="1" value="no" checked>No
 			
 			<?php
 			} ?>
 			</td></tr>
            <tr>
  <td width="70%">2.&nbsp;State policy ensures students&rsquo; right to self-carry and self-administer prescribed asthma medication.</td>
  <td width="30%"><?php 
 			if ($row['Q2'] == 'YES')
 			{   ?>
				<input type="radio" name="2" value="yes" checked>Yes 
				<input type="radio" name="2" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="2" value="yes"/>Yes
 			<input type="radio" name="2" value="no" checked>No
 			
 			<?php
 			} ?>
  </td></tr>
   <tr> 
  <td>3.&nbsp;State policy ensures students&rsquo; right to self-carry and self-administer prescribed anaphylaxis medication.</td>
  <td><?php 
 			if ($row['Q3'] == 'YES')
 			{   ?>
				<input type="radio" name="3" value="yes" checked>Yes 
				<input type="radio" name="3" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="3" value="yes"/>Yes
 			<input type="radio" name="3" value="no" checked>No
 			
 			<?php
 			} ?>
 			</td></tr>
 			<tr> 
 <td>4.&nbsp;State policies or procedures shield school personnel from liability for unintended injuries.</td>
 <td><?php 
 			if ($row['Q4'] == 'YES')
 			{   ?>
				<input type="radio" name="4" value="yes" checked>Yes 
				<input type="radio" name="4" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="4" value="yes"/>Yes
 			<input type="radio" name="4" value="no" checked>No
 			
 			<?php
 			} ?>
 </td></tr>
 <tr>
  <td >5.&nbsp;State requires local school districts to create asthma and anaphylaxis medication policy and provides resources, guidelines and parameters.</td>
			<td><?php 
 			if ($row['Q5'] == 'YES')
 			{   ?>
				<input type="radio" name="5" value="yes" checked>Yes 
				<input type="radio" name="5" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="5" value="yes"/>Yes
 			<input type="radio" name="5" value="no" checked>No
 			
 			<?php
 			} ?>
		</td></tr>
 			<tr>
			<td>6.&nbsp;State policy mandates schools to identify and maintain records for students with chronic conditions including asthma and anaphylaxis.</td>
			<td><?php 
 			if ($row['Q6'] == 'YES')
 			{   ?>
				<input type="radio" name="6" value="yes" checked>Yes 
				<input type="radio" name="6" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="6" value="yes"/>Yes
 			<input type="radio" name="6" value="no" checked>No
 			
 			<?php
 			} ?>
		</td></tr>
		<tr>
			<td>7.&nbsp;State requires a procedure updating health records periodically.</td>
			<td><?php 
 			if ($row['Q7'] == 'YES')
 			{   ?>
				<input type="radio" name="7" value="yes" checked>Yes 
				<input type="radio" name="7" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="7" value="yes"/>Yes
 			<input type="radio" name="7" value="no" checked>No
 			
 			<?php
 			} ?>
		</td></tr>
		<tr>
			<td>8.&nbsp;State requires that schools maintain asthma/allergy incident reports for reactions, attacks, and medications administered.</td>
			<td><?php 
 			if ($row['Q8'] == 'YES')
 			{   ?>
				<input type="radio" name="8" value="yes" checked>Yes 
				<input type="radio" name="8" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="8" value="yes"/>Yes
 			<input type="radio" name="8" value="no" checked>No
 			
 			<?php
 			} ?>
		</td></tr>
		<tr>
			<td>9.&nbsp;State requires a student health history form that includes asthma/allergy information to be maintained for each student.</td>
			<td><?php 
 			if ($row['Q9'] == 'YES')
 			{   ?>
				<input type="radio" name="9" value="yes" checked>Yes 
				<input type="radio" name="9" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="9" value="yes"/>Yes
 			<input type="radio" name="9" value="no" checked>No
 			
 			<?php
 			} ?>
		</td></tr>
			<tr>
			<td>10.&nbsp;State requires schools to have emergency protocols for asthma.</td>
			<td><?php 
 			if ($row['Q10'] == 'YES')
 			{   ?>
				<input type="radio" name="10" value="yes" checked>Yes 
				<input type="radio" name="10" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="10" value="yes"/>Yes
 			<input type="radio" name="10" value="no" checked>No
 			
 			<?php
 			} ?>
		</td>
		</tr>
		<tr>
			<td>11.&nbsp;State requires schools to have emergency protocols for anaphylaxis.</td>
			<td><?php 
 			if ($row['Q11'] == 'YES')
 			{   ?>
				<input type="radio" name="11" value="yes" checked>Yes 
				<input type="radio" name="11" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="11" value="yes"/>Yes
 			<input type="radio" name="11" value="no" checked>No
 			
 			<?php
 			} ?>
		</td>
		</tr>
		<tr>
			<td>12.&nbsp;Nurse-to-student ratio is 1:750 or better.</td>
			<td><?php 
 			if ($row['Q12'] == 'YES')
 			{   ?>
				<input type="radio" name="12" value="yes" checked>Yes 
				<input type="radio" name="12" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="12" value="yes"/>Yes
 			<input type="radio" name="12" value="no" checked>No
 			
 			<?php
 			} ?>
		</td>
		</tr>
		<tr><td colspan="2"><label><u>Medication and Treatment Policies: Extra Credit Indicators</u></label></td></tr>
        <tr>
			<td>A.&nbsp;State requires anaphylaxis epinephrine stocking and authority to administer in schools.</td>
			<td><?php 
 			if ($row['QA'] == 'YES')
 			{   ?>
				<input type="radio" name="A" value="yes" checked>Yes 
				<input type="radio" name="A" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="A" value="yes"/>Yes
 			<input type="radio" name="A" value="no" checked>No
 			
 			<?php
 			} ?>
		</td>
		</tr>
		<tr>
			<td>B.&nbsp;State requires or allows albuterol asthma medication stocking and authority to administer in schools.</td>
			<td><?php 
 			if ($row['QB'] == 'YES')
 			{   ?>
				<input type="radio" name="B" value="yes" checked>Yes 
				<input type="radio" name="B" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="B" value="yes"/>Yes
 			<input type="radio" name="B" value="no" checked>No
 			
 			<?php
 			} ?>
		</td>
		</tr>
		<tr>
			<td>C.&nbsp;State has or is preparing an explicit asthma program with policies, procedures and resources for schools to manage students with asthma.</td>
			<td><?php 
 			if ($row['QC'] == 'YES')
 			{   ?>
				<input type="radio" name="C" value="yes" checked>Yes 
				<input type="radio" name="C" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="C" value="yes"/>Yes
 			<input type="radio" name="C" value="no" checked>No
 			
 			<?php
 			} ?>
		</td></tr>
		<tr>
			<td>D.&nbsp;State has or is preparing an explicit anaphylaxis program with policies, procedures and resources for schools to manage students with allergies.</td>
			<td><?php 
 			if ($row['QD'] == 'YES')
 			{   ?>
				<input type="radio" name="D" value="yes" checked>Yes 
				<input type="radio" name="D" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="D" value="yes"/>Yes
 			<input type="radio" name="D" value="no" checked>No
 			
 			<?php
 			} ?>
		</td></tr>
		<tr>
			<td>E.&nbsp;State has adopted policy that each school will have one full-time nurse.</td>
			<td><?php 
 			if ($row['QE'] == 'YES')
 			{   ?>
				<input type="radio" name="E" value="yes" checked>Yes 
				<input type="radio" name="E" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="E" value="yes"/>Yes
 			<input type="radio" name="E" value="no" checked>No
 			
 			<?php
 			} ?>
		</td></tr>
		<tr>
			<td>F.&nbsp;State has adopted policy that school districts provide case management for students with chronic health conditions such as asthma.</td>
			<td><?php 
 			if ($row['QF'] == 'YES')
 			{   ?>
				<input type="radio" name="F" value="yes" checked>Yes 
				<input type="radio" name="F" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="F" value="yes"/>Yes
 			<input type="radio" name="F" value="no" checked>No
 			
 			<?php
 			} ?>
		</td></tr>
    			<tr>
    			<td colspan="2"><label><u>Awareness Policies: Core Policy Standards</u></label></td>
    			</tr>
    			<tr>
			<td>13.&nbsp;State recognizes problem of asthma in schools and has begun to address it.</td>
			<td><?php 
 			if ($row['Q13'] == 'YES')
 			{   ?>
				<input type="radio" name="13" value="yes" checked>Yes 
				<input type="radio" name="13" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="13" value="yes"/>Yes
 			<input type="radio" name="13" value="no" checked>No
 			
 			<?php
 			} ?>
		</td>
		</tr>
		<tr>
			<td>14.&nbsp;State recognizes problem of allergy in schools and has begun to address it.</td>
			<td><?php 
 			if ($row['Q14'] == 'YES')
 			{   ?>
				<input type="radio" name="14" value="yes" checked>Yes 
				<input type="radio" name="14" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="14" value="yes"/>Yes
 			<input type="radio" name="14" value="no" checked>No
 			
 			<?php
 			} ?>
		</td>
		</tr>
		<tr><td colspan="2"><label><u>Awareness Policies: Extra Credit Indicators</u></label></td></tr>
		<tr>
			<td>G.&nbsp;State sponsors or provides funding for staff training in asthma awareness covering school asthma program/policy and procedures.</td>
			<td><?php 
 			if ($row['QG'] == 'YES')
 			{   ?>
				<input type="radio" name="G" value="yes" checked>Yes 
				<input type="radio" name="G" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="G" value="yes"/>Yes
 			<input type="radio" name="G" value="no" checked>No
 			
 			<?php
 			} ?>
		</td>
		</tr>
		<tr>
			<td>H.&nbsp;State sponsors or provides funding for staff training in food allergies.</td>
			<td><?php 
 			if ($row['QH'] == 'YES')
 			{   ?>
				<input type="radio" name="H" value="yes" checked>Yes 
				<input type="radio" name="H" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="H" value="yes"/>Yes
 			<input type="radio" name="H" value="no" checked>No
 			
 			<?php
 			} ?>
		</td>
		</tr>
    			<tr><td colspan="2"><label><u>School Environment Policies: Core Policy Standards</u></label></td></tr>
		<td>15.&nbsp;State has mandated that all schools must have Indoor Air Quality (IAQ) management policies.</td>
			<td><?php 
 			if ($row['Q15'] == 'YES')
 			{   ?>
				<input type="radio" name="15" value="yes" checked>Yes 
				<input type="radio" name="15" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="15" value="yes"/>Yes
 			<input type="radio" name="15" value="no" checked>No
 			
 			<?php
 			} ?>
		</td>
		</tr>
		<tr>
			<td>16.&nbsp;State has adopted a policy requiring that districts and schools conduct periodic inspections ofheating, ventilation and air conditioning (HVAC) system &amp; other items important in asthma/allergymanagement.</td>
			<td><?php 
 			if ($row['Q16'] == 'YES')
 			{   ?>
				<input type="radio" name="16" value="yes" checked>Yes 
				<input type="radio" name="16" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="16" value="yes"/>Yes
 			<input type="radio" name="16" value="no" checked>No
 			
 			<?php
 			} ?>
		</td>
		</tr>
		<tr>
			<td>17.&nbsp;State has IAQ policies that include specific components important in asthma/allergy management (HVAC, HEPA, carpeting, pesticide use).</td>
			<td><?php 
 			if ($row['Q17'] == 'YES')
 			{   ?>
				<input type="radio" name="17" value="yes" checked>Yes 
				<input type="radio" name="17" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="17" value="yes"/>Yes
 			<input type="radio" name="17" value="no" checked>No
 			
 			<?php
 			} ?></td>
		</tr>
		<tr>
			<td>18.&nbsp;State recommends/requires that districts or schools use integrated pest management (IPM)techniques OR ban use of pesticides inside school.</td>
			<td><?php 
 			if ($row['Q18'] == 'YES')
 			{   ?>
				<input type="radio" name="18" value="yes" checked>Yes 
				<input type="radio" name="18" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="18" value="yes"/>Yes
 			<input type="radio" name="18" value="no" checked>No
 			
 			<?php
 			} ?></td>
		</tr>
		<tr>
			<td>19.&nbsp;State requires schools to notify parents of upcoming pesticide applications.</td>
			<td><?php 
 			if ($row['Q19'] == 'YES')
 			{   ?>
				<input type="radio" name="19" value="yes" checked>Yes 
				<input type="radio" name="19" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="19" value="yes"/>Yes
 			<input type="radio" name="19" value="no" checked>No
 			
 			<?php
 			} ?></td>
		</tr>
		<tr>
			<td>20.&nbsp;State limits school bus idling time and establishes proximity restrictions.</td>
			<td><?php 
 			if ($row['Q20'] == 'YES')
 			{   ?>
				<input type="radio" name="20" value="yes" checked>Yes 
				<input type="radio" name="20" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="20" value="yes"/>Yes
 			<input type="radio" name="20" value="no" checked>No
 			
 			<?php
 			} ?></td>
		</tr>
		<tr>
			<td>21.&nbsp;All smoking is prohibited in school buildings and on school grounds.</td>
			<td><?php 
 			if ($row['Q21'] == 'YES')
 			{   ?>
				<input type="radio" name="21" value="yes" checked>Yes 
				<input type="radio" name="21" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="21" value="yes"/>Yes
 			<input type="radio" name="21" value="no" checked>No
 			
 			<?php
 			} ?></td>
		</tr>
		<tr>
			<td>22.&nbsp;All smoking is prohibited on school buses and at school-related functions.</td>
			<td><?php 
 			if ($row['Q22'] == 'YES')
 			{   ?>
				<input type="radio" name="22" value="yes" checked>Yes 
				<input type="radio" name="22" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="22" value="yes"/>Yes
 			<input type="radio" name="22" value="no" checked>No
 			
 			<?php
 			} ?></td>
		</tr>
		<tr>
			<td>23.&nbsp;Tobacco use prevention is required in health education curriculum.</td>
			<td><?php 
 			if ($row['Q23'] == 'YES')
 			{   ?>
				<input type="radio" name="23" value="yes" checked>Yes 
				<input type="radio" name="23" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="23" value="yes"/>Yes
 			<input type="radio" name="23" value="no" checked>No
 			
 			<?php
 			} ?></td>
		</tr>	
			<tr><td colspan="2"><label><u>School Environment Policies: Extra Credit Indicators</u></label></td></tr>
		<tr>
			<td>I.&nbsp;State makes funding or resources available for technical IAQ assistance to schools.</td>
			<td><?php 
 			if ($row['QI'] == 'YES')
 			{   ?>
				<input type="radio" name="I" value="yes" checked>Yes 
				<input type="radio" name="I" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="I" value="yes"/>Yes
 			<input type="radio" name="I" value="no" checked>No
 			
 			<?php
 			} ?></td>
		</tr>
		<tr>
			<td>J.&nbsp;State recommends standards and programs to promote environmentally preferable materials for school construction, maintenance and cleaning.</td>
			<td><?php 
 			if ($row['QJ'] == 'YES')
 			{   ?>
				<input type="radio" name="J" value="yes" checked>Yes 
				<input type="radio" name="J" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="J" value="yes"/>Yes
 			<input type="radio" name="J" value="no" checked>No
 			
 			<?php
 			} ?></td>
		</tr>
		<tr>
			<td>K.&nbsp;State requires school facility design standards that include low emission construction materials,pollutant source controls, durable and easy to clean surfaces and floors, moisture/mold controls.</td>
			<td><?php 
 			if ($row['QK'] == 'YES')
 			{   ?>
				<input type="radio" name="K" value="yes" checked>Yes 
				<input type="radio" name="K" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="K" value="yes"/>Yes
 			<input type="radio" name="K" value="no" checked>No
 			
 			<?php
 			} ?></td>
		</tr>
		<tr>
			<td>L.&nbsp;State has implemented or actively promotes diesel school bus engine retrofitting program.</td>
			<td><?php 
 			if ($row['QL'] == 'YES')
 			{   ?>
				<input type="radio" name="L" value="yes" checked>Yes 
				<input type="radio" name="L" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="L" value="yes"/>Yes
 			<input type="radio" name="L" value="no" checked>No
 			
 			<?php
 			} ?></td>
		</tr>
		<tr>
			<td>M.&nbsp;State requires districts or schools to provide tobacco use cessation services to students.</td>
			<td><?php 
 			if ($row['QM'] == 'YES')
 			{   ?>
				<input type="radio" name="M" value="yes" checked>Yes 
				<input type="radio" name="M" value="no" />No
			<?php
			}
			else
			{?>
			<input type="radio" name="M" value="yes"/>Yes
 			<input type="radio" name="M" value="no" checked>No
 			
 			<?php
 			} ?></td>
		</tr>
    			<tr><td colspan="2"><label>Policy Gap</label></td></tr>
		<tr><td colspan="2"><textarea name="policygap" cols="60" rows="2"><?php echo $row['policygap'];?></textarea>
		 <script>
                CKEDITOR.replace( 'policygap' );
            </script>
		
		</td></tr> 
		<tr><td colspan="2"><label>Noteworthy</label></td></tr>
		<tr><td colspan="2"><textarea name="noteworthy" cols="60" rows="10"><?php echo $row['noteworthy']; ?></textarea>
		 <script>
                CKEDITOR.replace( 'noteworthy' );
            </script>
		
		
		</td></tr>
		<tr><td colspan="2"><label>Sources</label></td></tr>
		<tr><td colspan="2"><textarea name="sources" cols="60" rows="3"><?php echo $row['sources'];?></textarea>
		 <script>
                CKEDITOR.replace( 'sources' );
            </script>
		</td></tr>
    		
    			</table>
    
    			</div>	
    				