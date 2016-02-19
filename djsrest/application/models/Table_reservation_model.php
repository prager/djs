<?php
class Table_reservation_model extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
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
    	/*$_SESSION['resdata'] = $data;
    	
    	$recipient = 'jkulisek.us@gmail.com';
    	$subject = 'DJs Table Reservation';
    	$message = "This is the confirmation of your table reservation:\n date: " . $data['date'] . "\n" . 
      				"time: " . $data['time'];
    	
      	//echo "Result: " . $recipient . "\n" . "subject: " . $subject;
    	//$this->load->helper('email');
    	//mail($recipient, $subject, $message);*/
    	send_email('jkulisek.us@gmail.com','djs message', 'test subject', 'message test text');
    	
 //will add db manipulation routines

    }
}

?>