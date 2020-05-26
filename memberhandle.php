<?

/*** required inclusions */
require_once '../setup.php';
require_once ROOT.'functions.inc';
require_once ROOT.'cadmin.inc';
require_once ROOT.'cmember.inc';

if (isAdminLogged()) {
  $user = new CAdmin($_SESSION['username'], $_SESSION['password']);
  if ($user->check()) {
    switch ($action) {
 	case 'remove':
	  $m = new CMember($_GET['username'], $_GET['password']);
	  $m->remove();
	  break;
 	case 'store':
	  $m = new CMember($_GET['username'], $_GET['password']);
	  $m->store();
	  break;
 	case 'changeStatus':
	  $m = new CMember($_GET['username'], $_GET['password']);
	  $m->changeStatus();
	  break;
	default: die("Unknown action");
    }
    Header("Location: adminpages.php?page=printMembers");
  }
} else { Header("Location: adminpages.php"); }

?>
