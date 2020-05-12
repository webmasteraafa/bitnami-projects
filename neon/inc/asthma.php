<?php
function get_asthmamanage($data){
		
		switch ($data)
		{
	    	case 'Asthma':
			$neondatafield = '566';
			return $neondatafield;
			break;
			case 'Eczema':
			$neondatafield = '567';
			return $neondatafield;
			break;
			case 'Food Allergies':
			$neaondatafield = '568';
			return $neondatafield;
			break;
			case 'Drug Allergies':
			$neondatafield ='569';
			return $neondatafield;
			break;
			case 'Insect Allergies':
			$neondatafield = '570';
			return $neondatafield;
			break;
			case 'Latex Allergies':
			$neondatafield = '571';
			return $neondatafield;
			break;
			case 'Mold Allergies':
			$neondatafield = '572';
			return $neondatafield;
			break;
			case 'Pollen Allergies':
			$neondataafield = '573';
			return $neondatafield;
            break;
			case 'Other':
			$neondatafiels = '574';
			return $neondatafield;
			break;
			case 'Not Applicable':
 			$neondatafield = '575';
			return $neondatafield;
			break;
			case '':
			$neondatafield = '';
			return $neondatafield;
			break;
		}
}
?>