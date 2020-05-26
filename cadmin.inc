<?
 require_once 'iuser.inc';

 class CAdmin extends IUser {

   var $group = 'admin';
   var $username;
   var $password;
  
   function CAdmin($username, $password) {
	$this->username = $username;
	$this->password = $password;
   }

   /*** Check if admin exist */
   function check() {
	global $go_conn;

	$params = array($this->username, $this->password);
	$result = $go_conn->Execute(ADMIN_SELECT_SQL, $params);
	if ($result) { if ($result->RecordCount() > 0) return true;
	  else return false;
	} else {
	    trigger_error($go_conn->ErrorMsg());
	    return false;
	}
   }

   /*** Store login session for current admin */
   function login() {
     	if (empty($this->username) || empty($this->password)) return false;
     	if (!$this->check()) return false;
		$_SESSION['username'] = $this->username;
     	$_SESSION['password'] = $this->password;
		$_SESSION['group'] = $this->group;
     	return true;
   }

   /*** Logout session for current admin */
   function logout() {
     	session_destroy();
     	$_SESSION = array();
     	$this->username = '';
     	$this->password = '';
     	return true;
   }

   /*** Add a admin to the admin's list */
   function store() {
	global $go_conn;
		
	if (!$this->check()) {
  	  $params = array($this->username, $this->password);
	  $result = $go_conn->Execute(ADMIN_ADD_SQL, $params);
	  if ($result) {
	    return true;
	  } else {
	    trigger_error($go_conn->ErrorMsg());
	    return false;
	  }
	} 
   }

   /*** Remove a admin from the admin's list */
   function remove() {
	global $go_conn;
		
	$params = array($this->username, $this->password);
	$result = $go_conn->Execute(ADMIN_DELETE_SQL, $params);
	if ($result) {
	    return true;
	} else {
	    trigger_error($go_conn->ErrorMsg());
	    return false;
	}
   }
 }

?>