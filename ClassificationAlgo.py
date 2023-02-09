import pandas as pd
import sqlite3
from sklearn.ensemble import RandomForestClassifier
from sklearn.model_selection import train_test_split

# Connect to the database and extract the crime report data
conn = sqlite3.connect('crime_reports.db')
query = 'SELECT * FROM crime_reports'
df = pd.read_sql(query, conn)
conn.close()

# Convert the data to a .csv file
df.to_csv('crime_reports.csv', index=False)

# Load the data from the .csv file
data = pd.read_csv('crime_reports.csv')

# Split the data into features (X) and labels (y)
X = data.drop(['crime_type', 'priority'], axis=1)
y = data['crime_type']

# Split the data into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2)

# Train a Random Forest classifier
clf = RandomForestClassifier()
clf.fit(X_train, y_train)

# Evaluate the classifier on the testing data
accuracy = clf.score(X_test, y_test)
print('Accuracy:', accuracy)
