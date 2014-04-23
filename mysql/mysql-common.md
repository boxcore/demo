常用MySQL语句
============
	
	SELECT item_id, count(*)   FROM `comment_item` where item_id != 0 group by item_id
	SELECT item_id, count(*)   FROM `tel_400` where item_id != 0 group by item_id
	SELECT item_id, count(*)   FROM `chat_dialog` where item_id != 0 group by item_id
	
	
	SELECT item_id,DATE_FORMAT(comment_time,'%Y-%m-%d') as date, count(*) as comment_count   FROM `comment_item` where item_id = 4418 group by DATE_FORMAT(comment_time,'%Y-%m-%d')
	SELECT item_id,DATE_FORMAT(create_time,'%Y-%m-%d') as date, count(*) as chat_count   FROM `chat_dialog` where item_id = 4418 group by DATE_FORMAT(create_time,'%Y-%m-%d')
	SELECT item_id,DATE_FORMAT(created,'%Y-%m-%d') as date, count(*) as tel_count   FROM `tel_400` where item_id = 4418 group by DATE_FORMAT(created,'%Y-%m-%d')