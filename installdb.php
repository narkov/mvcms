<?php 

// Install MySQL tables

/*** ADOdb library path */
  define('LIB_ADODB', '../../adodb/');

/*** include ADOdb database access class *
 * {@link http://php.weblogs.com/ADOdb/ php.weblogs.com/ADOdb} */
  require_once LIB_ADODB.'adodb.inc.php';

  define('DB', '../db/');
  require_once DB.'dbsetup.inc';
  require_once 'installdb.inc';

  if ($result = $go_conn->Execute(DROP_ADMINS_TABLE))
  	print 'Admins table were droped successfully<br>';
  else 
	trigger_error($go_conn->ErrorMsg());

  if ($result = $go_conn->Execute(CREATE_ADMINS_TABLE))
  	print 'Admins table were created successfully<br>';
  else 
	trigger_error($go_conn->ErrorMsg());

  if ($result = $go_conn->Execute(DROP_MEMBERS_TABLE))
  	print 'Members table were droped successfully<br>';
  else 
	trigger_error($go_conn->ErrorMsg());

  if ($result = $go_conn->Execute(CREATE_MEMBERS_TABLE))
  	print 'Members table were created successfully<br>';
  else 
	trigger_error($go_conn->ErrorMsg());

  if ($result = $go_conn->Execute(DROP_PARTNERS_TABLE))
  	print 'Partners table were droped successfully<br>';
  else 
	trigger_error($go_conn->ErrorMsg());

  if ($result = $go_conn->Execute(CREATE_PARTNERS_TABLE))
  	print 'Partners table were created successfully<br>';
  else 
	trigger_error($go_conn->ErrorMsg());
 
// test data
  $result = $go_conn->Execute("DELETE FROM admins");
  $result = $go_conn->Execute("INSERT INTO admins VALUES ('root','1')");
  $result = $go_conn->Execute("DELETE FROM partners");
  $result = $go_conn->Execute("INSERT INTO partners VALUES ('narkoza','narkoza',0)");
  $result = $go_conn->Execute("DELETE FROM members");
  $result = $go_conn->Execute("INSERT INTO members VALUES ('narko','narko',0)");

  if ($result)
  	echo 'Database and tables were created succefully<br>';
  else 
	trigger_error($go_conn->ErrorMsg());

  echo 'Done';
?>
