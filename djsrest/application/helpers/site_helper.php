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

function get_times_array() {

	$times = array(
			"12:00" => "12:00 PM",
			"12:15" => "12:15 PM",
			"12:30" => "12:30 PM",
			"12:45" => "12:45 PM",
			"01:00" => "01:00 PM",
			"01:15" => "01:15 PM",
			"01:30" => "01:30 PM",
			"01:45" => "01:45 PM",
			"02:00" => "02:00 PM",
			"02:15" => "02:15 PM",
			"02:30" => "02:30 PM",
			"02:45" => "02:45 PM",
			"03:00" => "03:00 PM",
			"03:15" => "03:15 PM",
			"03:30" => "03:30 PM",
			"03:45" => "03:45 PM",
			"04:00" => "04:00 PM",
			"04:15" => "04:15 PM",
			"04:30" => "04:30 PM",
			"04:45" => "04:45 PM",
			"05:00" => "05:00 PM",
			"05:15" => "05:15 PM",
			"05:30" => "05:30 PM",
			"05:45" => "05:45 PM",
			"06:00" => "06:00 PM",
			"06:15" => "06:15 PM",
			"06:30" => "06:30 PM",
			"06:45" => "06:45 PM",
			"07:00" => "07:00 PM",
			"07:15" => "07:15 PM",
			"07:30" => "07:30 PM",
			"07:45" => "07:45 PM",
			"08:00" => "08:00 PM",
			"08:15" => "08:15 PM",
			"08:30" => "08:30 PM",
			"08:45" => "08:45 PM");

	return $times;

}

function times_dropdown($elementId, $defaultVal) {
	$times = get_times_array();

	// prints the dropdown
	$output ='';
	$output .= '<select id="' . $elementId . '" class="form-control" name="time">';

	foreach($times as $abbr => $time){
		if ($defaultVal == $abbr) {
			$output .= '<option selected="selected" value="' . $abbr . '">' . $time . '</option>';
		} else {
			$output .= '<option value="' . $abbr . '">' . $time . '</option>';
		}
	}

	$output .= '</select>';
	return $output;
}

function get_party_array() {
	
	$party = array (
			"1" => 1,
			"2" => 2,
			"3" => 3,
			"4" => 4,
			"5" => 5,
			"6" => 6,
			"7" => 7,
			"8" => 8,
			"9" => 9,
			"10" => 10,
			"11" => 11,
			"12" => 12,
			"13" => 13,
			"14" => 14,
			"15" => 15,
			"16" => 16,
			"17" => 17,
			"18" => 18,
			"19" => 19,
			"20" => 20);
	
	return $party;
}

function party_dropdown($elementId, $defaultVal) {
	$party = get_party_array();
	
	// prints the dropdown
	$output ='';
	$output .= '<select id="' . ($elementId + 1) . '" class="form-control" name="party">';
	
	foreach($party as $abbr => $num){
		if ($defaultVal == $abbr) {
			$output .= '<option selected="selected" value="' . $abbr . '">' . $num  . '</option>';
		} else {
			$output .= '<option value="' . $abbr . '">' . $num  . '</option>';
		}
	}
	
	$output .= '</select>';
	return $output;
}
