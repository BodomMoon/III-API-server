#Import libraries necessary for this project
#coding:utf-8
import sys, json
import numpy as np   
import pandas as pd
from IPython.display import display
from sklearn import tree
from sklearn.model_selection import train_test_split
from sklearn import metrics
from numpy import float64

# Load the data that PHP sent us
try:
    data = json.loads(sys.argv[1])
except:
    print "ERRORrrr"
    sys.exit(1)
x = [data]


data = pd.read_csv('C:\Users\Toshiba\Documents\AI_learning\wifilocation\\test5.csv')  #讀取Wifi資料
label = data['location']
data.drop('location', axis = 1,inplace=True)   #將不用的行列刪掉 Inplace代表直接操作該內存
data.drop('SearchTime', axis = 1,inplace=True)

#print "Wifi dataset has {} data points with {} variables each.".format(*data.shape) #印出資料量
#display(data.head())  #自動列出前五項

#print(label)
#print(data)
nameL = []
for key in data.keys():
    nameL.append(key)
#取出每個column的KeyName

nameF = label.values.tolist()
labelName =[]
for item in nameF:
    if (not (str)(item) in labelName):
        labelName.append((str)(item))
#取出共有哪些label  都是圖形化時使用
accuracy = 0.0
answer = 0
for i in range(1,20):
	train_X, test_X, train_y, test_y = train_test_split(data, label, test_size = 0.3)
	#拆分訓練跟測試資料
	clf = tree.DecisionTreeClassifier(random_state = 0,max_depth = 9)
	#建立分類器
	wifi_clf = clf.fit(train_X, train_y)
	#開始擬和
	test_y_predicted = wifi_clf.predict(test_X)
	accuracy = metrics.accuracy_score(test_y, test_y_predicted)
	#取得預測準確率
	if(float64(accuracy).item()>float64(0.80).item()):
	#print(accuracy)  準確率達標 回傳結果
		if(answer == clf.predict(x)[0].item()):
			#兩樹預測結果皆相同
			break
		else:
			answer = clf.predict(x)[0].item()
			#兩樹不同則覆蓋上次結果


#print(accuracy)
# Generate some data to send to PHP
result = {"status":'Yes!','accuracy':accuracy,'location':clf.predict(x)[0].item()}
# Send it to stdout (to PHP)

print(json.dumps(result))
