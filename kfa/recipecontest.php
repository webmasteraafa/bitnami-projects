<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recipe Contest Details</title>
<link href="/js/main.css" rel="stylesheet" type="text/css" />
</head>

<body>

<body bgcolor="#FFFFFF">
<table width="185" border="0">
<tr>
	<td width="185" class="style12">

   <!--  Enter Newsfeed here -->

<?php



  // Global variables for function use.
  $GLOBALS['title'] = false;
  $GLOBALS['link']  = false;
  $GLOBALS['description'] = false;
  $GLOBALS['titletext'] = null;
  $GLOBALS['linktext'] = null;
  $GLOBALS['desctext'] = null;
  $GLOBALS['trashthis'] = true;
  $GLOBALS['count'] = 0;
  // function: startElement
  // Deals with the starting element
  function startElement( $parser, $tagName, $attrs ) {
    // By setting global variable of tag name
    // I can determine which tag I am currently
    // parsing.
    switch( $tagName ) {
      case 'TITLE':
        $GLOBALS['title'] = true;
        break;
      case 'LINK':
        $GLOBALS['link'] = true;
        break;
      case 'DESCRIPTION':
        $GLOBALS['description'] = true;
        break;
    }
  }
  // function: endElement
  // Deals with the ending element
  function endElement( $parser, $tagName ) {
    // By noticing the closing tag,
    // I can print out the data that I want.
    switch( $tagName ) {
      case 'TITLE':
        //echo "<b>". $GLOBALS['titletext'] ."</b><br/>";
        $GLOBALS['title'] = false;
       // $GLOBALS['titletext'] = "";
        break;
      case 'LINK':
      
	//		$GLOBALS['trashthis'] = false;
	//		$GLOBALS['link'] = false;
     //       $GLOBALS['linktext'] = "";
	//	    $GLOBALS['titletext'] = "";
	//		echo ""
	
		echo "<a href=\"" . $GLOBALS['linktext'] . "\">" . $GLOBALS['titletext'] . "</a><br/>";
		$GLOBALS['link'] = false;
        $GLOBALS['linktext'] = "";
		$GLOBALS['titletext'] = "";
	
        break;
      case 'DESCRIPTION':
     

		echo "" . $GLOBALS['desctext'] . "<br/><p>&nbsp;";
        $GLOBALS['description'] = false;
        $GLOBALS['desctext'] = "";
  		break;
    }
  }
  // function: charElement
  // Deals with the character elements (text)
  function charElement( $parser, $text ) {
    // Verify the tag that text belongs to.
    // I set the global tag name to true
    // when I am in that tag.
    if( $GLOBALS['title'] == true ) {
        $GLOBALS['titletext'] .= htmlspecialchars( trim($text) );
    } else if( $GLOBALS['link'] == true ) {
        $GLOBALS['linktext']  .= trim( $text );
    } else if( $GLOBALS['description'] == true ) {
        $GLOBALS['desctext'] .= htmlspecialchars( trim( $text ) );
    }
  }
  // Create an xml parser
  $xmlParser = xml_parser_create();
  // Set up element handler
  xml_set_element_handler( $xmlParser, "startElement", "endElement" );
  // Set up character handler
  xml_set_character_data_handler( $xmlParser, "charElement" );
  // Open connection to RSS XML file for parsing.
  $fp = fopen( "http://www.kidswithfoodallergies.org/ironchefrss.xml", "r" )
    or die( "Cannot read RSS data file." );
  // Parse XML data from RSS file.
 // while( $data = fread( $fp, 4096 )) {
   $data = fread( $fp, 4096);
    xml_parse( $xmlParser, $data, feof( $fp ) );
 //}
  // Close file open handler
  fclose( $fp );
  // Free xml parser from memory
  xml_parser_free( $xmlParser );
?>
<!--End Newsfeed--></span>	</td>
</tr>
</table>
</body>
</html>
