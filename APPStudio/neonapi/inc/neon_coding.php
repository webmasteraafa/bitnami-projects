<?php

function check_playgroup_data($data)
{
	switch ($data)
	{
		case 'Yes, I want to know about playgroups in my area':
		$data = '204';
		break;
		case 'No':
		$data = '205';
		break;
		case '':
		$data ='0';
		break;
		
	}
}
function check_subscribe_data($data)
{
	switch ($data)
	{
		case 'Yes':
		$data = '156';
		break;
		case 'No':
		$data = '157';
		break;
		case '':
		$data ='0';
		break;
		
	}
}
function check_diagnosed_data($data)
{
	switch ($data)
	{
		case 'Yes':
		$data = '193';
		break;
		case 'No':
		$data = '194';
		break;
		case '':
		$data ='0';
		break;
		
	}
}
?>