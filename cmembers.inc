<?

 class CMembers {

   function getStatus($status) {
	 switch ($status) {
		case '0': return 'non active'; break;
		case '1': return 'active'; break;
		default: return 'unknown';
 	 }; 
   }

   /*** Print all members from the member's list */
   function printList() {
	global $go_conn;
	global $actions;

	$result = $go_conn->Execute(MEMBERS_SELECT_SQL);
	if ($result) {
  	   $smarty = new Smarty;
  	   $smarty->compile_check = true;
	   $users = array();
	   while (!$result->EOF) {
		  $status = $this->getStatus($result->fields['status']);
	      $username = $result->fields['username'];
	      $password = $result->fields['password'];
          array_push($users, array("status"=>$status, "username"=>$username, "password"=>$password));
	      $result->MoveNext();	
	   }
	   $smarty->assign("users",$users);
           $smarty->display($actions['member_list']);
	   return true;
	} else {
	   trigger_error($go_conn->ErrorMsg());
	   return false;
	}

   }

 }

?>