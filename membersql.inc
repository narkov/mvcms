<?

/*** add member */
define('MEMBER_ADD_SQL', <<<EOS
INSERT 
INTO members (username, password) VALUES (?,?)
EOS
);

/*** remove member */
define('MEMBER_DELETE_SQL', <<<EOS
DELETE
FROM members WHERE username = ? AND password = ?
EOS
);

/*** select all members */
define('MEMBERS_SELECT_SQL', <<<EOS
SELECT *
FROM members
EOS
);

/*** select specified member */
define('MEMBER_SELECT_SQL', <<<EOS
SELECT *
FROM members
WHERE username = ? AND password = ?
EOS
);

/*** update specified partner status */
define('MEMBER_UPDATE_STATUS_SQL', <<<EOS
UPDATE members
SET status = ?
WHERE username = ? AND password = ?
EOS
);

/*** select specified partner status */
define('MEMBER_SELECT_STATUS_SQL', <<<EOS
SELECT status 
FROM members
WHERE username = ? AND password = ?
EOS
);

?>
