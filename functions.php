<?

    // check if any administrator is currently logged
	function isAdminLogged() {
	  if (!isset($_SESSION['username']) || !isset($_SESSION['password']) || $_SESSION['group']!='admin') 
	  return false;
	  else return true;
	}

    // check if any member is currently logged
	function isMemberLogged() {
	  if (!isset($_SESSION['username']) || !isset($_SESSION['password']) || $_SESSION['group']!='member') 
	   return false; 
	   else return true;
	}

    // check if any partner is currently logged
	function isPartnerLogged() {
	  if (!isset($_SESSION['username']) || !isset($_SESSION['password']) || $_SESSION['group']!='partner') 
	   return false; 
	   else return true;
	}

?>