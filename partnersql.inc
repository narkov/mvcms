<?

/*** add partner */
define('PARTNER_ADD_SQL', <<<EOS
INSERT 
INTO partners (username, password) VALUES (?,?)
EOS
);

/*** remove partner */
define('PARTNER_DELETE_SQL', <<<EOS
DELETE
FROM partners WHERE username = ? AND password = ?
EOS
);

/*** select all partners */
define('PARTNERS_SELECT_SQL', <<<EOS
SELECT *
FROM partners
EOS
);

/*** select specified partner */
define('PARTNER_SELECT_SQL', <<<EOS
SELECT *
FROM partners
WHERE username = ? AND password = ?
EOS
);

/*** update specified partner status */
define('PARTNER_UPDATE_STATUS_SQL', <<<EOS
UPDATE partners
SET status = ?
WHERE username = ? AND password = ?
EOS
);

/*** select specified partner status */
define('PARTNER_SELECT_STATUS_SQL', <<<EOS
SELECT status 
FROM partners
WHERE username = ? AND password = ?
EOS
);

?>