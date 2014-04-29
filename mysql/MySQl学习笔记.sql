PHP NOTE 9 mysql 复习
@20130611 by boxcore
@20140429 再次编辑，修改结构

-- 约定：
-- tabname：表名
-- dbname:数据库名
-- fieldname 或 field+n : 字段名
-- oldTabName:旧表名
-- newTabName:新表名

--------------------
一、数据库概述
--------------------

1.MySQl操作过程：MySQl 服务端,MySQl客户端；

2.数据库产品分类：关系型数据库 ,非关系型数据库；SQL与NoSQL的区别。

3.数据表的字符集:Client,Conn,Server,DB

     1 ）my.ini配置默认字符串：
          dafault-character-set=utf8     # client & Conn charset;
          character-set-server=utf8       # server & DB charset;
     2 ）PHP语句设置客户端字符集： mysql_query("set name utf8");

     3 ）创建表时指定字符集方法：
          create table tab(...)engine=MyISAM DEFAULT CHARSET=utf8; （简写）
          create table tabname(...)type=mysiam default character set utf8 collate utf8_general_ci;

4.数据表组成：表结构文件 (),表数据文件(), 表索引文件 ();

5.数据库引擎：InnoDB支持事务处理，但不支持全文搜索， MyISAM支持全文搜索但不支持事务， MEMORY和MyISAM 一样，只不过它把数据保存在内存而不是磁盘中，这样速度更快。

----------------------
二、数据库的常用操作：
----------------------

1.数据库的连接：mysql -uroot -p123 -h192.168.2.2
2.退出MySQL:exit|quit|Ctrl+C
3.中断数据库的操作：\c
4.MySQl服务器的关闭和退出：net stop mysql || net start mysql

5.MySQl中用户的修改：set password=password("密码 ")；
     创建用户： CREATE USER 'test1'@'localhost' IDENTIFIED BY  '***';
6.MySQl中用户授权：grant all on *.* to user1@192.168.190.20 identified by "密码";
     GRANT ALL PRIVILEGES ON  `test1\_%` . * TO  'test1'@'localhost';
7.刷新权限如：flush privileges;
     * 在客户端修改用户权限后需要刷新数据库缓存
8.查看用户授权
     use mysql
     select user,password,host from user;
10.删除用户
     方法一： drop user user1@"%";
     方法二：
          use mysql
          delete from user where user=" 用户名";

-----------------
三、数据库的操作
-----------------
1.创建数据库     create database dbname ；
2.查看数据库     show databases;
3.删除数据库     drop database dbname ；
4.切换数据库     use dbname ；


-----------------------------------
结构化查询语言 sql包含四个部分:
-----------------------------------
1.DDL   // 数据定义语言 ,create,drop,alter
2.DML   // 数据操作语言 ,insert,update,delete
3.DQL   // 数据查询语言 ,select
4.DCL   // 数据控制语言 ,grant,commit,rollback


----------------------------
数据定义语言 (DDL)
----------------------------

一、 CREATE语句：
----------------
	CREATE TABLE `special` (
		`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
		`sort`  smallint(5) UNSIGNED NOT NULL DEFAULT 50 COMMENT '排序' ,
		`name`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '专题名称' ,
		`created_time`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间' ,
		PRIMARY KEY (`id`),
		INDEX `sort` (`sort`, `tags`) USING BTREE 
	)
	ENGINE=InnoDB
	DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
	ROW_FORMAT=Compact
	;

二、 DROP语句
--------------


三、 ALTER语句
------------------------------------
alter修改数据表结构

1. change语法修改修改字段
·alter table user change age sex int;   
#把age 的字段重命名为 sex并设置字段属性为int；【更改字段名，修改字段名】
//修改字段名的时候建议带上他原有的 int或者varchar 属性，如果不写属性会报错；

2. modify语法修改字段
·alter table user modify age tinyint;

2.1 添加字段
     ·alter table user add age int;  //默认加到最后
     ·alter table user add age int first;  //加到最前面去
     ·alter table user add age int after id;  //加到id 后面

2.2 删除字段
	AlTER TABLE `user` DROP `age`; 
	alter table chat_dialog drop column is_export;
	alter table tel_400 drop column is_export;
     ·alter table user drop age;

2.3 添加索引
     ·alter table tab62 add primary key(id);
     ·alter table tab62 modify id int unsigned auto_incrment;
     ·alter table tab62 add unique un_name(name);
     ·alter table tab62 add index in_pass(pass);

2.4 删除索引
     ·alter table tab62 modify id int;
     ·alter table tab62 drop primary key;
     ·alter table tab62 drop index in_pass;
     ·alter table tab62 drop unique un_name;

2.5 更改表名称
     1)rename table tab62 to tab26; 修改表名，非字段
     2)alter table user rename to user1;

2.6 更改auto_increment 属性的初始值
alter table user auto_increment=1;
//truncate user;  效率快，自增列表自动从 1开始（清空表中所有数据）


2.7 更改表名称：alter table 旧表名 rename as 新表名

2.8  删除表：dorp table [if exists] 表名；


2.9 修改表类型
	ALTER TABLE `mytab` MODIFY COLUMN `is_remember`  enum('N','Y') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'N' COMMENT '是否为记住' AFTER `ip_city`;
	ALTER TABLE `mytab` MODIFY COLUMN `visitor`  char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户识别码' AFTER `use_time`;

	
----------------------------
操作数据表中的数据记录 (DML)
----------------------------
1.insert
eg:insert into user(name) values("user4");

2.update
update user set name="user4" where id=4;
//在mysql 中没有==，只有 =，即包含赋值，又包含比较
update user set name='user5',age=20 where id=5;

3.delete
//必须加where 条件，如果不加 where全部删除，这个时候应该用 truncate清空数据
delete from user where id>=3 and id<=5; 等同于 delete from user where id between 3 and 5;

---------------------------------
数据查询语言（ DQL）--select 使用
---------------------------------

1.选择特定的字段
select id,name from user;
//select * from user;


2.给字段取别名-as
select id,name from user;
select id maoxian,name from user;
select id as maoxian,name from user;


3.distinct关键字的使用
//取出唯一值
select distinct age from user;


4.使用where 条件进行查询
select * from user where id>=3 and id<=5;


5.查询空值null
select * from user where age is null;
select * from user where age is not null;


6.between and的使用方法
select * from user where id between 3 and 5;


7.in的使用方法
select * from user where id=1 or id=2 or id=10;
select * from user where id in(1,2,10);   建议使用这个


8.like的使用方法
//模糊查询,text 类型不能加索引
% 匹配所有
_ 匹配一个字符
select * from user where  name like "%mysql%";  //% 在前，name这一列的索引会失效


9.使用order by 对查询结果排序
//排序，asc 和desc，一个是升序，一个降序
select * from user order by id asc;  // 默认就是升序 ,数字从小到大
select * from user order by id desc;  // 默认就是升序 ,数字从大到小


10.使用limit 限定输出个数 (分页实现)
select * from user order by id limit 0,2;
select * from user order by id limit 5; //limit 0,5  前五个


11.concat() 连接函数
select concat(id,age) from user;     # 输出的值为每一行中指点的列字符串相加。
select concat("aaa","bbb","cccc");  # 输出连接的字符串： aaabbbccc,如果没有双引号则误认为是字段，报错。


12.rand() 随机数
eg: select * from user order by rand() limit 3;


13.使用统计函数：
count() 统计个数
sum() 求和
avg() 平均值
max() 最大值
min() 最小值
eg:
select count(id),sum(age),avg(age),max(id),min(id) from user;


14.group by分组聚合的 使用-select 
结合合计函数，根据一个或多个列对结果集进行分组
//分组  聚合
//只分组没有意义，必须用函数去聚合 .
eg: select banji,sum(score),count(id) from user group by banji; // 从班级表中统计每个班的总分数和总人数
eg2:查找每个客户的总金额（总订单） :
------------------------------------
O_Id OrderDate      OrderPrice Customer
1      2008/12/29      1000     Bush
2      2008/11/23      1600     Carter
3      2008/10/05      700      Bush
4      2008/09/28      300      Bush
5      2008/08/06      2000     Adams
6      2008/07/21      100      Carter
------------------------------------
执行语句： SELECT Customer,SUM(OrderPrice) FROM Orders GROUP BY Customer;

结果集类似这样：
-------------------------
Customer SUM(OrderPrice)
Bush           2000
Carter           1700
Adams           2000
--------------------------


---------------------------------------
数据查询语言（ DQL）2--select 的多表查询
---------------------------------------
假如下面三种方法都能实现一种表，优先选择普通多表查询。

1.普通多表查询
1）两表查询
mysql> select user.id,user.name,user.score,user.banji,tel.num from user,tel where user.id=tel.uid;
2）三表查询
mysql> select user.name,tel.num,qq.qq from user,tel,qq where user.id=tel.uid and user.id=qq.uid;


2.嵌套查询| 子查询-in
select * from user where id in(select uid from tel);

3.左链接查询-left join on
select user.id,user.name,tel.num from user left join tel on user.id=tel.uid;
//左链接以左边的表为主导，先输出左边表的所有数据，按条件输出右边表的内容，没有相对应的内容就为 null


*普通多表查询的三种方法，分别有什么区别：
普通多表查询，查多个表，并且可以输出多个表的内容
嵌套查询，查多个表，但只能输出一个表的内容
左链接查询，查多个表，先把左边的表全部输出，右边的表按条件输出，否者输出 null





---------------------------------------
DCL数据控制语言(grant,commit,rollback)
---------------------------------------

一、GRANT权限控制

二、COMMIT控制

三、ROLLBACK控制




------------------------------------

-----------
四、表操作
-----------
1.查看表：show tables ；
2.创建表：create table tabname (field1 ，field2， fieldn);
3.删除表：dorp table [if exists] tabname ；
4.修改表名：rename table oldTabName to newTabName ；
5.查询表结构：desc tabname；


--------------------
五、表内容管理
--------------------

1.增加数据：insert
insert into user(name) values("user4");

2.删除数据：delete
//必须加where 条件，如果不加 where全部删除，这个时候应该用 truncate清空数据
delete from user where id>=3 and id<=5;
delete from user where id between 3 and 5;

3.修改数据：update
update user set name='user5',age=20 where id=5;
//在mysql 中没有==，只有 =，即包含赋值，又包含比较

4.查询数据：select



-----------------------
六、数据字段类型
-----------------------

1.数值     // 显示和大小
int|float|tinyint
     ·tinyint数值类型的无符号取值范围： 0-255
     ·int数值类型的无符号取值范围： 0-42亿

2.字符串 // 显示和个数
char|varchar|enum|set
     ·char(3)的意思是什么： 0-255
     ·varchar(3)的意思是什么： 0-65535

3.日期和时间( 数值)
date|time|datetime|year|timestamp
     在php中把时间加工成时间戳，放到 mysql中的int 列



-------------------
七、数据字段属性
-------------------
1.unsigned
2.zerofill
3.auto_increment
4.null
5.not null     # 如表中性别例子 ,如果有一列你设计成not null,那么给 default默认值
6.default


-----------------
八.数据表的类型
-----------------
1.myisam     // 默认就是 myisam
2.innodb     // 事务

     创建表时指定表类型： create table t1(id int) engine=innodb;
     修改表引擎类型： alter table tablename engine=innodb;
     查看表类型： show create table tabname;


-------------------
九.数据表索引设置
-------------------

1.主键索引 primary key 一个表中只能有一个主键索引

添加索引 :
1).建表时就加上去
2).用alter 命令
     alter table t2 add primary key(id);  // 加主键
     alter table t2 modify id int unsigned auto_increment; // 加无符号和自增属性

删除索引 :
     alter table t2 modify id int; --加无符号和自增属性
     alter table t2 drop primary key;

2. 唯一索引     unique index
     // 每一列都可以是唯一索引，本列值不能重复值

3. 普通索引     index

     添加索引 :alter table user add index in_name(name);
     删除索引 :alter table user drop index in_name;

//每一列都可以是普通索引

4.全文索引     fulltext








==========================================
复习 --最常用的语法：
-----------------------------------
1.DDL 数据定义语言,create,drop,alter
1)create database {database}
2)create table {table}();


2.DML 数据操作语言,insert,update,delete
1）insert into 表名 [(字段 1,字段2, 字段n)] values ('值 1','值2',' 值n');
2）update 表名 set 字段名 =表达式[, 字段n=表达式 n] [where 条件] [order by 字段] [limit 行数 ];
3）delete from 表名 [where 条件 ] [order by 字段] [limit 行数];


3.DQL 数据查询语言,select
select [all|distinct] {*|table.*|[table.]field[as alias1][,[table.]field2[as alias2][,...]]} from tableexpression[,...][in externaldatabase] [where...] [group by...] [having...] [order by...] [limit count];

4.DCL 数据控制语言,grant,commit,rollback
1）grant 权限 on 数据库 .数据表 to 用户@登录主机 indentified by "密码"


  
