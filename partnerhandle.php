<?

/*** required inclusions */
require_once '../setup.php';
require_once ROOT.'functions.inc';
require_once ROOT.'cadmin.inc';
require_once ROOT.'cpartner.inc';

if (isAdminLogged()) {
  $user = new CAdmin($_SESSION['username'], $_SESSION['password']);
  if ($user->check()) {
    switch ($action) {
 	case 'remove':
	  $m = new CPartner($_GET['username'], $_GET['password']);
	  $m->remove();
	  break;
 	case 'store':
	  $m = new CPartner($_GET['username'], $_GET['password']);
	  $m->store();
	  break;
 	case 'changeStatus':
	  $m = new CPartner($_GET['username'], $_GET['password']);
	  $m->changeStatus();
	  break;
	default: die("Unknown action");
    }
    Header("Location: adminpages.php?page=printPartners");
  }
} else { Header("Location: adminpages.php"); }

?>
