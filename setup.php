<?

/*** root path */
  define('ROOT', '../');

/*** ADOdb library path */
  define('LIB_ADODB', ROOT.'../adodb/');

/*** include ADOdb database access class *
 * {@link http://php.weblogs.com/ADOdb/ php.weblogs.com/ADOdb} */
  require_once LIB_ADODB.'adodb.inc.php';

/*** Smarty library path */
  define('LIB_SMARTY', ROOT.'../smarty/');

/***	Smarty Template System *
 *	{@link http://smarty.php.net/ smarty.php.net}
 */
  require_once LIB_SMARTY.'libs/Smarty.class.php';

/*** DB access and SQL scripts */
  define('DB', 'db/');
  require_once DB.'dbsetup.inc';
  require_once DB.'membersql.inc';
  require_once DB.'partnersql.inc';
  require_once DB.'adminsql.inc';

/*** templates path */
  define('TEMPLATES', ROOT.'templates/');

/*** actions path */
  define('ACTIONS', ROOT);
  require_once ACTIONS.'actions.php';
 
  session_start();
?>
