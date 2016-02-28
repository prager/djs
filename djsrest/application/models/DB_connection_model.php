<?php
class DB_connection_model extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
    
    function connect_local() {
    
    	$config['hostname'] = 'localhost';
    	$config['username'] = 'root';
    	$config['password'] = '';
    	$config['database'] = 'djs_db';
    	$config['dbdriver'] = 'mysqli';
    	$config['dbprefix'] = '';
    	$config['pconnect'] = FALSE;
    	$config['db_debug'] = TRUE;
    	$config['cache_on'] = FALSE;
    	$config['cachedir'] = '';
    	$config['char_set'] = 'utf8';
    	$config['dbcollat'] = 'utf8_general_ci';
    	$this->load->database($config);
    
    }
    
    function connect_remote() {
    
    	$config['hostname'] = 'db609649024.db.1and1.com';
    	$config['username'] = 'dbo609649024';
    	$config['password'] = 'djsproj1';
    	$config['database'] = 'db609649024';
    	$config['dbdriver'] = 'mysqli';
    	$config['dbprefix'] = '';
    	$config['pconnect'] = FALSE;
    	$config['db_debug'] = TRUE;
    	$config['cache_on'] = FALSE;
    	$config['cachedir'] = '';
    	$config['char_set'] = 'utf8';
    	$config['dbcollat'] = 'utf8_general_ci';
    	$this->load->database($config);
    
    }
    
    function db_close() {
    	$this->db->close();
    }

}

?>