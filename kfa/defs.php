<?php
if (! connect_me()) {
  include("database_down.php");
  exit();
}

function validateinput($inputvar){
	$inputvar = str_replace("<", "&lt;", $inputvar);
	$inputvar = str_replace(">", "&gt;", $inputvar);
	$inputvar = str_replace("\'", "&apos;", $inputvar);
	$inputvar = str_replace("\"", "&#x22;", $inputvar);
	$inputvar = str_replace(")", "&#x29;", $inputvar);
	$inputvar = str_replace("(", "&#x28;", $inputvar);
	$inputvar = str_replace("%3E", "&gt;", $inputvar);
	$inputvar = str_replace("%22", "&#x22;", $inputvar);
	$inputvar = str_replace("%3C", "&lt;", $inputvar);
	$inputvar = str_replace("%28", "&#x28;", $inputvar);
	$inputvar = str_replace("%29", "&#x29;", $inputvar);
  	return $inputvar;
}

/* connect to the database and return the connection resource */
function connect_me() {
  $conn = @mysql_connect("www.kidswithfoodallergies.org:3306", 
    "kidswitror_rcp", "allergenfree");
  $retval = @mysql_select_db("kidswitror_eve");
  return $retval;
}

/* a function to determine if a user has opted in to searches */
function has_opted_in() {
  $user_oid = get_user_oid();
  if ($user_oid == "")
    return false;
  $query = "select count(*) from SEARCH_USERS where USER_OID = $user_oid";
  $result = mysql_query($query);
  $row = mysql_fetch_row($result);
  $count = $row[0];
  if ($count < 1) {
    return false;
  } else {
    return true;
  }
}
/* a function to determine if the logged-in user is an administrator */
function is_fam() {
  /* get the current user_oid */
  $user_oid = get_user_oid();
  if ($user_oid == "")
    return false;
  /* the follow group ID is considered to be the admin group */
  $KWFAfam = '3780052503';
  $KWFAAdmin = '7880084762';

  $query = "SELECT count(*) FROM IP_GROUP_USERS WHERE USER_OID = $user_oid AND (GROUP_OID = $KWFAfam  OR GROUP_OID = $KWFAAdmin ) ";
  echo "<!-- query: $query -->\n";
  $result = mysql_query($query);
  $row = mysql_fetch_array($result);
  if (($row['count(*)'] == 1) || ($user_oid == '3780052503') || ($user_oid == '7080063073')){
    return true;
  } else {
    return false;
  }
}

/* a function to determine if the logged-in user is an administrator */
function is_admin() {
  /* get the current user_oid */
  $user_oid = get_user_oid();
  if ($user_oid == "")
    return false;
  /* the follow group ID is considered to be the admin group */
  $KWFAAdmin = '7880084762';

  $query = "SELECT count(*) FROM IP_GROUP_USERS WHERE USER_OID = $user_oid AND GROUP_OID = $KWFAAdmin";
  echo "<!-- query: $query -->\n";
  $result = mysql_query($query);
  $row = mysql_fetch_array($result);
  if (($row['count(*)'] == 1) || ($user_oid == '7080063073')){
    return true;
  } else {
    return false;
  }
}

/* returns age, in years, given a birthdate in YYYY-MM-DD format */
function get_age($datestring) {
  connect_me();
  $query = "SELECT (TO_DAYS(NOW()) - TO_DAYS('$datestring')) / 365.242199";
  $stmt = mysql_query($query);
  $row = mysql_fetch_row($stmt);
  $age = floor(floatval($row[0]));
  return $age;
}

/* a function to get the USER_OID from the cookie/session info */
function get_user_oid() {
  if (isset($_COOKIE['site_2400067262'])) {
    $site_cookie = $_COOKIE['site_2400067262'];
    list($u,$md5p,$user_oid,$pref_datetime,$perms_datetime,$pl) = explode("&", $site_cookie);
    $oid_arr = split("=", $user_oid);
    $u_oid = $oid_arr[1];
  }
  return $u_oid;
}


/* return html-formated rows, including TR tags, of data matching a user, 
 * given a USER_OID.  Second argument tells whether to format it for admin use.
 */
function get_user_row($USER_OID, $admin, $class) {
  /* get a list of all users awaiting approval, display them for approval */
$query = "SELECT 
LOGIN, 
DISPLAY_NAME,
blurb
FROM SEARCH_USERS, IP_USERS
WHERE IP_USERS.USER_OID = $USER_OID AND
SEARCH_USERS.USER_OID = IP_USERS.USER_OID";

 $result = mysql_query($query);
 if (! $result) {
   return "";
 } else {
   
   while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
     $email = $row["LOGIN"];
     $blurb = $row["blurb"];
     $name = $row["DISPLAY_NAME"];

     $childquery = "select * from SEARCH_CHILDREN where USER_OID = $USER_OID";
     $childresult = mysql_query($childquery);
     $count = mysql_num_rows($childresult);

     if ($count < 1) {
       echo "<!-- user found with no children.  This shouldn't happen. -->\n";
       $count = 1;
     }

     echo "  <tr class='$class' valign='top'>\n";
     echo "    <td valign='top' >";
     echo "<a href='http://kidswithfoodallergies.org/groupee?a=ptpc&u=$USER_OID'
       target='_blank'>$name</a></td>\n";
     echo "    <td valign='top' >$blurb</td>\n";
     $colspan = 1 + $extra_cols;
     echo "    <td colspan='$colspan'>\n";
     $lastchild = mysql_num_rows($childresult);
     $childnum = 0;
     while ($childrow = mysql_fetch_array($childresult, MYSQL_ASSOC)) {
       $childnum++;
       $age = get_age($childrow["birthdate"]);
       $id = $childrow["id"];
       echo "Age $age:&nbsp;&nbsp;&nbsp;\n";
       $allergyquery = "select * from SEARCH_CHILD_ALLERGIES where id = $id";
       $allergyresult = mysql_query($allergyquery);
       $count = mysql_num_rows($allergyresult);
       $html = "";
       while ($allergyrow = mysql_fetch_array($allergyresult, MYSQL_ASSOC)) {
	 $allergen = ucwords(strtolower($allergyrow["allergen"]));
	 $desc = ucwords(strtolower($allergyrow["desc"]));
	 $html .= $allergen;
	 if ($desc != "") {
	   $html .= " ($desc)";
	 }
	 $html .= ", ";
       }
       $html = rtrim($html, ", ");
       if ($html == "")
         $html = "No allergies listed.";
       echo $html . "\n";
       if ($childnum < $lastchild)
         echo "<br><br>\n";
     } // finished with children for this user
     echo "    </td>\n";
     if ($admin) {
       // standard email-sending buttons
       echo "    <td align='center' valign='top'>
         <form style='margin-bottom:0px' action='admin.php' method='POST'>
         <input type='hidden' name='do_email' value='true'>
         <input type='hidden' name='approve_user' value='$USER_OID'>
         <input type='submit' value='Approve' class='search-submit'>
         </form>
         <form style='margin-bottom:0px' action='admin.php' method='POST'>
         <input type='hidden' name='do_email' value='true'>
         <input type='hidden' name='deny_user' value='$USER_OID'>
         <input type='submit' value='Deny' class='search-submit'>
         </form></td>";
       // non-emailing buttons
       echo "    <td align='center' valign='top'>
         <form style='margin-bottom:0px' action='admin.php' method='POST'>
         <input type='hidden' name='approve_user' value='$USER_OID'>
         <input type='submit' value='Approve' class='search-submit'>
         </form>
         <form style='margin-bottom:0px' action='admin.php' method='POST'>
         <input type='hidden' name='deny_user' value='$USER_OID'>
         <input type='submit' value='Deny' class='search-submit'>
         </form></td>";
     }
     if (!$admin && is_admin()) {
        echo "    <td valign='top'>
        <form style='marg-bottom:0px' action='remove_user.php' method='post'>
        <input type='hidden' name='login' value='$email'>
        <input class='search-submit' type='submit' value='Remove'>
        </form></td>";
     }
     echo "  </tr>\n";
   } // finished with user
 }
}

/* admin function definitions */

/* a function to display a status message */
function status($message) {
  echo "<div class='status'>$message</div>\n";
}

/* function to approve a user given a USER_OID and display the result */
function approve_user($USER_OID, $do_email) {
  $query = "SELECT DISPLAY_NAME, LOGIN
    FROM IP_USERS
    WHERE USER_OID = $USER_OID";
  $result = mysql_query($query);
  $row = mysql_fetch_array($result, MYSQL_ASSOC);
  $name = $row["DISPLAY_NAME"];
  $email = $row["LOGIN"];

  $query = "UPDATE SEARCH_USERS SET approved = 1 WHERE USER_OID = $USER_OID";
  $result = mysql_query($query);

  if ($result) {
    if ($do_email) {
      // send the user an email letting them know they have been approved
      $message = wordwrap(get_user_approve_msg());
      $header = "From: " . get_from_addr() . "\r\n";

//      mail($email, "Your KWFA profile has been approved", $message, $header);
echo "Would have emailed:<pre>
$header
To: $email
Subject: Your KWFA group listing has been approved
$message</pre>\n";
      status("User '$name' ($email) has been approved and notified.");
    } else {
      status("User '$name' ($email) has been approved and NOT notified.");
    }
  } else {
    $error = mysql_error();
    status("There was an error approving user '$name' ($email):<br>$error");
  }
}

/* function to approve a group given a group name and display the result */
function approve_group($group_id, $do_email) {
  $query = "SELECT name, email FROM SEARCH_GROUPS WHERE id = $group_id";
  $result = mysql_query($query);
  $row = mysql_fetch_row($result);
  $group_name = $row[0];
  $email = $row[1];
  $query = "UPDATE SEARCH_GROUPS SET approved = 1 WHERE id = '$group_id'";
  $result = mysql_query($query);
  if ($result) {
    if ($do_email) {
      // send the group owner an email letting them know they have been approved
      $message = wordwrap(get_group_approve_msg());
      $header = "From: " . get_from_addr() . "\r\n";
/*
      mail($email, "Your KWFA group listing has been approved", $message, 
        $header);
*/
echo "Would have emailed:<pre>
$header
To: $email
Subject: Your KWFA group listing has been approved
$message</pre>\n";
      status("Group '$group_name' has been approved, and the owner notified.");
    } else {
      status("Group '$group_name' has been approved, and the owner 
        NOT notified");
    }
  } else {
    $error = mysql_error();
    status("There was an error approving group '$group_name':<br>$error");
  }
}

/* a function to deny a user's approval-- this will remove them from
 * the SEARCH_USERS table, delete any children of the user in SEARCH_CHILDREN,
 * and any allergy rows from SEARCH_CHILDREN_ALLERGIES associated with that
 * USER_OID
 */
function deny_user($USER_OID, $do_email) {
  $status_msg = "";
  $query = "SELECT DISPLAY_NAME, LOGIN
    FROM IP_USERS
    WHERE USER_OID = $USER_OID";
  $result = mysql_query($query);
  $row = mysql_fetch_array($result, MYSQL_ASSOC);
  $name = $row["DISPLAY_NAME"];
  $email = $row["LOGIN"];

  if (! mysql_query("DELETE FROM SEARCH_USERS WHERE USER_OID = $USER_OID")) {
    $status_msg .= "Couldn't delete from SEARCH_USERS table<br>\n";
  }
  if (! mysql_query("DELETE FROM SEARCH_CHILDREN WHERE USER_OID = $USER_OID")) {
    $status_msg .= "Couldn't delete from SEARCH_CHILDREN table<br>\n";
  }
  if (! mysql_query("DELETE FROM SEARCH_CHILD_ALLERGIES WHERE USER_OID = $USER_OID")) {
    $status_msg .= "Couldn't delete from SEARCH_CHILD_ALLERGIES table<br>\n";
  }

  if ($status_msg == "") {
    if ($do_email) {
      // send the group owner an email letting them know they have been approved
      $message = wordwrap(get_user_deny_msg());
      $header = "From: " . get_from_addr() . "\r\n";
/*
      mail($email, "Your KWFA profile has been denied", $message,
        $header);
*/
echo "Would have emailed:<pre>
$header
To: $email
Subject: Your KWFA profile has been denied
$message</pre>\n";
      status("User '$name' ($email) has been denied and notified.");
    } else {
      status("User '$name' ($email) has been denied and NOT notified.");
    }
  } else {
    status("There was an error denying user '$name' ($email):<br>$status_msg");
  }
}

/* a function to deny a group's approval-- this will remove the group from
 * the SEARCH_GROUPS table
 */
function deny_group($group_id, $do_email) {
  // get the name of the group being axed
  $result = mysql_query("SELECT name, email FROM SEARCH_GROUPS WHERE id = $group_id");
  $row = mysql_fetch_row($result);
  $group_name = $row[0];
  $email = $row[1];
  $result = mysql_query("DELETE FROM SEARCH_GROUPS WHERE id = '$group_id'");

  if ($result) {
    if ($do_email) {
      // send the group owner an email letting them know they have been approved
      $message = wordwrap(get_user_deny_msg());
      $header = "From: " . get_from_addr() . "\r\n";
/*
      mail($email, "Your KWFA group listing has been denied", $message,
        $header);
*/
echo "Would have emailed:<pre>
$header
To: $email
Subject: Your KWFA group listing has been denied
$message</pre>\n";
      status("Group '$group_name' has been denied, and the owner notified.");
    } else {
      status("Group '$group_name' has been denied, and the owner 
        NOT notified.");
    }
  } else {
    status("There was an error denying group '$group_name':<br>$error");
  }
}

/* a function to add a new allergen to the database */
function add_allergy($allergy) {
  $allergy_escaped = strtoupper(mysql_real_escape_string($allergy));
  // make sure it doesn't already exist in the database
  $query = "SELECT COUNT(*) FROM SEARCH_ALLERGIES
    WHERE upper(allergen) = '$allergy_escaped'";
  $result = mysql_query($query);
  $row = mysql_fetch_row($result);
  $count = $row[0];
  if ($count != 0) {
    status("'$allergy' already exists in the database.");
  } else {
    $query = "INSERT INTO SEARCH_ALLERGIES (id, allergen) VALUES ( NULL, '$allergy_escaped')";
    $result = mysql_query($query);
    if ($result) {
      status("'$allergy' successfully added.");
    } else {
      $error = mysql_error();
      status("Error adding '$allergy':<br>$error");
    }
  }
}

/* a function to remove a given allergy from SEARCH_ALLERGIES */
function remove_allergy($allergy_id) {
  // make sure it exists in the database
  $query = "SELECT COUNT(*), allergen FROM SEARCH_ALLERGIES
    WHERE id = $allergy_id
    GROUP BY allergen";
  $result = mysql_query($query);
  $row = mysql_fetch_row($result);
  $count = $row[0];
  $allergy = $row[1];
  if ($count == 0) {
    status("'$allergy_id' doesn't exist in the database (this shouldn't happen).");
  } else {
    $query = "DELETE FROM SEARCH_ALLERGIES WHERE id = $allergy_id";
    echo "<!-- $query -->\n";
    $result = mysql_query($query);
    if ($result) {
      status("'$allergy' successfully removed.");
    } else {
      $error = mysql_error();
      status("Error removing '$allergy':<br>$error");
    }
  }
}

/* a function to remove a given user and all associated profiles */ 
function remove_user($user_oid) {
  $status_msg = "";
  $query = "SELECT DISPLAY_NAME, LOGIN
    FROM IP_USERS
    WHERE USER_OID = $user_oid";
  echo "<!-- removing user $user_oid -->\n";
  $result = mysql_query($query);
  $row = mysql_fetch_array($result, MYSQL_ASSOC);
  $name = $row["DISPLAY_NAME"];
  $email = $row["LOGIN"];

  if (! mysql_query("DELETE FROM SEARCH_USERS WHERE USER_OID = $user_oid")) {
    $status_msg .= "Couldn't delete from SEARCH_USERS table<br>\n";
  }
  if (! mysql_query("DELETE FROM SEARCH_CHILDREN WHERE USER_OID = $user_oid")) {
    $status_msg .= "Couldn't delete from SEARCH_CHILDREN table<br>\n";
  }
  if (! mysql_query("DELETE FROM SEARCH_CHILD_ALLERGIES WHERE USER_OID = $user_oid")) {
    $status_msg .= "Couldn't delete from SEARCH_CHILD_ALLERGIES table<br>\n";
  }

  if ($status_msg == "") {
    status("User '$name' ($email) has been removed from searches.");
  } else {
    status("There was an error removing user '$name' ($email):<br>$status_msg");
  }
}

/* a function to remove a group by group ID */
function remove_group($group_id) {
  // get the name of the group for display purposes
  $result = mysql_query("SELECT name FROM SEARCH_GROUPS WHERE id = $group_id");
  $row = mysql_fetch_row($result);
  $group_name = $row[0];
  $result = mysql_query("DELETE FROM SEARCH_GROUPS WHERE id = $group_id");
  if ($result) {
    status("Group '$group_name' has been removed.");
  } else {
    $error = mysql_error();
    status("There was an error removing group '$group_name':<br>$error");
  }
}

/* a function to print out a form for result paging.
 * $page is the page to jump to,
 * $button_text is what gets put on the submit button
 */
function page_jump_form($page, $button_text) {
  // make it html-safe
  $button_text = htmlentities($button_text);

  echo "<form style='margin-bottom:0' ";
  echo "action='search_results.php' method='post'>\n";

  // the important bit:  change the pagenum to $page
  echo "<input type='hidden' name='pagenum' value='$page'>\n";

  // everything else
  foreach ($_POST as $name => $var) {
    $var = htmlentities($var);
    if ($name != 'pagenum')
      echo "<input type='hidden' name='$name' value='$var'>\n";
  }

  // change the submit button's text
  echo "<input class='search-submit' type='submit' value='$button_text'>\n";
  echo "</form>\n";
}

/* a function to get the "user approved" message */
function get_user_approve_msg() {
  $query = "SELECT user_allow_msg FROM SEARCH_CONFIG LIMIT 1";
  $stmt = mysql_query($query);
  $row = mysql_fetch_row($stmt);
  $msg = $row[0];
  return htmlentities($msg);
}

/* a function to put the "user approved" message */
function set_user_approve_msg($message) {
  if (get_magic_quotes_gpc())
    $message = stripslashes($message);
  $message = mysql_real_escape_string($message);
  $query = "UPDATE SEARCH_CONFIG SET user_allow_msg = '$message'";
  $result = mysql_query($query);
  if ($result)
    status("Successfully updated user approval message");
  else
    status("There was an error setting the user approval message:  " 
      . mysql_error());
}

/* a function to get the "user denied" message */
function get_user_deny_msg() {
  $query = "SELECT user_deny_msg FROM SEARCH_CONFIG LIMIT 1";
  $stmt = mysql_query($query);
  $row = mysql_fetch_row($stmt);
  $msg = $row[0];
  return htmlentities($msg);
}

/* a function to put the "user denied" message */
function set_user_deny_msg($message) {
  if (get_magic_quotes_gpc())
    $message = stripslashes($message);
  $message = mysql_real_escape_string($message);
  $query = "UPDATE SEARCH_CONFIG SET user_deny_msg = '$message'";
  $result = mysql_query($query);
  if ($result)
    status("Successfully updated user denial message");
  else
    status("There was an error setting the user denial message:  "
      . mysql_error());
}

/* a function to get the "group denied" message */
function get_group_deny_msg() {
  $query = "SELECT group_deny_msg FROM SEARCH_CONFIG LIMIT 1";
  $stmt = mysql_query($query);
  $row = mysql_fetch_row($stmt);
  $msg = $row[0];
  return htmlentities($msg);
}

/* a function to put the "user denied" message */
function set_group_deny_msg($message) {
  if (get_magic_quotes_gpc())
    $message = stripslashes($message);
  $message = mysql_real_escape_string($message);
  $query = "UPDATE SEARCH_CONFIG SET group_deny_msg = '$message'";
  $result = mysql_query($query);
  if ($result)
    status("Successfully updated group denial message");
  else
    status("There was an error setting the group denial message:  "
      . mysql_error());
}

/* a function to get the "group approved" message */
function get_group_approve_msg() {
  $query = "SELECT group_allow_msg FROM SEARCH_CONFIG LIMIT 1";
  $stmt = mysql_query($query);
  $row = mysql_fetch_row($stmt);
  $msg = $row[0];
  return htmlentities($msg);
}

/* a function to put the "group approved" message */
function set_group_approve_msg($message) {
  if (get_magic_quotes_gpc())
    $message = stripslashes($message);
  $message = mysql_real_escape_string($message);
  $query = "UPDATE SEARCH_CONFIG SET group_allow_msg = '$message'";
  $result = mysql_query($query);
  if ($result)
    status("Successfully updated group approval message");
  else
    status("There was an error setting the group approval message:  "
      . mysql_error());
}

/* a general-purpose source for the "From:" address for emails */
function get_from_addr() {
  return "admin@kidswithfoodallergies.org";
}

/* a function to get the "blurb" for a given OID */
function get_blurb($oid) {
  $query = "select blurb from SEARCH_USERS where USER_OID = $oid";
  $result = mysql_query($query);
  $row = mysql_fetch_row($result);
  $blurb = $row[0];
  $blurb = htmlentities($blurb);
  return $blurb;
}

/* a function to put the blurb for a given OID */
function set_blurb($oid, $blurb) {
  if (get_magic_quotes_gpc())
    $blurb = stripslashes($blurb);
  $blurb = mysql_real_escape_string($blurb);
  $query = "update SEARCH_USERS set blurb = '$blurb' where USER_OID = $oid";
  $result = mysql_query($query);
  if ($result)
    status("Your profile has been updated.");
  else
    status("There was a problem updating your profile.  Please try again later.");
}

?>
