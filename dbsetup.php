<?

//global connection object
  $dbHost = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName = "escort";
  $go_conn = &ADONewConnection('mysql');
  $go_conn->PConnect($dbHost, $dbUsername, $dbPassword, $dbName);
  $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

?>