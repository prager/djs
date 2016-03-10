<?php
class Table_reservation_model extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
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
    
    function set_data($data) {
    	$_SESSION['resdata'] = $data;
    	
    	$recipient = 'jkulisek.us@gmail.com';
    	$subject = 'DJs Table Reservation';
    	$message = "This is the confirmation of your table reservation:\ndate: " . $data['date'] . "\n" . 
      				"Time " . $data['time'] . "\n" .
      				"First Name: " . $data['fname'] . "\n" .
      				"Last Name: " . $data['lname'] . "\n" .
      				"Your email: " . $data['email'] . "\n" .
      				"Party Size: " . $data['party'] . "\n" .
      				"Phone Number: " . $data['phone'] . "\n";
    	
    	$unixtime = (intval(substr($data['time'], 0, 2) + 12) * 60 * 60) + (intval(substr($data['time'], 3, 2)) * 60) + strtotime($data['date']);
    	
    	//echo "res time: " . date("m/d/Y - h:i a", $unixtime);
      	
    	$this->load->helper('email');
    	mail($recipient, $subject, $message);
  		
  		$reserv = array(
  			'reservation_tm' => $data['time'],
  			'reservation_dt' => $data['date'], 			
  			'reservation_unix' => $unixtime,
  			'first_nm' => $data['fname'],
  			'last_nm' => $data['lname'],
  			'email' => $data['email'],
  			'party_size' =>$data['party']);
    	
    	$this->db->insert('reservation_tbl', $reserv);

    }
}

?>