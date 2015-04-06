list1 = ['a', 'b', 33]
print list1
print list1[2]

list1[2] += 10
print list1[2]

del list1[1]
print len(list1)

list2 = ['cc', 'dd', 789]
list3 = list1 + list2
print list3

list4 = list3*2
print list4

for x in list3:
    print 'i am ' + str(x)

list5 = list3[-2:]
print list5