# Development practical-test Documentation
 # first thing I've done is:
 - Create a form in HTML that takes in the necessary client information (such as name, code, e.t.c)
 - use Jquery to handle the form submission and send data to the PHP file
 - in the PHP file, validate the input and insert the new client data into the MySQL database using SQL queries.
 
 To display the list of clients, ordered by name ascending with the specified columns, the following is done:
 1. Retrieve the client data from the MySQL database using a SQL query.
 2. Sort the data by name in ascending order.
 3. Loop through the client data and display it in a table with the specified columns (Name, Client code, Number of linked contacts).
 4. If there are no clients to display, simply display the message "No clients found :(" without the table headings.
 
 # Second thing :
 - I added some CSS styling to the form and table, including some padding, border-radius, box shadow, and background color for the button and font-weight, text   alignment 
 for the table headers. I also centred the text in the "Number of linked contacts" column.
 - Additionally, the CSS code adds some styling for the "No clients found" message, including a lighter text color and italic font stlye.
