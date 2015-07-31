create table if not exits tm_tagindex_ex (
	id int(10) unsigned not null auto_increment,
	arctype_id int(10) unsigned not null default 0,
	is_recommend tinyint(4) not null default 0,
	alias varchar(255) not null default '',
	litpic varchar(255) not null default '',
	seq int(10) unsigned not null default '0',
	primary key (id)
) engine =innodb default charset utf-8;
