create table if not exists "tm_feedback_pic"(
	'fp_id' int(11) unsigned not null auto_increment comment '评论图片id',
	'pic_name' varchar(100) not null comment '图片名称',
	'feed_id' int(11) unsigned not null comment '评论id',
	'add_time' int(10) unsigned not null comment '添加时间',
	primary key('fp_id'),
	key 'feed_id' ('feed_id')
) engine=MyISAM default charset=utf8 auto_increment=1;
