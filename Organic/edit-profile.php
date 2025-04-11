<?php
// Database connection
$server = "localhost";
$user = "root";
$pass = "";
$db = "organic";
$con = mysqli_connect($server, $user, $pass, $db);

// Check if the connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the namefeedback table
$sql = "SELECT * FROM namefeedback";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-left: 300px;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .actions {
            text-align: center;
        }

        .delete-btn {
            color: red;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <!-- Sidebar (optional, you can add this if you want) -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="adminpannel.php">Dashboard</a>
        <a href="feedback-display.php">View Feedback</a>
        <!-- Add more links if needed -->
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1>Feedback Data</h1>

        <!-- Table to display feedback data -->
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Rating</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                        echo "<td>" . (isset($row['Rating']) ? htmlspecialchars($row['Rating']) : 'No rating') . "</td>";
                        echo "<td>" . htmlspecialchars($row['Message']) . "</td>";
                        echo "<td class='actions'>
                                <a href='javascript:void(0);' class='delete-btn' data-name='" . urlencode($row['Name']) . "' data-email='" . urlencode($row['Email']) . "'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No feedback found</td></tr>";
                }

                // Close the database connection
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>

    <!-- jQuery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Delete button click event
            $(".delete-btn").on("click", function() {
                var name = $(this).data("name");
                var email = $(this).data("email");

                // Confirm the deletion
                var confirmDelete = confirm("Are you sure you want to delete this feedback?");
                if (confirmDelete) {
                    // Make AJAX request to delete the feedback
                    $.ajax({
                        url: "delete-feedback.php",
                        type: "POST",
                        data: {
                            name: name,
                            email: email
                        },
                        success: function(response) {
                            // If deletion is successful, remove the row from the table
                            alert(response);
                            $(this).closest("tr").remove();
                        },
                        error: function() {
                            alert("Error deleting feedback.");
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
