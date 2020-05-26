<?

/*** required inclusions */
require_once '../setup.php';
require_once ROOT.'cpartner.inc';
require_once ROOT.'functions.inc';

if (isPartnerLogged()) {
  $user = new CPartner($_SESSION['username'], $_SESSION['password']);
  if ($user->check()) {
     $smarty = new Smarty;
     $smarty->compile_check = true;
     switch ($page) {
 	case 'partner_logout': 
  	  $user->logout();
	  break;
 	case 'partner_start': 
	  $smarty->assign("username",$_SESSION['username']);
	  break;
 	case 'partner_next':   
	  $smarty->assign("username",$_SESSION['username']);
	  break;
	default: $page = 'unknownPage';
     }
    $smarty->display($actions[$page]);
  }
} else {
	$smarty = new Smarty;
  	$smarty->compile_check = true;
	switch ($page) {
	  case 'partner_login_try':
		$m = new CPartner($_GET['username'], $_GET['password']);
		if ($m->login()) 
			Header("Location: partnerpages.php?page=partner_next");
			else $smarty->display($actions['partner_login_failed']);
	  	break;
	  case 'partner_registrate_form':
    		$smarty->display($actions[$page]);
	  	break;
	  case 'partner_registrate':
		$m = new CPartner($_GET['username'], $_GET['password']);
		if ($m->store()) 
			Header("Location: partnerpages.php?page=partner_login");
			else $smarty->display($actions['partner_login_failed']);
	  	break;
	  default:
    		$smarty->display($actions['partner_login']);
		break;
	}
}


?>
