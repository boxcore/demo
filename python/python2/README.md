Python Note
==============

计划安排  
学习时间安排：  
    Python基础 2014/5/30 ~ 2014/6/30

学习Python主要参考资料:

1. <https://docs.python.org/2/>  
2. <http://www.codecademy.com/zh/tracks/python>  
3. <http://www.pythondoc.com/pythontutorial27/index.html>  
4. <http://sebug.net/paper/python/>  
5. <http://www.w3cschool.cc/python/python-tutorial.html>  

-------------------------------------------------------

一. Python基础教程
-------------------

### 1.1 调用python解析器

**1).  在windows中运行pytion脚本**

设置环境变量:  
> set path=%path%;C:\python27

**2). 在unix中运行pytion脚本**

首行添加:  
`#! /usr/bin/env python`
然后执行shell  
`chmod +x myscript.py`
运行 ./myscript.py 就可以编译python脚本.  

二、多行语句
-------------
Python语句中一般以新行作为为语句的结束符。

但是我们可以使用斜杠（ \）将一行的语句分为多行显示，如下所示：
```python
total = item_one + \
        item_two + \
        item_three 
```

语句中包含[], {} 或 () 括号就不需要使用多行连接符。如下实例：
```python
 days = ['Monday', 'Tuesday', 'Wednesday',
        'Thursday', 'Friday']
```


## Python 引号
Python 接收单引号(' )，双引号(" )，三引号(''' """) 来表示字符串，引号的开始与结束必须的相同类型的。

其中三引号可以由多行组成，编写多行文本的快捷语法，常用语文档字符串，在文件的特定地点，被当做注释。
```python
word = 'word'
sentence = "This is a sentence."
paragraph = """This is a paragraph. It is
made up of multiple lines and sentences."""
```


## Python注释
python中单行注释采用 # 开头。python没有块注释，所以现在推荐的多行注释也是采用的 #


##Python空行
函数之间或类的方法之间用空行分隔，表示一段新的代码的开始。类和函数入口之间也用一行空行分隔，以突出函数入口的开始。

空行与代码缩进不同，空行并不是Python语法的一部分。书写时不插入空行，Python解释器运行也不会出错。但是空行的作用在于分隔两段不同功能或含义的代码，便于日后代码的维护或重构。

记住：空行也是程序代码的一部分。


## 等待用户输入
raw_input函数按回车键后就会等待用户输入：  
> raw_input("\n\nPress the enter key to exit.")


## 同一行显示多条语句
Python可以在同一行中使用多条语句，语句之间使用分号(;)分割，以下是一个简单的实例：  
> import sys; x = 'foo'; sys.stdout.write(x + '\n')



# 变量类型
变量存储在内存中的值。这就意味着在创建变量时会在内存中开辟一个空间。基于变量的数据类型，解释器会分配指定内存，并决定什么数据可以被存储在内存中。因此，变量可以指定不同的数据类型，这些变量可以存储整数，小数或字符。

python允许同时为多个变量赋值: 
1. 为多个变量赋同个值: a = b = c = 1  
2. 多个对象指定多个变量: a, b, c = 1, 2, "john"   

Python有五个标准的数据类型：

    Numbers（数字）
    String（字符串）
    List（列表）
    Tuple（元组）
    Dictionary（字典）


## 数字

## 字符串

```python
my_var= "string"
str(1.2)
len(my_var)
my_var.lower()
my_var.upper()
my_var.isalpha() # 是否是字母(纯字母)
word = my_var + len(my_var) # 字符串拼接

# 字符串索引 
word = "python"
print word[2] # 输出t
print word[1:4] # 输出ytho

```


## 函数
函数的定义由3部分组成:  
1. header头, 包含 `def`函数定义关键字, 函数名 和 参数(parameters): def tax(bill):
2. 注释,说明函数作用, 在函数header头第二行
3. 函数主体(body), 必须使用缩进

```python
def tax(bill):
    """Adds 8% tax to a restaurant bill."""
    bill *= 1.08
    print "With tax: %f" % bill
    return bill

meal_with_tax = tax(100)
```


# 时间处理库

首先要引入时间处理库才能使用其相关的函数:  
> from datetime import datetime

```python
now = datetime.now() # 获取当前时间格式如: 2014-05-30 07:44:47.352977
# 获取指定时间
print now.year  # 输出年 2014
print now.month # 输出月 5, 没有前导0
print now.day   # 输出日期 30
print now.hour  # 
print now.minute # 
print now.second # 
print '%s/%s/%s %s:%s:%s' % ( now.month, now.day, now.year, now.hour, now.minute, now.second) # Grand Finale Datetime
```


# 控制结构


## 布尔操作(Boolean Operators)
比较运算(comparators): ==, !=, >, >=, <, 和 <=
```python
bool_1 = 100 == (2*50) # True
bool_2 = 99!=(98+1) # False
```


## not|and|or 逻辑判断
优先级: not > and > or  
> True or not False and False # returns True. 

## if流程控制

```python
# 判断一
if 8 > 9:
    print "I don't printed!"
else:
    print "I get printed!"

# 判断二
if 8 > 9:
    print "I don't get printed!"
elif 8 < 9:
    print "I get printed!"
else:
    print "I also don't get printed!"

```

## while语句
