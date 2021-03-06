<?php


class CHTMLDropDown
{
    var $html = "";
    var $sql = "";
    var $cHandler = "";
    var $openSelect = "<select ";
    var $name = "";
    var $options = array();
    var $sqlKey = "id";
    var $sqlValue = "name";
    var $isSelectedCallback = '';
    var $selectionArray = array();
    var $multiple = FALSE;
    var $isEnabled = TRUE;
    var $size = "";
    var $def = "";

    function CHTMLDropDown( $_sql = "" )
    {
        if( $_sql != "" )
        {
            $this->sql = $_sql;
        }
    }

    // Call to get the completed drop down
    function create()
    {
        if ( $this->html != "" )
        {
            return $this->html;
        }
        $this->doQuery();
        if ( $this->def != "" )
        {
            $defOption = "\t<option value='0'>". $this->def ."</option>";
            $this->options['0'] = $defOption;
        }
        $this->html = $this->openSelect;
        if ( ! $this->isEnabled )
        {
            $this->html .= " disabled ";
        }
        if( $this->name != "")
            $this->html .= " name='" . $this->name . "' ";
        if( $this->cHandler != "")
            $this->html .= " onchange='" . $this->cHandler . "' ";
        if( $this->multiple )
            $this->html .= " multiple size='" . $this->size . "' ";
        $this->html .= ">\r\n";
        ksort( $this->options );
        foreach( $this->options as $option )
            $this->html .= $option;
        $this->html .= "</select>\r\n";
        return $this->html;
    }

    function doQuery()
    {
        $result = mysql_query( $this->sql ) or die( "Error in CHTMLDropDown: " . mysql_error() . " Query: $this->sql " );
        while( $row = mysql_fetch_array( $result ) )
        {
            //if ( $this->isSelectedCallback != '')
            //{
            //    $this->isSelectedCallback();
            //}
           
            $id = $row[ $this->sqlKey ];
            $name = $row[ $this->sqlValue ];
            $selected = in_array( $id, $this->selectionArray );
            $this->addOption( $id, $name, $selected );
        }
    }

    function setDefault( $_def )
    {
        $this->def = $_def;
    }

    function setSelectionArray( $sels )
    {
        if( is_array( $sels ) )
            $this->selectionArray = $sels;
        else
            array_push( $this->selectionArray, $sels );
    }
    
    function setMultiple( $_size = "5" )
    {
        $this->multiple = TRUE;
        $this->size = $_size;
    }

    function setName( $_name )
    {
        $this->name = htmlentities( $_name );
    }

    function setChangeHandler( $_ch )
    {
        $this->cHandler = $_ch;
    }

    function addOption( $value, $text, $selected = FALSE )
    {
        $value = htmlentities( $value );
        $tmp = "\t<option value='$value'";
        if ( $selected )
        {
            $tmp .= " selected ";
        }
        $tmp .= ">$text</option>\r\n";
        $this->options[ $value ] = $tmp;
    }

    function pushOption( $text, $selected = FALSE )
    {
        $max = 0;
        foreach ( $this->options as $key=>$value )
            $max = max( $key, $max );
        $max++; 
        $tmp = "\t<option value='$max'";
        if ( $selected )
        {
            $tmp .= " selected ";
        }
        $tmp .= ">$text</option>\r\n";
        array_push( $this->options, $tmp );
    }


    function setSqlKey( $newkey )
    {
        $this->sqlKey = $newkey;
    }

    function setSqlValue( $newval )
    {
        $this->sqlValue = $newval;
    }
    
    function setIsSelectedCallback( $function )
    {
        $this->isSelectedCallback = $function;
    }

    function setEnabled( $enabled )
    {
        $this->isEnabled = $enabled;
    }

};

function changePassword( $pwd, $userId )
{
       $userid = mysql_real_escape_string ($userid);
	   $pwd = mysql_real_escape_string ($pwd);
	   $salt = "";
       for ( $i = 0; $i < 4; $i = $i + 1 )
       {
               $salt .= chr( rand( 65, 122 ) );
       }
       $newpassword = $pwd . $salt;
       $sql = "update user set password=PASSWORD('$newpassword'), salt='$salt' where id='$userId'";
       mysql_query( $sql ) or die ( "Error updating password: " . mysql_error() );
       return true;
}

function drawStatusDropDown($name,$value, $changeHandler)
{
      $name = mysql_real_escape_string ($name); 
	   echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		echo "<option value=''></option>";
		if ($value == 'pending')
			echo "<option value='pending' selected>Pending</option>";
		else
			echo "<option value='pending'>Pending</option>";
		if ($value == 'active')
			echo "<option value='active' selected>Active</option>";
		else
			echo "<option value='active'>Active</option>";
		if ($value == 'inactive-pending')
			echo "<option value='inactive-pending' selected>Inactive - Pending</option>";
		else
			echo "<option value='inactive-pending'>Inactive - Pending</option>";
		if ($value == 'inactive-former')
			echo "<option value='inactive-former' selected>Inactive - Former Volunteer</option>";
		else
			echo "<option value='inactive-former'>Inactive - Former Volunteer</option>";

	echo "</select>";
}

function drawPositionDropDown($name,$value, $changeHandler)
{
        $name = mysql_real_escape_string ($name);
		echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		echo "<option value=''></option>";
		if ($value == 'senior_com_leader')
			echo "<option value='senior_com_leader' selected>Senior Community Leader</option>";
		else
			echo "<option value='senior_com_leader'>Senior Community Leader</option>";
		if ($value == 'comm_leader')
			echo "<option value='comm_leader' selected>Community Leader</option>";
		else
			echo "<option value='comm_leader'>Community Leader</option>";
		if ($value == 'com_host')
			echo "<option value='com_host' selected>Community Host</option>";
		else
			echo "<option value='com_host'>Community Host</option>";
		if ($value == 'chat_host')
			echo "<option value='chat_host' selected>Chat Host</option>";
		else
			echo "<option value='chat_host'>Chat Host</option>";

		if ($value == 'dev_fundraising_team')
			echo "<option value='dev_fundraising_team' selected>Development/Fundraising Team</option>";
		else
			echo "<option value='dev_fundraising_team'>Development/Fundraising Team</option>";
		if ($value == 'pub_team')
			echo "<option value='pub_team' selected>Publications Team</option>";
		else
			echo "<option value='pub_team'>Publications Team</option>";
		if ($value == 'comm_manager')
			echo "<option value='comm_manager' selected>Community Manager</option>";
		else
			echo "<option value='comm_manager'>Community Manager</option>";
		if ($value == 'director')
			echo "<option value='director' selected>Director</option>";
		else
			echo "<option value='director'>Director</option>";
		if ($value == 'president')
			echo "<option value='president' selected>President</option>";
		else
			echo "<option value='president'>President</option>";
		if ($value == 'treasurer')
			echo "<option value='treasurer' selected>Treasurer</option>";
		else
			echo "<option value='treasurer'>Treasurer</option>";
		if ($value == 'secretary')
			echo "<option value='secretary' selected>Secretary</option>";
		else
			echo "<option value='secretary'>Secretary</option>";
		if ($value == 'dev_director')
			echo "<option value='dev_director' selected>Development Director</option>";
		else
			echo "<option value='dev_director'>Development Director</option>";
		if ($value == 'vice_pres')
			echo "<option value='vice_pres' selected>Vice President</option>";
		else
			echo "<option value='vice_pres'>Vice President</option>";
		if ($value == 'charitable_reg')
			echo "<option value='charitable_reg' selected>Charitable Registration</option>";
		else
			echo "<option value='charitable_reg'>Charitable Registration</option>";
		if ($value == 'administrative')
			echo "<option value='administrative' selected>Administrative</option>";
		else
			echo "<option value='administrative'>Administrative</option>";
		if ($value == 'pub_team_chair')
			echo "<option value='pub_team_chair' selected>Publications Team Chair</option>";
		else
			echo "<option value='pub_team_chair'>Publications Team Chair</option>";
		if ($value == 'pub_team')
			echo "<option value='pub_team' selected>Publications Team</option>";
		else
			echo "<option value='pub_team'>Publications Team</option>";
		if ($value == 'med_adv_teamchair')
			echo "<option value='med_adv_teamchair' selected>Medical Advisory Team Chair</option>";
		else
			echo "<option value='med_adv_teamchair'>Medical Advisory Team Chair</option>";
		if ($value == 'med_adv_team')
			echo "<option value='med_adv_team' selected>Medical Advisory Team</option>";
		else
			echo "<option value='med_adv_team'>Medical Advisory Team</option>";

		if ($value == 'vol_coordinator')
			echo "<option value='vol_coordinator' selected>Volunteer Coordinator</option>";
		else
			echo "<option value='vol_coordinator'>Volunteer Coordinator</option>";
		if ($value == 'grant_writing')
			echo "<option value='grant_writing' selected>Grant Writing</option>";
		else
			echo "<option value='grant_writing'>Grant Writing</option>";
		if ($value == 'recipe_database')
			echo "<option value='recipe_database' selected>Recipe Database</option>";
		else
			echo "<option value='recipe_database'>Recipe Database</option>";

		if ($value == 'other')
			echo "<option value='other' selected>Other</option>";
		else
			echo "<option value='other'>Other</option>";

	echo "</select>";
}

function GetPosition($position)
{
	if ($position == 'senior_com_leader') echo "Senior Community Leader";
	if ($position == 'comm_leader') echo "Community Leader";
	if ($position == 'com_host') echo "Community Host";
	if ($position == 'chat_host') echo "Chat Host";
	if ($position == 'dev_fundraising_team') echo "Development/Fundraising Team";
	if ($position == 'pub_team') echo "Publications Team";
	if ($position == 'comm_manager') echo "Community Manager";
	if ($position == 'director') echo "Director";
	if ($position == 'president') echo "President";
	if ($position == 'treasurer') echo "Treasurer";
	if ($position == 'secretary') echo "Secretary";
	if ($position == 'dev_director') echo "Development Director";
	if ($position == 'vice_pres') echo "Vice President";
	if ($position == 'charitable_reg') echo "Charitable Registration";
	if ($position == 'administrative') echo "Administrative";
	if ($position == 'pub_team_chair') echo "Publications Team Chair";
	if ($position == 'med_adv_teamchair') echo "Medical Advisory Team Chair";
	if ($position == 'vol_coordinator') echo "Volunteer Coordinator";
	if ($position == 'grant_writing') echo "Grant Writing";
	if ($position == 'other') echo "Other";


}


function drawAlertTypeDropDown($name,$value, $changeHandler)
{
       $name = mysql_real_escape_string ($name);
	   echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		echo "<option value=''></option>";
		if ($value == 'aus')
			echo "<option value='aus' selected>Autrailian Alert</option>";
		else
			echo "<option value='aus'>Autrailian Alert</option>";
		if ($value == 'ca')
			echo "<option value='ca' selected>Canadian Alerts</option>";
		else
			echo "<option value='ca'>Canadian Alerts</option>";
		if ($value == 'fa')
			echo "<option value='fa' selected>FDA Alerts</option>";
		else
			echo "<option value='fa'>FDA Alerts</option>";
		if ($value == 'uk')
			echo "<option value='uk' selected>United Kingdom Alerts</option>";
		else
			echo "<option value='uk'>United Kingdom Alerts</option>";
		if ($value == 'kosher')
			echo "<option value='kosher' selected>Kosher Alerts</option>";
		else
			echo "<option value='kosher'>Kosher Alerts</option>";

	echo "</select>";
}

function GetAlertTypeDisplay ($alerttype)
{
	if ($alerttype == 'aus') echo "Austrailian Alert";
	if ($alerttype == 'ca') echo "Canadian Alert";
	if ($alerttype == 'fa') echo "FDA Alert";
	if ($alerttype == 'uk') echo "United Kingdom Alert";
	if ($alerttype == 'kosher') echo "Kosher Alert";
}


function drawTopicDropDown($name,$value, $changeHandler)
{
       $name = mysql_real_escape_string ($name);
	   echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		echo "<option value=''></option>";
		if ($value == 'allergy-friendly')
			echo "<option value='allergy-friendly' selected>Allergy Friendly Food Reports</option>";
		else
			echo "<option value='allergy-friendly'>Allergy Friendly Food Reports</option>";
		if ($value == 'allergy-friendly-new')
			echo "<option value='allergy-friendly-new' selected>Allergy Friendly New Foods</option>";
		else
			echo "<option value='allergy-friendly-new'>Allergy Friendly New Foods</option>";
		if ($value == 'anaphylaxis')
			echo "<option value='anaphylaxis' selected>Anaphylaxis</option>";
		else
			echo "<option value='anaphylaxis'>Anaphylaxis</option>";
		if ($value == 'basics')
			echo "<option value='basics' selected>Basics</option>";
		else
			echo "<option value='basics'>Basics</option>";
		if ($value == 'food-allergens')
			echo "<option value='food-allergens' selected>Food Allergens</option>";
		else
			echo "<option value='food-allergens'>Food Allergens</option>";
		if ($value == 'diagnosis-testing')
			echo "<option value='diagnosis-testing' selected>Diagnosis & Testing</option>";
		else
			echo "<option value='diagnosis-testing'>Diagnosis & Testing</option>";
		if ($value == 'emotional_social')
			echo "<option value='emotional_social' selected>Emotional and Social Issues</option>";
		else
			echo "<option value='emotional_social'>Emotional and Social Issues</option>";
		if ($value == 'food-cooking')
			echo "<option value='food-cooking' selected>Food & Cooking</option>";
		else
			echo "<option value='food-cooking'>Food & Cooking</option>";	

		if ($value == 'managing_allergies')
			echo "<option value='managing_allergies' selected>Managing food allergies</option>";
		else
			echo "<option value='managing_allergies'>Managing Food Allergies</option>";

		if ($value == 'pfood-safety-labeling')
			echo "<option value='pfood-safety-labeling' selected>Product Safety & Labeling</option>";
		else
			echo "<option value='pfood-safety-labeling'>Product Safety & Labeling</option>";
		if ($value == 'gastrointestinal-disorders')
			echo "<option value='gastrointestinal-disorders' selected>Gastrointestinal Disorders</option>";
		else
			echo "<option value='gastrointestinal-disorders'>Gastrointestinal Disorders</option>";
		if ($value == 'holidays')
			echo "<option value='holidays' selected>Holidays</option>";
		else
			echo "<option value='holidays'>Holidays</option>";
		if ($value == 'medication-pharmacy')
			echo "<option value='medication-pharmacy' selected>Medication & Pharmacy</option>";
		else
			echo "<option value='medication-pharmacy'>Medication & Pharmacy</option>";
		if ($value == 'research')
			echo "<option value='research' selected>Research</option>";
		else
			echo "<option value='research'>Research</option>";
		if ($value == 'school-preschool')
			echo "<option value='school-preschool' selected>School & Preschool</option>";
		else
			echo "<option value='school-preschool'>School & Preschool</option>";
		if ($value == 'shopping')
			echo "<option value='shopping' selected>Shopping</option>";
		else
			echo "<option value='shopping'>Shopping</option>";
		if ($value == 'support_group')
			echo "<option value='support_group' selected>Support Group</option>";
		else
			echo "<option value='support_group'>Support Group</option>";
		if ($value == 'travel')
			echo "<option value='travel' selected>Travel & Vacations</option>";
		else
			echo "<option value='travel'>Travel & Vacations</option>";
				if ($value == 'rising-stars')
			echo "<option value='rising-stars' selected>Rising Stars</option>";
		else
			echo "<option value='rising-stars'>Rising Stars</option>";


	echo "</select>";
}

function GetTopic($topic)
{
	if ($topic == 'anaphylaxis') echo "Anaphylaxis";
	if ($topic == 'allergy-friendly') echo "Allergy Friendly Food Reports";
	if ($topic == 'allergy-friendly-new') echo "Allergy Friendly New Foods";
	if ($topic == 'basics') echo "Basics";
	if ($topic == 'food-allergens') echo "Food Allergens";
	if ($topic == 'diagnosis-testing') echo "Diagnosis & Testing";
	if ($topic == 'food-cooking') echo "Food & Cooking";
	if ($topic == 'pfood-safety-labeling') echo "Product Safety & Labeling";
	if ($topic == 'gastrointestinal-disorders') echo "Gastrointestinal Disorders";
	if ($topic == 'holidays') echo "Holidays";
	if ($topic == 'medication-pharmacy') echo "Medication & Pharmacy";
	if ($topic == 'emotional_social') echo "Emotional and Social Issues";
	if ($topic == 'school-preschool') echo "School & Preschool";
	if ($topic == 'shopping') echo "Shopping";
	if ($topic == 'support_group') echo "Support Group";
	if ($topic == 'managing_allergies') echo "Managing Food Allergies";
	if ($topic == 'research') echo "Research";
	if ($topic == 'rising-stars') echo "Rising Stars";
	if ($topic == 'travel') echo "Travel & Vacations";

}
function ShowTopic($topic)
{
	if ($topic == 'anaphylaxis') $topic == "Anaphylaxis";
	if ($topic == 'allergy-friendly') $topic == "Allergy Friendly Food Reports";	
	if ($topic == 'allergy-friendly-new') $topic == "Allergy Friendly New Foods";
	if ($topic == 'basics') $topic == "Basics";
	if ($topic == 'food-allergens') $topic == "Food Allergens";
	if ($topic == 'diagnosis-testing') $topic == "Diagnosis & Testing";
	if ($topic == 'pfood-safety-labeling') $topic == "Product Safety & Labeling";
	if ($topic == 'gastrointestinal-disorders') $topic == "Gastrointestinal Disorders";
	if ($topic == 'holidays') $topic == "Holidays";
	if ($topic == 'medication-pharmacy') $topic == "Medication & Pharmacy";
	if ($topic == 'emotional_social') $topic == "Emotional and Social Issues";
	if ($topic == 'school-preschool') $topic == "School & Preschool";
	if ($topic == 'shopping') $topic == "Shopping";
	if ($topic == 'support_group') $topic == "Support Group";
	if ($topic == 'research') $topic == "Research";
	if ($topic == 'rising-stars') $topic == "Rising Stars";
	if ($topic == 'travel') $topic == "Travel & Vacations";
}




function drawAllStatusDropDown($name,$value, $changeHandler)
{
        $name = mysql_real_escape_string ($name);
		echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		echo "<option value=''></option>";
		if ($value == 'all')
			echo "<option value='all' selected>All</option>";
		else
			echo "<option value='all'>All</option>";

		if ($value == 'pending')
			echo "<option value='pending' selected>Pending</option>";
		else
			echo "<option value='pending'>Pending</option>";
		if ($value == 'active')
			echo "<option value='active' selected>Active</option>";
		else
			echo "<option value='active'>Active</option>";
		if ($value == 'inactive-pending')
			echo "<option value='inactive-pending' selected>Inactive - Pending</option>";
		else
			echo "<option value='inactive-pending'>Inactive - Pending</option>";
		if ($value == 'inactive-former')
			echo "<option value='inactive-former' selected>Inactive - Former Volunteer</option>";
		else
			echo "<option value='inactive-former'>Inactive - Former Volunteer</option>";

	echo "</select>";
}


function drawCurrentDropDown($name,$value, $changeHandler)
{
     $name = mysql_real_escape_string ($name);   
		echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		echo "<option value=''></option>";
		if ($value == 'current')
			echo "<option value='current' selected>Current Tip</option>";
		else
			echo "<option value='current'>Current Tip</option>";

		if ($value == 'old')
			echo "<option value='old' selected>Old Tip</option>";
		else
			echo "<option value='old'>Old Tip</option>";

	echo "</select>";
}







function GetStyle($styleid, $type )
{
	$styleid = mysql_real_escape_string ($styleid);
	$type = mysql_real_escape_string ($type);
	$sql = "select * from style where id='$styleid' and type='$type'";
	$result = mysql_query( $sql ) or die( "Error in query: " . mysql_error() . "  Query: $sql" );
	$row = mysql_fetch_array( $result );
	return $row['style'];

}


function GetWood($woodid, $type )
{
	$woodid = mysql_real_escape_string ($woodid);
	$type = mysql_real_escape_string ($type);
	$sql = "select * from wood_type where id='$woodid' and type='$type'";
	$result = mysql_query( $sql ) or die( "Error in query: " . mysql_error() . "  Query: $sql" );
	$row = mysql_fetch_array( $result );
	return $row['wood'];

}



function drawStyleDropDown($name, $default, $changeHandler, $idSelected, $type )
{
	$name = mysql_real_escape_string ($name);
	$type = mysql_real_escape_string ($type);
	$sql = "select * from style where type='$type'";
	$result = mysql_query( $sql ) or die( "Error in drawStyleDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	if ($idSelected == "")	echo "<option selected value=''></option>";
	while( $row = mysql_fetch_array( $result ) )
	{
        	echo "<option value='" . $row['id'] . "' ";
		if ( $idSelected == $row['id'] )
			echo " selected ";
		echo ">" . $row['style'] . "</option>";
	}
	echo "</select>";
}

function drawWoodDropDown($name, $default, $changeHandler, $idSelected, $type )
{
	$$name = mysql_real_escape_string ($name);
	$type = mysql_real_escape_string ($type);
	sql = "select * from wood_type where type='$type'";
	$result = mysql_query( $sql ) or die( "Error in drawWoodDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	if ($idSelected == "")	echo "<option selected value=''></option>";
	while( $row = mysql_fetch_array( $result ) )
	{
        	echo "<option value='" . $row['id'] . "' ";
		if ( $idSelected == $row['id'] )
			echo " selected ";
		echo ">" . $row['wood'] . "</option>";
	}
	echo "</select>";
}

function drawEdgeDropDown($name, $default, $changeHandler, $idSelected, $type )
{
	$name = mysql_real_escape_string ($name);
	$type = mysql_real_escape_string ($type);
	$sql = "select * from edge where type='$type'";
	$result = mysql_query( $sql ) or die( "Error in drawedgeDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	if ($idSelected == "")	echo "<option selected value=''></option>";
	while( $row = mysql_fetch_array( $result ) )
	{
        	echo "<option value='" . $row['id'] . "' ";
		if ( $idSelected == $row['id'] )
			echo " selected ";
		echo ">" . $row['edge'] . "</option>";
	}
	echo "</select>";
}





function drawStateDropDown($name, $default, $changeHandler, $idSelected )
{
	$name = mysql_real_escape_string ($name);
	
	$sql = "select * from states";
	$result = mysql_query( $sql ) or die( "Error in drawStateDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	echo "<option value='all'>Select a State</option>";
	while( $row = mysql_fetch_array( $result ) )
	{
        	echo "<option value='" . $row['state'] . "' ";
		if ( $idSelected == $row['state'] )
			echo " selected ";
		echo ">" . $row['state'] . "</option>";
	}
	echo "</select>";
}

function drawStateAbbrevDropDown($name, $default, $changeHandler, $idSelected )
{
	$name = mysql_real_escape_string ($name);
	
	$sql = "select * from states";
	$result = mysql_query( $sql ) or die( "Error in drawStateDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	echo "<option value='".$default."'>".$default."</option>";
	while( $row = mysql_fetch_array( $result ) )
	{
        	echo "<option value='" . $row['abbrev'] . "' ";
		if ( $idSelected == $row['abbrev'] )
			echo " selected ";
		echo ">" . $row['abbrev'] . "</option>";
	}
	echo "</select>";
}

function drawCatagoryDropDown($name, $default, $changeHandler, $idSelected, $type )
{
	$name = mysql_real_escape_string ($name);
	$type = mysql_real_escape_string ($type);
	$sql = "select * from catagories where type='$type'";
	$result = mysql_query( $sql ) or die( "Error in drawStateDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	echo "<option value='all'>Select All</option>";
	while( $row = mysql_fetch_array( $result ) )
	{
        	echo "<option value='" . $row['name'] . "' ";
		if ( $idSelected == $row['display_name'] )
			echo " selected ";
		echo ">" . $row['display_name'] . "</option>";
	}
	echo "</select>";
}

function GetService( $service, $type )
{
	$service = mysql_real_escape_string ($service);
	$type = mysql_real_escape_string ($type);
	$sql = "select * from catagories where name='$service' and type='$type'";
	$result = mysql_query( $sql ) or die( "Error in query: " . mysql_error() . "  Query: $sql" );
	$row = mysql_fetch_array( $result );
	return $row['display_name'];

}

function drawCityDropDown($name, $default, $changeHandler, $state )
{
	$name = mysql_real_escape_string ($name);
	$state = mysql_real_escape_string ($state);
	$sql = "select * from citys where state='$state'";
	$result = mysql_query( $sql ) or die( "Error in drawCityDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	echo "<option value='all'>Select All</option>";
	while( $row = mysql_fetch_array( $result ) )
	{
        	echo "<option value='" . $row['city'] . "' ";
		if ( $idSelected == $row['city'] )
			echo " selected ";
		echo ">" . $row['city'] . "</option>";
	}
	echo "</select>";
}

function drawCitynostateDropDown($name, $default, $changeHandler, $idSelected)
{
	$name = mysql_real_escape_string ($name);
	$sql = "select * from citys";
	$result = mysql_query( $sql ) or die( "Error in drawCityDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	echo "<option value='".$default."'>".$default."</option>";
	while( $row = mysql_fetch_array( $result ) )
	{
        	echo "<option value='" . $row['city'] . "' ";
		if ( $idSelected == $row['city'] )
			echo " selected ";
		echo ">" . $row['city'] . "</option>";
	}
	echo "</select>";
}

function drawCountryDropDown($name, $default, $changeHandler, $idSelected )
{
	$name = mysql_real_escape_string ($name);
	$sql = "select country from countries";
	$result = mysql_query( $sql ) or die( "Error in drawCountryDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	echo "<option value='" . $default ."'>" . $default ."</option>";
	while( $row = mysql_fetch_array( $result ) )
	{
        	echo "<option value='" . $row['country'] . "' ";
		if ( $idSelected == $row['country'] )
			echo " selected ";
		echo ">" . $row['country'] . "</option>";
	}
	echo "</select>";
}

function drawAdPageDropDown($name,$value, $changeHandler)
{
        $name = mysql_real_escape_string ($name);
		echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		echo "<option value=''></option>";
		if ($value == 'jobs')
			echo "<option value='jobs' selected>Jobs</option>";
		else
			echo "<option value='jobs'>Jobs</option>";
		if ($value == 'vendor')
			echo "<option value='vendor' selected>Vendor Page 2</option>";
		else
			echo "<option value='vendor'>Vendor Page 2</option>";
		if ($value == 'vendor1')
			echo "<option value='vendor1' selected>Vendor Page 1</option>";
		else
			echo "<option value='vendor1'>Vendor Page 1</option>";
		if ($value == 'proctor')
			echo "<option value='proctor' selected>Proctor</option>";
		else
			echo "<option value='proctor'>Proctor</option>";

	echo "</select>";
}

function drawCatPageDropDown($name,$value, $changeHandler)
{
        $name = mysql_real_escape_string ($name);
		echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		echo "<option value=''></option>";
		if ($value == 'jobs')
			echo "<option value='jobs' selected>Jobs</option>";
		else
			echo "<option value='jobs'>Jobs</option>";
		if ($value == 'vendor')
			echo "<option value='vendor' selected>Vendor</option>";
		else
			echo "<option value='vendor'>Vendor</option>";

	echo "</select>";
}














function editdrawStateDropDown($id, $default, $changeHandler, $idSelected )
{
	$id = mysql_real_escape_string ($id);
	$sql2 = "select courses.title as class, classes.classlevel, classes.startdate, classes.enddate, students.* from students, classes, courses where students.id='$id' and students.classid = classes.id and classes.courseid = courses.id";
	$result2 = mysql_query( $sql2 ) or die( mysql_error() );
	if( mysql_num_rows( $result2 ) > 1 ) die( "Query unexpectedly returned more than one result: " . $sql );
	$row = mysql_fetch_array( $result2 ) or die( mysql_error() );
	
	$sql = "select abbrev from states";
	$result = mysql_query( $sql ) or die( "Error in editdrawStateDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='state' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	echo "<option value='";
	echo $row['state'];
	echo "'>" .$row['state']. "</option>";
	while( $row = mysql_fetch_array( $result ) )
	{
        	echo "<option value='" . $row['abbrev'] . "' ";
		if ( $idSelected == $row['abbrev'] )
			echo " selected ";
		echo ">" . $row['abbrev'] . "</option>";
	}
	echo "</select>";
}

function editdrawCountryDropDown($id, $default, $changeHandler, $idSelected )
{
	$id = mysql_real_escape_string ($id);
	$sql2 = "select courses.title as class, classes.classlevel, classes.startdate, classes.enddate, students.* from students, classes, courses where students.id='$id' and students.classid = classes.id and classes.courseid = courses.id";
	$result2 = mysql_query( $sql2 ) or die( mysql_error() );
	if( mysql_num_rows( $result2 ) > 1 ) die( "Query unexpectedly returned more than one result: " . $sql );
	$row = mysql_fetch_array( $result2 ) or die( mysql_error() );
	
	$sql = "select country from countries";
	$result = mysql_query( $sql ) or die( "Error in editdrawCountryDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='country' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	echo "<option value='";
	echo $row['country'];
	echo "'>" .$row['country']. "</option>";
	while( $row = mysql_fetch_array( $result ) )
	{
        	echo "<option value='" . $row['country'] . "' ";
		if ( $idSelected == $row['country'] )
			echo " selected ";
		echo ">" . $row['country'] . "</option>";
	}
	echo "</select>";
}

function drawLocationDropDown($default, $changeHandler, $idSelected )
{
       $sql = "select id, title, location from locations order by title, location";
		//global $session;
		$result = mysql_query( $sql ) or die( "Error in drawDropDown(): " . mysql_error() . "  Query: $sql" );
		echo "<select name='locationid' size='1' ";
		if ( $changeHandler != "")
			echo " onchange=$changeHandler ";
		echo ">";
		echo "<option value='0'>" . $default ."</option>";
		while( $row = mysql_fetch_array( $result ) )
		{
		    	echo "<option value='" . $row['id'] . "' ";
			if ( $idSelected == $row['id'] )
				echo " selected ";
			echo ">" . $row['title'] . " - " . $row['location'] . "</option>";
		}
		echo "</select>";
}

function drawTrainerDropDown($default, $changeHandler, $idSelected )
{
       $sql = "select id, name, email, phone from trainers order by name";
		//global $session;
		$result = mysql_query( $sql ) or die( "Error in drawDropDown(): " . mysql_error() . "  Query: $sql" );
		echo "<select name='trainerid' size='1' ";
		if ( $changeHandler != "")
			echo " onchange=$changeHandler ";
		echo ">";
		echo "<option value='0'>" . $default ."</option>";
		while( $row = mysql_fetch_array( $result ) )
		{
		    	echo "<option value='" . $row['id'] . "' ";
			if ( $idSelected == $row['id'] )
				echo " selected ";
			echo ">" . $row['name'] . " - " . $row['phone'] . "</option>";
		}
		echo "</select>";
}

function drawContactDropDown($default, $changeHandler, $idSelected )
{
       $sql = "select id, firstname, lastname, ext from salespersons order by lastname";
		//global $session;
		$result = mysql_query( $sql ) or die( "Error in drawDropDown(): " . mysql_error() . "  Query: $sql" );
		echo "<select name='adcontact' size='1' ";
		if ( $changeHandler != "")
			echo " onchange=$changeHandler ";
		echo ">";
		echo "<option value='0'>" . $default ."</option>";
		while( $row = mysql_fetch_array( $result ) )
		{
		    	echo "<option value='" . $row['id'] . "' ";
			if ( $idSelected == $row['id'] )
				echo " selected ";
			echo ">" . $row['firstname'] . " " . $row['lastname'] . "</option>";
		}
		echo "</select>";
}


function drawCourseDropDown( $default, $changeHandler, $idSelected )
{
        $sql = "select id, title from courses order by title";
       drawDropDown( $sql, "courseid", $default, $changeHandler, $idSelected );
}

function drawClassDropDown( $default, $changeHandler, $idSelected )
{
        $sql = "select id, title from classes order by title";
       drawDropDown( $sql, "classid", $default, $changeHandler, $idSelected );
}
function drawradioclasstype($idSelected)
{
    $idSelected = mysql_real_escape_string ($idSelected);
	$sql = "select * from classes where id = $idSelected";
	$result = mysql_query( $sql ) or die( "Error in drawradioclasstype(): " . mysql_error() . "  Query: $sql" );
	$row = mysql_fetch_array( $result );
	$classlevel = getLevel($row['classlevel']);
	if ($classlevel == "Beginning")
	{
		echo "<input class=radio name=classtype value=3 type=radio checked>Computer Forensic Investigation $895.00";
	}
	else if ($classlevel == "Intermediate")
	{
		echo "<input class=radio name=classtype value=1 type=radio checked >Training & Ultimate Toolkit Software Package with USB dongle $1995.00<br>
		 	  <input class=radio name=classtype value=2 type=radio>Training & Ultimate Toolkit Software Package with Parallel dongle $1995.00<br>
			  <input class=radio name=classtype value=0 type=radio>Training with NO Software $1295.00<br>";
	}
	else 
	{
		echo "<input class=radio name=classtype value=4 type=radio checked >Training & Ultimate Toolkit Software Package with USB dongle $2295.00<br>
		 	  <input class=radio name=classtype value=5 type=radio>Training & Ultimate Toolkit Software Package with Parallel dongle $2295.00<br>
			  <input class=radio name=classtype value=6 type=radio>Training with NO Software $1695.00<br>";
	}
}
function drawAvailableClassDropDown( $default, $changeHandler, $idSelected )
{
    
    
    $sql = "select classes.*, locations.location, courses.title as course from classes, locations, courses where classes.locationid = locations.id and classes.id != '1' and classes.courseid = courses.id order by startdate";
	$name = "classid";
	$result = mysql_query( $sql ) or die( "Error in drawAvailableClassDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	//echo "<option value='0'>" . $default ."</option>";
	while( $row = mysql_fetch_array( $result ) )
	{
		if ($row['max'] > $row['current'])
		{
			echo "<option value='" . $row['id'] . "' ";
			if ( $idSelected == $row['id'] )
				echo " selected ";
			echo ">" . $row['course'] . " (" . getLevel($row['classlevel']). ") " . $row['location'] ." - ". getAbbrevDate($row['startdate']). " to " . getAbbrevDate($row['enddate']) . "</option>";
		}
	}
	echo "</select>";
}

function drawAvailableClassinsideDropDown( $default, $changeHandler, $idSelected )
{
    
    
    $sql = "select classes.*, locations.location, courses.title as course from classes, locations, courses where classes.locationid = locations.id and classes.courseid = courses.id order by startdate";
	$name = "classid";
	$result = mysql_query( $sql ) or die( "Error in drawAvailableClassDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	//echo "<option value='0'>" . $default ."</option>";
	while( $row = mysql_fetch_array( $result ) )
	{
		//if ($row['max'] > $row['current'])
		//{
			echo "<option value='" . $row['id'] . "' ";
			if ( $idSelected == $row['id'] )
				echo " selected ";
			echo ">" . $row['course'] . " (" . getLevel($row['classlevel']). ") " . $row['location'] ." - ". getAbbrevDate($row['startdate']). " to " . getAbbrevDate($row['enddate']) . "</option>";
		//}
	}
	echo "</select>";
}

function showclass($default, $changeHandler, $idSelected)
{

$sql = "select classes.*, locations.location, courses.title as course from classes, locations, courses where classes.id = '$idSelected' and classes.locationid = locations.id and classes.courseid = courses.id order by startdate";
$result = mysql_query( $sql ) or die( "Error in drawAvailableClassDropDown(): " . mysql_error() . "  Query: $sql" );
$row = mysql_fetch_array( $result );
echo $row['course'] . " (" . getLevel($row['classlevel']). ") " . $row['location'] ." - ". getAbbrevDate($row['startdate']). " to " . getAbbrevDate($row['enddate']);
		
}

function drawDropDown( $sql, $name, $default, $changeHandler, $idSelected )
{
	//global $session;
	$result = mysql_query( $sql ) or die( "Error in drawDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	echo "<option value='0'>" . $default ."</option>";
	while( $row = mysql_fetch_array( $result ) )
	{
        	echo "<option value='" . $row['id'] . "' ";
		if ( $idSelected == $row['id'] )
			echo " selected ";
		echo ">" . $row['title'] . "</option>";
	}
	echo "</select>";
}


function getUserName( $userId )
{
	$userid = mysql_real_escape_string ($userid);
	$sql = "select login from User where User.id=$userId";
	return getFirstResult( $sql );
}



function gotoLastPageWithMessage( $message, $timeout )
{
	global $session;
	echo "<strong>$message</strong><p> Please wait...";
	echo "<script>
		var page = '" . $session->getVar( "lastPage" ) . "';
		window.setTimeout( 'gotoPage( page )', $timeout );
		</script>";
	include( "htmlfooter.php" );
	exit();
}

function gotoLastPage()
{
	global $session;
	echo "<script>top.location='". $session->getVar( "lastPage" ) . "'</script>";
	include( "htmlfooter.php" );
	exit();
}

function gotoPage($page)
{
	echo "<script>top.location='". $page . "'</script>";
	include( "htmlfooter.php" );
	exit();
}

function getLocationNotAnswered()
{
	return '0';
}

function getCourseNotAnswered()
{
	return '0';
}

function getMonth($month)
{
    if ($month == 1){
    	return "January";
    }else if ($month == 2){
    	return "February";
    }else if ($month == 3){
    	return "March";
    }else if ($month == 4){
    	return "April";
    }else if ($month == 5){
    	return "May";
    }else if ($month == 6){
    	return "June";
    }else if ($month == 7){
    	return "July";
    }else if ($month == 8){
    	return "August";
    }else if ($month == 9){
    	return "September";
    }else if ($month == 10){
    	return "October";
    }else if ($month == 11){
    	return "November";
    }else if ($month == 12){
    	return "December";
    }
}

function getAbbrevMonth($month)
{
    if ($month == 1){
    	return "Jan";
    }else if ($month == 2){
    	return "Feb";
    }else if ($month == 3){
    	return "Mar";
    }else if ($month == 4){
    	return "Apr";
    }else if ($month == 5){
    	return "May";
    }else if ($month == 6){
    	return "Jun";
    }else if ($month == 7){
    	return "Jul";
    }else if ($month == 8){
    	return "Aug";
    }else if ($month == 9){
    	return "Sep";
    }else if ($month == 10){
    	return "Oct";
    }else if ($month == 11){
    	return "Nov";
    }else if ($month == 12){
    	return "Dec";
    }
}

function drawNumericRangeDropDown( $name, $begin, $end, $default, $selected, $prefix )
{
    $name = mysql_real_escape_string ($name);
	$text =  "<select name='". $prefix . $name. "'>";
    if( $default != "" )
        $text .= "<option value='0'> $default </option>";
    for( $i = intval( $begin ); $i <= intval( $end ); $i++ )
    {
        $text .= "<option value='$i'";
        if ( intval( $selected ) == $i )
            $text .= " selected ";
        $text .= " >";
	if ($name == "month")
	    $text.= getMonth($i);
	else
	    $text.=$i;

	$text.="</option>";
    }
    $text .= "</select>";
    echo $text;
}

function drawPhoneNumberWidget($prefix)
{
    echo "(<input class=normal type=text name='". $prefix . "areacode' size=3 maxlength=3 />)
    	  <input class=normal type=text name='". $prefix . "prefix' size=3 maxlength=3 /> -
	  <input class=normal type=text name='". $prefix . "number' size=4 maxlength=4 />";
}
function drawExtensionNumberWidget($prefix)
{
	echo " Ext: <input class=normal type=text name='". $prefix . "extension' size=3 maxlength=3 />";
}
function drawExtensionNumberWidgetFromExtension($prefix,$extension,$changeHandler="")
{
    if ($changeHandler != '')
    	$onchange = "onchange=$changeHandler ";
    echo " Ext: <input class=normal type=text name='". $prefix . "extension' size=3 maxlength=3 value='". $extension."' $onchange/>";
}

function drawPhoneNumberWidgetFromNumber($prefix,$phonenumber,$changeHandler="")
{
    $areacode = substr($phonenumber,1,3);
    $pre = substr($phonenumber,6,3);
    $number = substr($phonenumber,10,4);

    if ($changeHandler != '')
    	$onchange = "onchange=$changeHandler ";

    echo "(<input class=normal type=text name='". $prefix . "areacode' size=2 value='". $areacode. "' maxlength=3 $onchange/>)
	  <input class=normal type=text name='". $prefix . "prefix' size=2 value='". $pre. "' maxlength=3 $onchange/> -
	  <input class=normal type=text name='". $prefix . "number' size=3 value='". $number. "' maxlength=4 $onchange/>";
}

function getAbbrevDate($date)
{
	$day = substr($date,8,2);
	$month = substr($date,5,2);
	return getAbbrevMonth($month) . " ". $day;
}

function getFullDate($date)
{
	$day = substr($date,8,2);
	$month = substr($date,5,2);
	$year = substr($date,0,4);
	return getAbbrevMonth($month) . " ". $day . ", " . $year;
}

function drawDateWidgetToday($prefix)
{
    $today = getdate();
    $mon = intval( $today['mon'] );
    $mday = intval ( $today['mday'] );
    $year = intval ( $today['year'] );
    drawNumericRangeDropDown("month", 1, 12, "Month", $mon, $prefix );
    drawNumericRangeDropDown( "day", 1, 31, "Day", $mday, $prefix );
    drawNumericRangeDropDown( "year", 2002, 2010, "Year", $year, $prefix );
}

function drawDateWidget($month, $day, $year, $prefix)
{
    drawNumericRangeDropDown( "month", 1, 12, "Month", $month, $prefix );
    drawNumericRangeDropDown( "day", 1, 31, "Day", $day, $prefix );
    drawNumericRangeDropDown( "year", 2002, 2010, "Year", $year, $prefix );
}

function drawPaymentMethodDropDown($name,$value, $changeHandler)
{
       $name = mysql_real_escape_string ($name); 
		echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		if ($value == 'Credit Card')
			echo "<option value='Credit Card' selected>Credit Card</option>";
		else
			echo "<option value='Credit Card'>Credit Card</option>";
		if ($value == 'P.O.')
			echo "<option value='P.O.' selected>P.O.</option>";
		else
			echo "<option value='P.O.'>P.O.</option>";
		if ($value == 'Check')
			echo "<option value='Check' selected>Check</option>";
		else
			echo "<option value='Check'>Check</option>";
		if ($value == 'Cash')
			echo "<option value='Cash' selected>Cash</option>";
		else
			echo "<option value='Cash'>Cash</option>";

	echo "</select>";
}


function drawPaymentMethodDropDownInside($name,$value, $changeHandler)
{
      $name = mysql_real_escape_string ($name); 
	   echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		if ($value == 'Credit Card')
			echo "<option value='Credit Card' selected>Credit Card</option>";
		else
			echo "<option value='Credit Card'>Credit Card</option>";
		if ($value == 'P.O.')
			echo "<option value='P.O.' selected>P.O.</option>";
		else
			echo "<option value='P.O.'>P.O.</option>";
		if ($value == 'Check')
			echo "<option value='Check' selected>Check</option>";
		else
			echo "<option value='Check'>Check</option>";
		if ($value == 'Cash')
			echo "<option value='Cash' selected>Cash</option>";
		else
			echo "<option value='Cash'>Cash</option>";
		if ($value == 'S-Comp')
			echo "<option value='S-Comp' selected>S-Comp</option>";
		else
			echo "<option value='S-Comp'>S-Comp</option>";
		if ($value == 'H-Comp')
			echo "<option value='H-Comp' selected>H-Comp</option>";
		else
			echo "<option value='H-Comp'>H-Comp</option>";
		if ($value == 'Resit')
			echo "<option value='Resit' selected>Resit</option>";
		else
			echo "<option value='Resit'>Resit</option>";
		if ($value == 'Internal')
			echo "<option value='Internal' selected>Internal</option>";
		else
			echo "<option value='Internal'>Internal</option>";

	echo "</select>";
}
function drawSoftwareDropDown($name,$value, $changeHandler)
{
       $name = mysql_real_escape_string ($name);
	   echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";

		if ($value == 'None')
			echo "<option value='None' selected>None</option>";
		else
			echo "<option value='None'>None</option>";
		if ($value == 'At Class')
			echo "<option value='At Class' selected>At Class</option>";
		else
			echo "<option value='At Class'>At Class</option>";
		if ($value == 'Ship')
			echo "<option value='Ship' selected>Ship</option>";
		else
			echo "<option value='Ship'>Ship</option>";
	echo "</select>";
}

function drawDongleDropDown($name,$value, $changeHandler)
{
        $name = mysql_real_escape_string ($name);
		echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";

		if ($value == 'None')
			echo "<option value='None' selected>None</option>";
		else
			echo "<option value='None'>None</option>";
		if ($value == 'USB')
			echo "<option value='USB' selected>USB</option>";
		else
			echo "<option value='USB'>USB</option>";
		if ($value == 'Parallel')
			echo "<option value='Parallel' selected>Parallel</option>";
		else
			echo "<option value='Parallel'>Parallel</option>";

	echo "</select>";
}

function drawCodeTypeDropDown($name,$value, $changeHandler)
{
        $name = mysql_real_escape_string ($name);
		echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		echo "<option value=''></option>";
		if ($value == 'price')
			echo "<option value='price' selected>Price</option>";
		else
			echo "<option value='price'>Price</option>";
		if ($value == 'discount')
			echo "<option value='discount' selected>Discount</option>";
		else
			echo "<option value='discount'>Discount</option>";
		if ($value == 'percentage')
			echo "<option value='percentage' selected>Percentage</option>";
		else
			echo "<option value='percentage'>Percentage</option>";

	echo "</select>";
}

function drawCodeAreaDropDown($name, $idSelected, $changeHandler)
{
	$name = mysql_real_escape_string ($name);
	$sql = "select * from reseller_areas order by area";
	$result = mysql_query( $sql ) or die( "Error in drawDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	echo "<option value='0'>" . $default ."</option>";
	while( $row = mysql_fetch_array( $result ) )
	{
        	echo "<option value='" . $row['id'] . "' ";
		if ( $idSelected == $row['id'] )
			echo " selected ";
		echo ">" . $row['area'] . "</option>";
	}
	echo "</select>";
}

function drawCodeCountryDropDown($name, $idSelected, $changeHandler)
{
	$name = mysql_real_escape_string ($name);
	$sql = "select * from reseller_countries order by country";
	$result = mysql_query( $sql ) or die( "Error in drawDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	echo "<option value='0'>" . $default ."</option>";
	while( $row = mysql_fetch_array( $result ) )
	{
        	echo "<option value='" . $row['id'] . "' ";
		if ( $idSelected == $row['id'] )
			echo " selected ";
		echo ">" . $row['country'] . "</option>";
	}
	echo "</select>";
}

function drawShirtSizeDropDown($name,$value,$changeHandler)
{
       $name = mysql_real_escape_string ($name);
	   echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		if ($value == 'S')
			echo "<option value='S' selected>S</option>";
		else
			echo "<option value='S'>S</option>";
		if ($value == 'M')
			echo "<option value='M' selected>M</option>";
		else
			echo "<option value='M'>M</option>";
		if ($value == 'L')
			echo "<option value='L' selected>L</option>";
		else
			echo "<option value='L'>L</option>";
		if ($value == 'XL')
			echo "<option value='XL' selected>XL</option>";
		else
			echo "<option value='XL'>XL</option>";
		if ($value == 'XXL')
			echo "<option value='XXL' selected>XXL</option>";
		else
			echo "<option value='XXL'>XXL</option>";
		if ($value == 'XXXL')
			echo "<option value='XXXL' selected>XXXL</option>";
		else
			echo "<option value='XXXL'>XXXL</option>";
	echo "</select>";
}
function drawAnnualRevDropDown($name,$value,$changeHandler)
{
	$name = mysql_real_escape_string ($name);
	
        echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		if ($value == '$0 - $250,000')
			echo "<option value='$0 - $250,000' selected>$0 - $250,000</option>";
		else
			echo "<option value='$0 - $250,000'>$0 - $250,000</option>";
		if ($value == '$250,000 - $500,000')
			echo "<option value='$250,000 - $500,000' selected>$250,000 - $500,000</option>";
		else
			echo "<option value='$250,000 - $500,000'>$250,000 - $500,000</option>";
		if ($value == '$500,000 - 1 million')
			echo "<option value='$500,000 - 1 million' selected>$500,000 - 1 million</option>";
		else
			echo "<option value='$500,000 - 1 million'>$500,000 - 1 million</option>";
		if ($value == '1 million - 5 million')
			echo "<option value='1 million - 5 million' selected>1 million - 5 million</option>";
		else
			echo "<option value='1 million - 5 million'>1 million - 5 million</option>";
		if ($value == 'over 5 million')
			echo "<option value='over 5 million' selected>over 5 million</option>";
		else
			echo "<option value='over 5 million'>over 5 million</option>";
	echo "</select>";
}



function getRowClass($num){
	if ($num%2 == 0)
		return "light";
	else
		return "dark";
}

function drawSalespersonDropDown($name, $idSelected, $changeHandler)
{
	$name = mysql_real_escape_string ($name);
	$sql = "select * from salespersons";
	$result = mysql_query( $sql ) or die( "Error in drawDropDown(): " . mysql_error() . "  Query: $sql" );
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
	echo "<option value='0'>" . $default ."</option>";
	while( $row = mysql_fetch_array( $result ) )
	{
        	echo "<option value='" . $row['id'] . "' ";
		if ( $idSelected == $row['id'] )
			echo " selected ";
		echo ">" . $row['firstname'] . " " . $row['lastname']. "</option>";
	}
	echo "</select>";
}

function drawSortByDropDown($name, $selected, $changeHandler)
{
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		echo "<option value=''></option>";
		if ($selected == 'startdate')
			echo "<option value='startdate' selected>Date</option>";
		else
			echo "<option value='startdate'>Date</option>";
		if ($selected == 'location')
			echo "<option value='location' selected>Location</option>";
		else
			echo "<option value='location'>Location</option>";
		if ($selected == 'course')
			echo "<option value='course' selected>Course</option>";
		else
			echo "<option value='course'>Course</option>";
		if ($selected == 'classlevel')
			echo "<option value='classlevel' selected>Level</option>";
		else
			echo "<option value='classlevel'>Level</option>";
	echo "</select>";
}

function drawSortByResellerDropDown($name, $selected, $changeHandler)
{
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		echo "<option value=''></option>";
		if ($selected == 'name1')
			echo "<option value='name1' selected>Company Name</option>";
		else
			echo "<option value='name1'>Company Name</option>";
		if ($selected == 'area')
			echo "<option value='area' selected>Area</option>";
		else
			echo "<option value='area'>Area</option>";
		if ($selected == 'country')
			echo "<option value='country' selected>Country</option>";
		else
			echo "<option value='country'>Country</option>";
	echo "</select>";
}

function drawSortByDropDownsales($name, $selected, $changeHandler)
{
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		echo "<option value=''></option>";
		if ($selected == 'state')
			echo "<option value='state' selected>State</option>";
		else
			echo "<option value='state'>State</option>";
		if ($selected == 'salespersonid')
			echo "<option value='salespersonid' selected>Sales Person</option>";
		else
			echo "<option value='salespersonid'>Sales Person</option>";
		
	echo "</select>";
}

function drawSortByDropDowncountry($name, $selected, $changeHandler)
{
	echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		echo "<option value=''></option>";
		if ($selected == 'country')
			echo "<option value='country' selected>country</option>";
		else
			echo "<option value='country'>country</option>";
		if ($selected == 'salespersonid')
			echo "<option value='salespersonid' selected>Sales Person</option>";
		else
			echo "<option value='salespersonid'>Sales Person</option>";
		
	echo "</select>";
}

function getarea($id)
{
	$id = mysql_real_escape_string ($id);
	$sql = "select * from reseller_areas where id='$id'";
	$result = mysql_query( $sql ) or die( "Error in query: " . mysql_error() . "  Query: $sql" );
	$row = mysql_fetch_array( $result );
	return $row['area'];
}
function getcountry($id)
{
	$id = mysql_real_escape_string ($id);
	$sql = "select * from reseller_countries where id='$id'";
	$result = mysql_query( $sql ) or die( "Error in query: " . mysql_error() . "  Query: $sql" );
	$row = mysql_fetch_array( $result );
	return $row['country'];
}


function getSalespersonExt($id)
{
	$id = mysql_real_escape_string ($id);
	$sql = "select * from salespersons where id='$id'";
	$result = mysql_query( $sql ) or die( "Error in query: " . mysql_error() . "  Query: $sql" );
	$row = mysql_fetch_array( $result );
	return $row['ext'];
}

function getSalespersonTitle($id)
{
	$id = mysql_real_escape_string ($id);
	$sql = "select * from salespersons where id='$id'";
	$result = mysql_query( $sql ) or die( "Error in query: " . mysql_error() . "  Query: $sql" );
	$row = mysql_fetch_array( $result );
	return $row['title'];
}

function getSalespersonName($id)
{
	$id = mysql_real_escape_string ($id);
	$sql = "select * from salespersons where id='$id'";
	$result = mysql_query( $sql ) or die( "Error in query: " . mysql_error() . "  Query: $sql" );
	$row = mysql_fetch_array( $result );
	$salespersonName = $row['firstname'] . " " . $row['lastname'];
	return $salespersonName;
}

function getSalespersonEmail($id)
{
	$id = mysql_real_escape_string ($id);
	$sql = "select * from salespersons where id='$id'";
	$result = mysql_query( $sql ) or die( "Error in query: " . mysql_error() . "  Query: $sql" );
	$row = mysql_fetch_array( $result );
	return $row['email'];
}

function getSalespersonId($abbrev, $code)
{
	$code = mysql_real_escape_string ($code);
	$sql = "select * from salespersons where code='$code'";
	$result = mysql_query( $sql ) or die ( "Error finding code: " . mysql_error() . " Query: $sql " );
	if (mysql_num_rows( $result ) > 0)
	{
		$row = mysql_fetch_array( $result );
		return $row['id'];
	}

	if ($abbrev == "")
		$abbrev = "IC";//this is the international code
		$abbrev = mysql_real_escape_string ($abbrev);
	$sql = "select * from states where abbrev='$abbrev'";
	$result = mysql_query( $sql ) or die( "Error finding state: " . mysql_error() . " Query: $sql " );
	$row = mysql_fetch_array( $result );
	return $row['salespersonid'];

}

function getSalespersonIdcountry($country)
{
	$country = mysql_real_escape_string ($country);
	$sql = "select * from countries where country='$country'";
	$result = mysql_query( $sql ) or die( "Error finding country: " . mysql_error() . " Query: $sql " );
	$row = mysql_fetch_array( $result );
	return $row['salespersonid'];

}


function drawClassLevelDropDown($name, $value, $changeHandler)
{
        echo "<select name='$name' size='1' ";
	if ( $changeHandler != "")
		echo " onchange=$changeHandler ";
	echo ">";
		if ($value == 'BEG')
			echo "<option value='BEG' selected>" . getLevel('BEG') . "</option>";
		else
			echo "<option value='BEG'>" . getLevel('BEG') . "</option>";
		if ($value == 'INT')
			echo "<option value='INT' selected>" . getLevel('INT') . "</option>";
		else
			echo "<option value='INT'>" . getLevel('INT') . "</option>";
		if ($value == 'ADV')
			echo "<option value='ADV' selected>" . getLevel('ADV') . "</option>";
		else
			echo "<option value='ADV'>" . getLevel('ADV') . "</option>";
	echo "</select>";
}

function getCellpadding()
{
	return "cellpadding=5";
}

function getWidth()
{
	return "width='50%'";
}

function getLevel($level)
{
	if ($level == 'INT')
		return "Intermediate";
	else if ($level == 'ADV')
		return "Advanced";
	else
		return "Beginning";

}

function getCourseTitle($courseid)
{
	$courseid = mysql_real_escape_string ($courseid);
	$sql = "select * from courses where id='$courseid'";
	$result = mysql_query( $sql ) or die( "Error in query: " . mysql_error() . "  Query: $sql" );
	$row = mysql_fetch_array( $result );
	return $row['title'];
}

function getLocation($locationid)
{
	$locationid = mysql_real_escape_string ($locationid);
	$sql = "select * from locations where id='$locationid'";
	$result = mysql_query( $sql ) or die( "Error in query: " . mysql_error() . "  Query: $sql" );
	$row = mysql_fetch_array( $result );
	return $row['location'];
}
function getTrainername($trainerid)
{
	$trainerid = mysql_real_escape_string ($trainerid);
	$sql = "select * from trainers where id='$trainerid'";
	$result = mysql_query( $sql ) or die( "Error in query: " . mysql_error() . "  Query: $sql" );
	$row = mysql_fetch_array( $result );
	return $row['name'];
}
function getTrainerphone($trainerid)
{
	$trainerid = mysql_real_escape_string ($trainerid);
	$sql = "select * from trainers where id='$trainerid'";
	$result = mysql_query( $sql ) or die( "Error in query: " . mysql_error() . "  Query: $sql" );
	$row = mysql_fetch_array( $result );
	return $row['phone'];
}
function getTraineremail($trainerid)
{
	$trainerid = mysql_real_escape_string ($trainerid);
	$sql = "select * from trainers where id='$trainerid'";
	$result = mysql_query( $sql ) or die( "Error in query: " . mysql_error() . "  Query: $sql" );
	$row = mysql_fetch_array( $result );
	return $row['email'];
}
?>