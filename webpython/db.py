import mysql.connector

config = {
  'host': '127.0.0.1',
  'user': 'root',
  'password': 'root',
  'port': 3306,
  'database': 'webpython',
  'charset': 'utf8'
}

try:
  conn = mysql.connector.connect(**config)
except mysql.connector.Error as e:
  print ('connect fails!{}'.format(e))
cursor = conn.cursor(buffered=True)

try:
  sql_query = 'SELECT * FROM `users` WHERE 1'
  cursor.execute(sql_query)
  for name in cursor:
    print (name)
except mysql.connector.Error as e:
  print ('query err!{}'.format(e))
finally:
  cursor.close()
  conn.close()