<?php
// function for all states dropdown menu 
function states_dropdown($elementId, $defaultVal) {
	$states = get_states_array();
	// prints the error message
	$output ='';
	$output .= '<span style="color: red;">';
	$output .= form_error('state');
	$output .= '</span>';
	
	// prints the dropdown
	$output .= '<select id="' . $elementId . '" class="form-control" name="state">';
	$output .= '<option value="" disabled selected>Select State</option>';
	
	foreach($states as $abbr => $name){
		if ($defaultVal == $abbr) {
			$output .= '<option selected="selected" value="' . $abbr . '">' . $name . '</option>';
		} else {
			$output .= '<option value="' . $abbr . '">' . $name . '</option>';
		}
	}
	
	$output .= '</select>';
	return $output;
}

function get_states_array() {
	$states = array(
					"AL" => "Alabama",
					"AK" => "Alaska",
					"AZ" => "Arizona",
					"AR" => "Arkansas",
					"CA" => "California",
					"CO" => "Colorado",
					"CT" => "Connecticut",
					"DE" => "Delaware",
					"FL" => "Florida",
					"GA" => "Georgia",
					"HI" => "Hawaii",
					"ID" => "Idaho",
					"IL" => "Illinois",
					"IN" => "Indiana",
					"IA" => "Iowa",
					"KS" => "Kansas",
					"KY" => "Kentucky",
					"LA" => "Louisiana",
					"ME" => "Maine",
					"MD" => "Maryland",
					"MA" => "Massachusetts",
					"MI" => "Michigan",
					"MN" => "Minnesota",
					"MS" => "Mississippi",
					"MO" => "Missouri",
					"MT" => "Montana",
					"NE" => "Nebraska",
					"NV" => "Nevada",
					"NH" => "New Hampshire",
					"NJ" => "New Jersey",
					"NM" => "New Mexico",
					"NY" => "New York",
					"NC" => "North Carolina",
					"ND" => "North Dakota",
					"OH" => "Ohio",
					"OK" => "Oklahoma",
					"OR" => "Oregon",
					"PA" => "Pennsylvania",
					"RI" => "Rhode Island",
					"SC" => "South Carolina",
					"SD" => "South Dakota",
					"TN" => "Tennessee",
					"TX" => "Texas",
					"UT" => "Utah",
					"VT" => "Vermont",
					"VA" => "Virginia",
					"WA" => "Washington",
					"WV" => "West Virginia",
					"WI" => "Wisconsin",
					"WY" => "Wyoming",
					"AS" => "American Samoa",
					"DC" => "District of Columbia",
					"FM" => "Federated States of Micronesia",
					"GU" => "Guam",
					"MH" => "Marshall Islands",
					"MP" => "Northern Mariana Islands",
					"PW" => "Palau",
					"PR" => "Puerto Rico",
					"VI" => "Virgin Islands"
	);
	
	return $states;
}