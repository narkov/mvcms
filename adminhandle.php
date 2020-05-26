<?

/*** required inclusions */
require_once '../setup.php';
require_once ROOT.'functions.inc';
require_once ROOT.'CAdmin.inc';

if (isAdminLogged()) {
  $user = new CAdmin($_SESSION['username'], $_SESSION['password']);
  if ($user->check()) {
    switch ($action) {
 	case 'remove':
	  $m = new CAdmin($_GET['username'], $_GET['password']);
	  $m->remove();
	  break;
 	case 'store':
	  $m = new CAdmin($_GET['username'], $_GET['password']);
	  $m->store();
	  break;
	default: die("Unknown action");
    }
    Header("Location: adminpages.php?page=printAdmins");
  }
}

?>
