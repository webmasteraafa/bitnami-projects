<?php
function check_selections_aafa($data)
{
	echo $data;
	switch ($$data) 
	{
		case 'Asthma':
		$data = '566';
		return $data;
		break;
		case 'Eczema':
		$data = '567';
		return $data;
		break;
		case 'Food Allergies':
		$data = '568';
		return $data;
		break;
		case 'Drug Allergies':
		$data = '569';
		return $data;
		break;
		case 'Insect Allergies':
		$data = '570';
		return $data;
		break;
		case 'Latex Allergies':
		$data = '571';
		return $data;
		break;
		case 'Mold Allergies':
		$data = '572';
		return $data;
		break;
		case 'Pollen Allergies':
		$data = '573';
		return $data;
		break;
		case 'Other':
		$data = '574';
		return $data;
		break;
		case 'Not Applicable':
		$data = '567';
		return $data;
		break;
	}
}
?>