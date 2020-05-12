<?php
	include("htmlheader.php");
	include("common.php");
	include("config.php");
	$username = $_REQUEST['username'];
	$date = date("Y-m-d");


?>
<html>
<body>
<?
	

		$sql = "select * from independent where username='$username'";
		$result = mysql_query( $sql ) or die( mysql_error() );

		if( mysql_num_rows( $result ) > 1 ) die( "Query unexpectedly returned more than one result: " . $sql );

		$row = mysql_fetch_array( $result ) or die( mysql_error() );

?>

<script>
function checkRequired(myform, vals) {
	for (i=0; i< vals.length; i++) {
		if (myform.elements[vals[i]].value == "") {
			alert("The " + myform.elements[vals[i]].name + " field is required. Please fill out all required fields and try again.");
			myform.elements[vals[i]].focus()
			return false;
		}
	}
	return true;
}

function validate() {
	if (!checkRequired(document.MainForm, new Array('name', 'date', 'position', 'email'))) {
		return false;
	}

	return true;
}

function MM_openBrWindow(theURL,winName,features) { //v2.0  
	window.open(theURL,winName,features);
  return false;
}
</script>

</head>


<body>

<table border="0" width="600" cellspacing="3" cellpadding="3">
  <tr>
    <td width="100%">
      <p align="center"><b>Confidentiality and Conflict of Interest Agreement</b></p>
      <p align="left"><b>I.	Confidentiality</b><br>
      <br>
      I acknowledge the importance of confidentiality with respect to information that may be entrusted to me in my role, and in Kids With Food Allergies, Inc.’s (KFA) business in general. I understand the importance of maintaining all such information, and any and all discussions, in strict confidence. I agree to keep confidential, during and after service, all organizational information acquired in the course of my association with KFA.

<br>
      <br>
      This commitment to confidentiality includes, but is not limited to:</p>
      <ol>
        <li>
          <p align="left">Obtaining only information needed to carry out the duties and responsibilities of my position and not communicating information to anyone who does not need it for the same purpose.</li>
        <li>
          <p align="left">Information about the strategic plan, programs, and processes such as message board operations.</li>
        <li>
          <p align="left">Financial information including budgets, revenues, expenses, and any other information about the organization’s financial condition.</li>
        <li>
          <p align="left">Performance of volunteers, employees or contracted help, including evaluations, compensation, contract and employment conditions, and management succession plans.</li>
        <li>
          <p align="left">Information about members, (including the membership and donor databases and other personally identifiable information about members or donors)&nbsp;</li>
        <li>
          <p align="left">Confidentiality obligations includes protecting the security of communications between KWFA and its volunteers in any form, including email and proprietary message board messages, as well as password and/or any other information that grants you access to confidential content.&nbsp;</li>
      </ol>
      <p align="left"><b>II.	Conflict of Interest</b><br>
      <br>
      I acknowledge the importance of avoiding any conflict of interest between the interests of the KFA on one hand, and personal, professional, and business interests on the other. This includes avoiding actual conflicts of interest as well as perceptions of conflicts of interest. I understand that the purposes of avoiding conflict of interest is to protect the integrity of the decision making process for KFA, to enable our stakeholders to have confidence in our integrity, and to protect the integrity and reputation of volunteers, employees, independent contractors, staff and board members. 
&nbsp;<br>
      <br>
      <br>
      I pledge:</p>
      <ol>
        <li>
          <p align="left">To disclose to the Board of Directors any possible conflict of interest and update it as appropriate. (Complete addendum)</li>
        <li>
          <p align="left">To refrain from using my position, or knowledge gained from that position, in a manner that might conflict with KWFA’s interests or for my profit or advantage.</li>
        <li>
          <p align="left">To decline inappropriate gifts, favors or excessive hospitality intended or which could be perceived to be intended to influence decisions affecting
          KWFA.</li>
        <li>
          <p align="left">In the course of meetings or activities, I will disclose any interests in a transaction or decision where I (including my business or other nonprofit affiliation), my family and/or my significant other, employer, or close associates will receive a benefit or gain.  To absent myself from discussion (as appropriate) and from acting or voting on matters where a conflict of interest exists.</li>
      </ol>
      <p align="left"><b>III.        Background Check</b></p>
      <ol>
        <li>
          <p align="left">I ascertain that I have not been convicted of, found guilty of, pled guilty, or nolo contendre to, or been incarcerated within the last 10 years as a result of previously having been convicted of, or found guilty of, or pled guilty or nolo contendre to, any felony, or crime involving fraud, theft, larceny, embezzlement, fraudulent conversion, misappropriation of property, or any crime arising from the conduct of a solicitation for a charitable organization or sponsor within the last 10 years.&nbsp;</li>
        <li>
          <p align="left">I further ascertain that I have never been enjoined from violating any law relating to a charitable  solicitation.</li>
        <li>
          <p align="left">I understand that Kids With Food Allergies, Inc. may conduct a background check depending upon the type of volunteer responsibilities delegated to me.&nbsp;</li>
      </ol>
      <p align="left"><b>IV.          Ownership of Property</b><br>
      <br>
      After my independent contractor work is completed, I will be required to return any and all documents, records, data, notebooks, notes, reports, contact lists, proposals, lists, correspondence, specifications, drawings, materials, equipment, other documents or property, or reproductions of any aforementioned items created or in my possession regarding Kids With Food Allergies, Inc.
</p>

      <p align="left"><b>V.          Implications</b><br>
      <br>
      I understand that false responses or breaches of this agreement could harm a team member or member of KFA or compromise the interests of Kids With Food Allergies, Inc. I understand that any such breach on my part may result in:
</p>
      <ol>
        <li>
          <p align="left">Cancelation of contract.</li>
        <li>
          <p align="left">Other appropriate action</li>
      </ol>
      <p align="left">I acknowledge that that I have read and understand this Agreement.</p>
      <form method="POST" action="create_statement.php" name="MainForm" id="MainForm" onSubmit="return validate()">
	<input type="hidden" name="formname" value="Volunteer Statment">
	<input type="hidden" name="inid" value="<? echo $row['id']; ?>">
	<input type="hidden" name="date" value="<? echo $date; ?>">
	<input type="hidden" name="first_name" value="<? echo $first_name; ?>">
	<input type="hidden" name="last_name" value="<? echo $last_name; ?>">


        <table border="0" width="100%">
          <tr>
            <td width="35%">
              <p align="right">Name:</td>
            <td width="65%">
	<? echo $row['first_name'] . " " . $row['last_name'];?>
		</td>
          </tr>
          <tr>
            <td width="35%">
              <p align="right">Email Address:</td>
            <td width="65%">	<? echo $row['email'];?>
</td>
          </tr>
          <tr>
            <td width="35%">
              <p align="right">			Date:</td>
            <td width="65%"><? echo $date;?>
</td>
          </tr>
          <tr>
            <td width="35%" height="50" valign="bottom">
              <p align="right">			Signature:</td>
            <td width="65%" height="50" valign="bottom">_________________________________________</td>
          </tr>
          <tr>
            <td width="35%">
              <p align="right">			Position*:&nbsp;</td>
            <td width="65%">
			<?	echo drawInPositionDropDown("position", "", ""); ?>
</td>
          </tr>
        </table>
        <p align="left"><b>Addendum:</b><br>
        <br>
        The following is a full and written disclosure of interests, relationships, and holdings that could potentially result in a conflict of interest regarding my role and responsibilities as a Board member or Committee member of Kids With Food Allergies, Inc.<br>
        <br>
        Duality or Interest and/or Conflict of Interest:</p>
        <p align="left"><textarea rows="8" name="conflict_interest" cols="65"></textarea>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <p align="left">Please print before you press submit. By pressing submit
        you agree to all the above statements.</p>
        <p align="left"><input type="submit" value="Submit" name="B1"><input type="reset" value="Reset" name="B2"></p>
      </form>
      <p align="left">Please send printed form to:<br>
&nbsp;&nbsp;&nbsp;&nbsp;Kids With Food Allergies, Inc.<br>
&nbsp;&nbsp;&nbsp;&nbsp;73 Old Dublin Pike, Ste. 10, #163<br>
&nbsp;&nbsp;&nbsp;&nbsp;Doylestown, PA 18901<br>      <br>
      Updated 11/29/2006</td>
  </tr>
</table>

<?php

	include("htmlfooter.php");	

?>

</body>

</html>
