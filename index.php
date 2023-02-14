<html>
  <head>
    <title>PHP Test</title>
    <style>
    /* Style for the form */
    form {
        margin-bottom: 20px;
    }
    input {
        padding: 10px;
        border-radius: 5px;
        border: none;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        margin-right: 10px;
    }
    button {
        padding: 10px;
        border-radius: 5px;
        border: none;
        background-color: #1abc9c;
        color: #fff;
        cursor: pointer;
    }

    /* Style for the table */
    table {
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th {
        background-color: #1abc9c;
        color: #fff;
        font-weight: bold;
        padding: 10px;
        text-align: left;
    }
    td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }
    td:nth-child(3) {
        text-align: center;
    }

    /* Style for the "No clients found" message */
    .no-clients {
        color: #aaa;
        font-style: italic;
    }
</style>


  </head>
  <body>
    <!-- HTML form for creating a new client -->
<form id="new-client-form">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="code" placeholder="Client Code">
    <input type="number" name="contacts" placeholder="Number of Linked Contacts">
    <button type="submit">Create Client</button>
</form>

<!-- JQuery code to handle form submission -->
<script>
    $(document).ready(function() {
        $('#new-client-form').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'create-client.php',
                data: formData,
                success: function(response) {
                    // Handle success response (e.g. display success message)
                },
                error: function() {
                    // Handle error response (e.g. display error message)
                }
            });
        });
    });
</script>

<!-- PHP code to insert new client into database -->
<?php
    // Connect to MySQL database
    $conn = mysqli_connect('localhost', 'username', 'password', 'database');

    // Get client data from POST request
    $name = $_POST['name'];
    $code = $_POST['code'];
    $contacts = $_POST['contacts'];

    // Validate input (e.g. check for empty fields, sanitize input)

    // Insert new client into database
    $sql = "INSERT INTO clients (name, code, contacts) VALUES ('$name', '$code', '$contacts')";
    mysqli_query($conn, $sql);
?>

<!-- PHP code to display list of clients -->
<?php
    // Connect to MySQL database
    $conn = mysqli_connect('localhost', 'username', 'password', 'database');

    // Retrieve client data from database and sort by name ascending
    $sql = "SELECT * FROM clients ORDER BY name ASC";
    $result = mysqli_query($conn, $sql);

    // Display client data in table with specified columns
    if (mysqli_num_rows($result) > 0) {
        echo "<table>
            <tr>
                <th>Name</th>
                <th>Client code</th>
                <th>Number of linked contacts</th>
            </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>".$row['name']."</td>
                <td>".$row['code']."</td>
                <td align='center'>".$row['contacts']."</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "No clients found";
    }
?>



   
    <script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script> 
  </body>
</html>