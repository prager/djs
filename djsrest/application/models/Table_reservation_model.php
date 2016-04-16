<?php
class Table_reservation_model extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("America/New_York");
        
        $this->load->database();
    }
/**
 * Retrieves reservations data from session
 * 
 * @return string array
 */    
    function get_data() {
    	$retval['title'] = 'Reservations';
    	
  //check if there are reservation data in session
    	if(isset($_SESSION['resdata'])) {    		
    		$retval['resdata'] = $_SESSION['resdata'];
    	}
    	else {
    		$resdata = array('fname' => "", 'lname' => "", 'email' => "", 
    				'phone' => "", 'party' => 1, 'date' => "", 'time' => 1);
    		$retval['resdata'] = $resdata;
    	}
    	return $retval;
    }
    
 /**
  * Saves the data from table reservations form passed by $data array
  * and sends email to the manager on duty
  * @param array $data
  */   
    function set_data($data) {
    	$_SESSION['resdata'] = $data;
    	$recipient = "";
 //get the manager on duty from user_tbl   	
    	$this->db->select('EMAIL_ADDR');
    	$query = $this->db->get('user_tbl');
    	$this->db->where('ON_DUTY', 1);
    	$row = $query->row();    	
    	if (isset($row)) {
    		$recipient =  $row->EMAIL_ADDR;
    		
    	}
    	
    	$subject = 'DJs Table Reservation';
    	$message = "The following table reservation was made:\nDate: " . $data['date'] . "\n" . 
      				"Time " . $data['time'] . "\n" .
      				"First Name: " . $data['fname'] . "\n" .
      				"Last Name: " . $data['lname'] . "\n" .
      				"Email: " . $data['email'] . "\n" .
      				"Party Size: " . $data['party'] . "\n" .
      				"Phone Number: " . $data['phone'] . "\n";
    	
    	//date_timezone_set(object,timezone);
    	//$date=date_create("2013-05-25",timezone_open("Indian/Kerguelen"));
    	//$date=date_create();
    	//echo date_timestamp_get($date);
    	
    	//date_default_timezone_set("America/New_York");
    	
    	$unixdate = date_timestamp_get(date_create($data['date'], timezone_open("America/New_York")));
    	$unixres = (intval(substr($data['time'], 0, 2) + 12) * 60 * 60) + (intval(substr($data['time'], 3, 2)) * 60) + strtotime($data['date']);
    	    	
    	$retval = TRUE;
    	
    	if(!$this->check_res($unixres, $data['party'])) {
    		$retval = FALSE;
    	}
    	else {      	
	    	$this->load->helper('email');
    		/*$this->load->library('email');
    		$this->email->from('djs_reservations@djs.com', 'DJs Reservations');
    		$this->email->to($recipient);
    		
    		$this->email->subject($subject);
    		$this->email->message($message);
    		$this->email->send();*/
	    	mail($recipient, $subject, $message);
	  		
	  		$reserv = array(
	  			'reservation_tm' => $data['time'],
	  			'reservation_dt' => $data['date'], 			
	  			'reservation_unix' => $unixres,
	  			'first_nm' => $data['fname'],
	  			'last_nm' => $data['lname'],
	  			'email' => $data['email'],
	  			'party_size' =>$data['party']);
	    	
	    	$this->db->insert('RESERVATION_TBL', $reserv);
    	}
		
    	return $retval;
    }
    
    /**
     * Finds whether or not we have valid reservation date and
     * if the restaurant is full
     * @param unknown $unixres
     * @return boolean
     */
 
    function check_res($unixres, $party) {
    	$retval = TRUE;
    	
    	$now = time();
    	
    	if($unixres < $now) {
    		$retval = FALSE;
    	}
    	else {
    	
	    	$this->db->reset_query();
	    	
	    	$this->db->select('*');
	    	$query = $this->db->get('RESERVATION_TBL');
	    	
//find out how many reservations we have -45min and +45min of the current reservation 
//to figure whether or not all reservations are taken, but the below statement doesn't work	
	    	//$where = "RESERVATION_UNIX BETWEEN " . ($unixres - (45 * 60)) . " AND ". ($unixres + (45 * 60)) . "";
			//$this->db->where($where);
			
//then I resort to use of brut force
	    	$total_guests = 0;	    	
			foreach ($query->result() as $row) {
				
				if(($row->RESERVATION_UNIX < ($unixres + (46 * 60))) && ($row->RESERVATION_UNIX > ($unixres - (46 * 60)))) {
					$total_guests += $row->PARTY_SIZE;
				}
			}
			
			if(($total_guests + $party) > 20) {
				$retval = FALSE;
			}
    	}
    	
    	return  $retval;
    }
}

?>