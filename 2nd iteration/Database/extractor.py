import pandas as pd
from tqdm import tqdm
df = pd.read_excel('database.xls')
df = df[:8812]
df.pop('Unnamed: 8')
df.pop('Unnamed: 9')
df.pop('Unnamed: 10')
df.pop('Unnamed: 11')
file = open('queries.sql','w')
query = "CREATE TABLE IF NOT EXISTS BOOKS(id INT PRIMARY KEY AUTO_INCREMENT, Title TEXT, Accession_Number TEXT, Author_Last_Name TEXT, Author_First_Name TEXT, Author TEXT, Keyword TEXT, Publisher TEXT, Place TEXT);"
file.write(query+"\n")
init = "INSERT INTO BOOKS (Title,Accession_Number,Author_Last_Name,Author_First_Name,Author,Keyword,Publisher,Place)"
cnt = 0
gen = tqdm(df.iterrows())
for row in gen:
    cnt += 1
    row = list(row[1:])[0]
    row[0] = str(row[0]).replace("\'","").replace("\"","")
    row[1] = str(row[1]).replace("\'","").replace("\"","")
    row[2] = str(row[2]).replace("\'","").replace("\"","")
    row[3] = str(row[3]).replace("\'","").replace("\"","")
    row[4] = str(row[4]).replace("\'","").replace("\"","")
    row[5] = str(row[5]).replace("\'","").replace("\"","")
    row[6] = str(row[6]).replace("\'","").replace("\"","")
    row[7] = str(row[7]).replace("\'","").replace("\"","")
    query = init + " VALUES(\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\');"
    query = query % (row[0],row[1],row[2],row[3],row[4],row[5],row[6],row[7])
    file.write(query+"\n")
file.close()

