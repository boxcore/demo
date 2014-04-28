MySQL获取时间函数
===============
获取星期的函数有：

1. **DAYOFWEEK(date)**：返回日期date的星期索引(1=星期天，2=星期一, ……7=星期六)。这些索引值对应于ODBC标准。
2. **WEEKDAY(date)**：返回date的星期索引(0=星期一，1=星期二, ……6= 星期天)。
3. **DAYOFMONTH(date)**：返回date的月份中日期，在1到31范围内。
4. DAYOFYEAR(date)：返回date在一年中的日数, 在1到366范围内。
5. MONTH(date)：返回date的月份，范围1到12。
6. DAYNAME(date)：返回date的星期名字。
7. MONTHNAME(date)：返回date的月份名字。
8. QUARTER(date)：返回date一年中的季度，范围1到4。
9. **WEEK(date)**：WEEK(date,first) 对于星期天是一周的第一天的地方，有一个单个参数，返回date的周数，范围在0到52。2个参形式WEEK()允许 。你指定星期是否开始于星期天或星期一。如果第二个参数是0，星期从星期天开始，如果第二个参数是1，从星期一开始。
10. YEAR(date)：返回date的年份，四位数字，范围在1000到9999。
11. HOUR(time)：返回time的小时，范围是0到23。
12. MINUTE(time)：返回time的分钟，范围是0到59。
13. SECOND(time)：返回time的秒数，范围是0到59。

代码例子：



	mysql> select DAYOFWEEK('1998-02-03');
	-> 3 
	mysql> select WEEKDAY('1997-10-04 22:23:00');
	-> 5
	mysql> select DAYOFMONTH('1998-02-03');
	-> 3
	mysql> select DAYOFYEAR('1998-02-03');
	-> 34
	mysql> select MONTH('1998-02-03');
	-> 2
	mysql> select DAYNAME("1998-02-05");
	-> 'Thursday'
	mysql> select MONTHNAME("1998-02-05");
	-> 'February'

	mysql> select QUARTER('98-04-01');
	-> 2
	mysql> select WEEK('1998-02-20');
	-> 7
	mysql> select WEEK('1998-02-20',0);
	-> 7
	mysql> select WEEK('1998-02-20',1);
	-> 8
	
	mysql> select YEAR('98-02-03');
	-> 1998
	mysql> select HOUR('10:05:03');
	-> 10
	mysql> select MINUTE('98-02-03 10:05:03');
	-> 5
	mysql> select SECOND('10:05:03');
	-> 3


###4.2、时间计算函数
1. PERIOD_ADD(P,N)：增加N个月到阶段P（以格式YYMM或YYYYMM)。以格式YYYYMM返回值。注意阶段参数P不是日期值。
2. PERIOD_DIFF(P1,P2)：返回在时期P1和P2之间月数，P1和P2应该以格式YYMM或YYYYMM。注意，时期参数P1和P2不是日期值。
3. DATE_ADD(date,INTERVAL expr type)、DATE_SUB(date,INTERVAL expr type)、ADDDATE(date,INTERVAL expr type)、SUBDATE(date,INTERVAL expr type)

代码：

	mysql> SELECT "1997-12-31 23:59:59" + INTERVAL 1 SECOND;
	-> 1998-01-01 00:00:00
	mysql> SELECT INTERVAL 1 DAY + "1997-12-31";
	-> 1998-01-01
	mysql> SELECT "1998-01-01" - INTERVAL 1 SECOND;
	-> 1997-12-31 23:59:59
	mysql> SELECT DATE_ADD("1997-12-31 23:59:59",
	INTERVAL 1 SECOND);
	-> 1998-01-01 00:00:00
	mysql> SELECT DATE_ADD("1997-12-31 23:59:59", INTERVAL 1 DAY);
	-> 1998-01-01 23:59:59
	mysql> SELECT DATE_ADD("1997-12-31 23:59:59",
	INTERVAL "1:1" MINUTE_SECOND);
	-> 1998-01-01 00:01:00
	mysql> SELECT DATE_SUB("1998-01-01 00:00:00",
	INTERVAL "1 1:1:1" DAY_SECOND);
	-> 1997-12-30 22:58:59
	mysql> SELECT DATE_ADD("1998-01-01 00:00:00",
	INTERVAL "-1 10" DAY_HOUR);
	-> 1997-12-30 14:00:00
	mysql> SELECT DATE_SUB("1998-01-02", INTERVAL 31 DAY);
	-> 1997-12-02
	mysql> SELECT EXTRACT(YEAR FROM "1999-07-02");
	-> 1999
	mysql> SELECT EXTRACT(YEAR_MONTH FROM "1999-07-02 01:02:03");
	-> 199907
	mysql> SELECT EXTRACT(DAY_MINUTE FROM "1999-07-02 01:02:03");
	-> 20102


**实例1.** 有一个会员表，有个birthday字段，值为'YYYY-MM-DD'格式，现在要查询一个时间段内过生日的会员，比如'06-03'到'07-08'这个时间段内所有过生日的会员。

	Select * From user Where DATE_FORMAT(birthday,'%m-%d') >= '06-03' and DATE_FORMAT(birthday,'%m-%d') <= '07-08';

MySQL的时间函数文档参考：[Date and Time Functions](http://dev.mysql.com/doc/refman/5.5/en/date-and-time-functions.html)