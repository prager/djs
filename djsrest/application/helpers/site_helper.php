<?php
// function for all states dropdown menu 
function states_dropdown($elementId, $defaultVal) {
	$states = array(
			"Alabama" => "AL",
			"Alaska" => "AK",
			"Arizona" => "AZ",
			"Arkansas" => "AR",
			"California" => "CA",
			"Colorado" => "CO",
			"Connecticut" => "CT",
			"Delaware" => "DE",
			"Florida" => "FL",
			"Georgia" => "GA",
			"Hawaii" => "HI",
			"Idaho" => "ID",
			"Illinois" => "IL",
			"Indiana" => "IN",
			"Iowa" => "IA",
			"Kansas" => "KS",
			"Kentucky" => "KY",
			"Louisiana" => "LA",
			"Maine" => "ME",
			"Maryland" => "MD",
			"Massachusetts" => "MA",
			"Michigan" => "MI",
			"Minnesota" => "MN",
			"Mississippi" => "MS",
			"Missouri" => "MO",
			"Montana" => "MT",
			"Nebraska" => "NE",
			"Nevada" => "NV",
			"New Hampshire" => "NH",
			"New Jersey" => "NJ",
			"New Mexico" => "NM",
			"New York" => "NY",
			"North Carolina" => "NC",
			"North Dakota" => "ND",
			"Ohio" => "OH",
			"Oklahoma" => "OK",
			"Oregon" => "OR",
			"Pennsylvania" => "PA",
			"Rhode Island" => "RI",
			"South Carolina" => "SC",
			"South Dakota" => "SD",
			"Tennessee" => "TN",
			"Texas" => "TX",
			"Utah" => "UT",
			"Vermont" => "VT",
			"Virginia" => "VA",
			"Washington" => "WA",
			"West Virginia" => "WV",
			"Wisconsin" => "WI",
			"Wyoming" => "WY",
			"American Samoa" => "AS",
			"District of Columbia" => "DC",
			"Federated States of Micronesia" => "FM",
			"Guam" => "GU",
			"Marshall Islands" => "MH",
			"Northern Mariana Islands" => "MP",
			"Palau" => "PW",
			"Puerto Rico" => "PR",
			"Virgin Islands" => "VI"
	);
	// prints the error message
	$output ='';
	$output .= '<span style="color: red;">';
	$output .= form_error('state');
	$output .= '</span>';
	
	// prints the dropdown
	$output .= '<select id="' . $elementId . '" class="form-control" name="state">';
	$output .= '<option value="" disabled selected>Select State</option>';
	
	foreach($states as $name => $abbr){
		if ($defaultVal == $abbr) {
			$output .= '<option selected="selected" value="' . $abbr . '">' . $name . '</option>';
		} else {
			$output .= '<option value="' . $abbr . '">' . $name . '</option>';
		}
	}
	
	$output .= '</select>';
	return $output;
}