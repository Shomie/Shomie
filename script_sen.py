import xlrd
import MySQLdb
import openpyxl

# Open the workbook and define the worksheet
book = xlrd.open_workbook("dba.xlsx")
sheet = book.sheet_by_name("sho2")

# Establish a MySQL connection
database = MySQLdb.connect (host="localhost", user = "root", passwd = "password", db = "shomie", use_unicode=True, charset="utf8")

# Get the cursor, which is used to traverse the database, line by line
cursor = database.cursor()

# Create the INSERT INTO sql query
query = """INSERT INTO landlords (name, phone_number) VALUES (%s, %s)"""

# Create a For loop to iterate through each row in the XLS file, starting at row 2 to skip the headers
for r in range(1, sheet.nrows):
	  name    = sheet.cell(r,1).value
	  phone_number            = sheet.cell(r,2).value           
	  
     
      

      # Assign values from each row
	  values = (name, phone_number)

	  # Execute sql Query
	  cursor.execute(query, values)
	  
# Close the cursor
cursor.close()

# Commit the transaction
database.commit()

# Close the database connection
database.close()

# Print results
print ("")
print ("All Done! Bye, for now.")
print ("")
columns = str(sheet.ncols)
rows = str(sheet.nrows)
# print ("I just imported " + %2B columns %2B + " columns and " + %2B rows %2B + " rows to MySQL!")
