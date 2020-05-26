<?
 require_once 'iuser.inc';

 define('INACTIVE', 0);
 define('ACTIVE', 1);

 class CMember extends IUser {

   var $group = 'member';
   var $username;
   var $password;
  
   function CMember($username, $password) {
	$this->username = $username;
	$this->password = $password;
   }

   /*** check if user exist */
   function check() {
	global $go_conn;

    if (empty($this->username) || empty($this->password)) return true;
	$params = array($this->username, $this->password);
	$result = $go_conn->Execute(MEMBER_SELECT_SQL, $params);
	if ($result) { if ($result->RecordCount() > 0) return true;
	  else return false;
	} else {
	    trigger_error($go_conn->ErrorMsg());
	    return false;
	}
   }


   /*** store login session for current user */
   function login() {
     	if ($this->getStatus()==INACTIVE) return false;
     	if (!$this->check()) return false;
		$_SESSION['username'] = $this->username;
     	$_SESSION['password'] = $this->password;
		$_SESSION['group'] = $this->group;
     	return true;
   }

   /*** logout session for current user */
   function logout() {
     	session_destroy();
     	$_SESSION = array();
     	$this->username = '';
     	$this->password = '';
     	return true;
   }

   /*** Add a member to the member's list */
   function store() {
	global $go_conn;
		
	if (!$this->check()) {
  	  $params = array($this->username, $this->password);
	  $result = $go_conn->Execute(MEMBER_ADD_SQL, $params);
	  if ($result) {
	    return true;
	  } else {
	    trigger_error($go_conn->ErrorMsg());
	    return false;
	  }
	}
   }

   /*** Remove a member from the member's list */
   function remove() {
	global $go_conn;
		
	$params = array($this->username, $this->password);
	$result = $go_conn->Execute(MEMBER_DELETE_SQL, $params);
	if ($result) {
	    return true;
	} else {
	    trigger_error($go_conn->ErrorMsg());
	    return false;
	}
   }

   /*** Get partner status */
   function getStatus() {
	global $go_conn;

	if ($this->check()) {
  	  $params = array($this->username, $this->password);
	  $result = $go_conn->Execute(MEMBER_SELECT_STATUS_SQL, $params);
	  if ($result) {
	    return $result->fields['status'];
	  } else {
	    trigger_error($go_conn->ErrorMsg());
	    return false;
	  }
	}
   }

   /*** Set partner status */
   function setStatus($status) {
	global $go_conn;

	if ($this->check()) {
  	  $params = array($status, $this->username, $this->password);
	  $result = $go_conn->Execute(MEMBER_UPDATE_STATUS_SQL, $params);
	  if ($result) {
	    return true;
	  } else {
	    trigger_error($go_conn->ErrorMsg());
	    return false;
	  }
	}
   }

   /*** Change partner status */
   function changeStatus() {
	$this->setStatus(abs($this->getStatus()-1));
   }

 }

?>