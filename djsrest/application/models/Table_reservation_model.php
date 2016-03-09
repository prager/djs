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
      				"Party Size: " . $data['party'] . "\n" .
      				"Phone Number: " . $data['phone'] . "\n";
    	
      	
    	$this->load->helper('email');
    	mail($recipient, $subject, $message);
  		
  		//$reserv = array(
  			//'reservation_tm' => $data['time'], 			
  			
  		//);
    	
    	//$this->db->insert('messages', $ins);

    }
}

?>