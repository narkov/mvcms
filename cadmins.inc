<?

 class CAdmins {

   /*** Print all members from the member's list */
   function printList() {
	global $go_conn;
	global $actions;

	$result = $go_conn->Execute(ADMINS_SELECT_SQL);
	if ($result) {
  	   $smarty = new Smarty;
  	   $smarty->compile_check = true;
	   $users = array();
	   while (!$result->EOF) {
	      $username = $result->fields['username'];
	      $password = $result->fields['password'];
              array_push($users, array("username"=>$username, "password"=>$password));
	      $result->MoveNext();	
	   }
	   $smarty->assign("users",$users);
           $smarty->display($actions['admin_list']);
	   return true;
	} else {
	   trigger_error($go_conn->ErrorMsg());
	   return false;
	}

   }

 }

?>