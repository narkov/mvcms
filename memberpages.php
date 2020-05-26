<?

/*** required inclusions */
require_once '../setup.php';
require_once ROOT.'cmember.inc';
require_once ROOT.'functions.inc';

if (isMemberLogged()) {
  $user = new CMember($_SESSION['username'], $_SESSION['password']);
  if ($user->check()) {
     $smarty = new Smarty;
     $smarty->compile_check = true;
  switch ($page) {
 	case 'member_logout': 
  	  $user->logout();
	  break;
 	case 'member_start': 
	  $smarty->assign("username",$_SESSION['username']);
	  break;
 	case 'member_next':   
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
	  case 'member_login_try':
		$m = new CMember($_GET['username'], $_GET['password']);
		if ($m->login()) 
	  		Header("Location: memberpages.php?page=member_next");
			else $smarty->display($actions['member_login_failed']);
	  	break;
	  case 'member_registrate_form':
    		$smarty->display($actions[$page]);
	  	break;
	  case 'member_registrate':
		$m = new CMember($_GET['username'], $_GET['password']);
		if ($m->store()) 
			Header("Location: memberpages.php?page=member_login");
			else $smarty->display($actions['member_login_failed']);
	  	break;
	  default:
    		$smarty->display($actions['member_login']);
		break;
	}
}


?>
