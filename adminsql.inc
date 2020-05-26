<?

/* 
  @module Escort
*/

/*** add admin */
define('ADMIN_ADD_SQL', <<<EOS
INSERT 
INTO admins (username, password) VALUES (?,?)
EOS
);

/*** remove admin */
define('ADMIN_DELETE_SQL', <<<EOS
DELETE
FROM admins WHERE username = ? AND password = ?
EOS
);

/*** select all admins */
define('ADMINS_SELECT_SQL', <<<EOS
SELECT *
FROM admins
EOS
);

/*** select specified admin */
define('ADMIN_SELECT_SQL', <<<EOS
SELECT *
FROM admins
WHERE username = ? AND password = ?
EOS
);

?>