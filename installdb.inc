<?

/*** create admins table */
define('CREATE_ADMINS_TABLE', <<<EOS
create table admins (
	username varchar(20) not null primary key,
	password varchar(20) not null)
EOS
);

/*** drop admins table */
define('DROP_ADMINS_TABLE', <<<EOS
drop table admins
EOS
);

/*** create members table */
define('CREATE_MEMBERS_TABLE', <<<EOS
create table members (
	username varchar(20) not null primary key,
	password varchar(20) not null,
	status int not null)
EOS
);

/*** drop members table */
define('DROP_MEMBERS_TABLE', <<<EOS
drop table members
EOS
);

/*** create partners table */
define('CREATE_PARTNERS_TABLE', <<<EOS
create table partners (
	username varchar(20) not null primary key,
	password varchar(20) not null,
	status int not null)
EOS
);
// partner status: 0 - non active, 1 - active

/*** drop partners table */
define('DROP_PARTNERS_TABLE', <<<EOS
drop table partners
EOS
);

?>
