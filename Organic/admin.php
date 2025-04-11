<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@latest"></script>
    <style>
        /* Custom CSS for the message box */
        #message-box {
            display: none;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #f0fdf4;
            color: #15803d;
            padding: 16px;
            border-radius: 6px;
            border: 1px solid #16a34a;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }
        #message-box.show {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-100 font-inter">
    <div id="message-box" class=""></div> <?php
    session_start();

    $servername = "localhost";
    $username = "root"; // Replace with your actual database username
    $password = ""; // Replace with your actual database password
    $dbname = "organic";     // Replace with your actual database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (!isset($_SESSION['admin_logged_in'])) {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username_input = $_POST['username'];
            $password_input = $_POST['password'];

            // Replace with your actual admin credentials
            if ($username_input === "admin" && $password_input === "password") {
                $_SESSION['admin_logged_in'] = true;
                 // Store the username in the session
                $_SESSION['admin_username'] = $username_input;
            } else {
                echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                        <strong class='font-bold'>Error!</strong>
                        <span class='block sm:inline'>Invalid username or password.</span>
                      </div>";
            }
        }

        if (!isset($_SESSION['admin_logged_in'])) {
            echo '<div class="flex items-center justify-center h-screen bg-gray-100">
                    <form method="post" class="bg-white rounded-lg shadow-md p-8 w-80">
                        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Login to Admin Dashboard</h2>
                        <div class="mb-4">
                            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                            <input type="text" name="username" id="username" placeholder="Username" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                            Login
                        </button>
                    </form>
                </div>';
            exit;
        }
    }
    ?>

    <div class="flex">
        <nav class="bg-green-500 text-white w-64 min-h-screen">
            <div class="p-4">
                <h1 class="text-2xl font-semibold">Admin Panel</h1>
            </div>
            <ul class="py-4">
                <li class="px-4 py-2 hover:bg-green-600 transition duration-300">
                    <a href="#users" class="block text-white font-medium">Users</a>
                </li>
                <li class="px-4 py-2 hover:bg-green-600 transition duration-300">
                    <a href="#orders" class="block text-white font-medium">Orders</a>
                </li>
                <li class="px-4 py-2 hover:bg-green-600 transition duration-300">
                    <a href="#products" class="block text-white font-medium">Products</a>
                </li>
                 <li class="px-4 py-2 hover:bg-green-600 transition duration-300">
                    <a href="#logout" class="block text-white font-medium">Logout</a>
                </li>
            </ul>
        </nav>

        <main class="flex-1 p-6">
            <h2 id="users" class="text-3xl font-semibold text-gray-800 mb-4">Users</h2>
            <?php
            $sql = "SELECT * FROM login";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<div class='overflow-x-auto'>";
                echo "<table class='min-w-full leading-normal shadow-md rounded-lg overflow-hidden'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th class='px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider bg-gray-100'>Username</th>";
                echo "<th class='px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider bg-gray-100'>Email</th>";
                echo "<th class='px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider bg-gray-100'>Actions</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>".$row["email"]."</td>";
                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>".$row["password"]."</td>";
                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>";
                    echo "<div class='flex space-x-2'>";
                    echo "<button onclick='editUser(".$row["email"].")' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline text-xs'>Edit</button>";
                    echo "<button onclick='deleteUser(".$row["email"].")' class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline text-xs'>Delete</button>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            } else {
                echo "<p class='text-gray-500'>No users found</p>";
            }
            ?>

            <h2 id="orders" class="text-3xl font-semibold text-gray-800 mt-8 mb-4">Orders</h2>
            <?php
            $sql = "SELECT * FROM orders";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<div class='overflow-x-auto'>";
                echo "<table class='min-w-full leading-normal shadow-md rounded-lg overflow-hidden'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th class='px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider bg-gray-100'>ID</th>";
                echo "<th class='px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider bg-gray-100'>User ID</th>";
                echo "<th class='px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider bg-gray-100'>Order Date</th>";
                echo "<th class='px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider bg-gray-100'>Total Amount</th>";
                 echo "<th class='px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider bg-gray-100'>Actions</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>".$row["id"]."</td>";
                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>".$row["user_id"]."</td>";
                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>".$row["order_date"]."</td>";
                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>".$row["total_amount"]."</td>";
                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>";
                    echo "<div class='flex space-x-2'>";
                    echo "<button onclick='editOrder(".$row["id"].")' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline text-xs'>Edit</button>";
                    echo "<button onclick='deleteOrder(".$row["id"].")' class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline text-xs'>Delete</button>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            } else {
                echo "<p class='text-gray-500'>No orders found</p>";
            }
            ?>

            <h2 id="products" class="text-3xl font-semibold text-gray-800 mt-8 mb-4">Products</h2>
            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<div class='overflow-x-auto'>";
                echo "<table class='min-w-full leading-normal shadow-md rounded-lg overflow-hidden'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th class='px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider bg-gray-100'>ID</th>";
                echo "<th class='px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider bg-gray-100'>Name</th>";
                echo "<th class='px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider bg-gray-100'>Quantity</th>";
                echo "<th class='px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider bg-gray-100'>Price</th>";
                echo "<th class='px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider bg-gray-100'>Actions</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>".$row["id"]."</td>";
                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>".$row["name"]."</td>";
                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>".$row["quantity"]."</td>";
                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>".$row["price"]."</td>";
                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>";
                    echo "<div class='flex space-x-2'>";
                    echo "<button onclick='editProduct(".$row["id"].")' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline text-xs'>Edit</button>";
                    echo "<button onclick='deleteProduct(".$row["id"].")' class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline text-xs'>Delete</button>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            } else {
                echo "<p class='text-gray-500'>No products found</p>";
            }
            ?>

            <h2 id="logout" class="text-3xl font-semibold text-gray-800 mt-8 mb-4">Logout</h2>
             <p class='text-gray-700'>Click the button below to log out.</p>
            <a href="logout.php" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4 inline-block">Logout</a>

        </main>
    </div>

    <script>
        function showMessage(message, type = 'success') {
            const messageBox = document.getElementById('message-box');
            messageBox.textContent = message;
            messageBox.className = `fixed top-4 left-1/2 transform -translate-x-1/2 bg-${type === 'success' ? 'green' : 'red'}-100 text-${type === 'success' ? 'green' : 'red'}-700 border border-${type === 'success' ? 'green' : 'red'}-400 px-4 py-2 rounded shadow-md z-50`;
            messageBox.classList.add('show');
            setTimeout(() => {
                messageBox.classList.remove('show');
            }, 3000);
        }



        function editUser(id) {
            // Implement edit user functionality here
            // For example, you can use a modal or redirect to an edit page
            // alert("Edit user with ID: " + id);
             window.location.href = "edit_user.php?id=" + id;
        }

        function deleteUser(id) {
            // Implement delete user functionality here
            if (confirm("Are you sure you want to delete user with ID: " + id + "?")) {
                // Use AJAX to call a PHP script to delete the user
                fetch('delete_user.php?id=' + id, {
                    method: 'GET',
                })
                .then(response => {
                    if (response.ok) {
                        // Reload the page or update the table dynamically
                        // window.location.reload();
                        showMessage('User deleted successfully!', 'success');
                        // Remove the row from the table
                        const row = document.querySelector(`td:first-child[textcontent="${id}"]`).parentNode;
                        row.remove();

                    } else {
                        showMessage('Failed to delete user.', 'error');
                    }
                })
                .catch(error => {
                    showMessage('Error: ' + error, 'error');
                });
            }
        }

        function editOrder(id) {
            // Implement edit order functionality here
            // alert("Edit order with ID: " + id);
            window.location.href = "edit_order.php?id=" + id;
        }

       function deleteOrder(id) {
            // Implement delete order functionality here
            if (confirm("Are you sure you want to delete order with ID: " + id + "?")) {
                // Use AJAX to call a PHP script to delete the order
                fetch('delete_order.php?id=' + id, {
                    method: 'GET',
                })
                .then(response => {
                    if (response.ok) {
                        showMessage('Order deleted successfully!', 'success');
                        const row = document.querySelector(`td:first-child[textcontent="${id}"]`).parentNode;
                        row.remove();
                    } else {
                         showMessage('Failed to delete order.', 'error');
                    }
                })
                .catch(error => {
                    showMessage('Error: ' + error, 'error');
                });
            }
        }

        function editProduct(id) {
            // Implement edit product functionality here
            // alert("Edit product with ID: " + id);
            window.location.href = "edit_product.php?id=" + id;
        }

        function deleteProduct(id) {
            // Implement delete product functionality here
            if (confirm("Are you sure you want to delete product with ID: " + id + "?")) {
                // Use AJAX to call a PHP script to delete the product
                fetch('delete_product.php?id=' + id, {
                    method: 'GET',
                })
                .then(response => {
                    if (response.ok) {
                        showMessage('Product deleted successfully!', 'success');
                        const row = document.querySelector(`td:first-child[textcontent="${id}"]`).parentNode;
                        row.remove();
                    } else {
                        showMessage('Failed to delete product.', 'error');
                    }
                })
                .catch(error => {
                     showMessage('Error: ' + error, 'error');
                });
            }
        }
    </script>

</body>
</html>

<?php
//logout.php
if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$conn->close();
?>

<?php
// delete_user.php
if (isset($_GET['id'])) {
    $delid = $_GET['id'];
    $sql = "DELETE FROM users WHERE id='$delid'";
    if ($conn->query($sql) === TRUE) {
       // echo "User deleted successfully"; // No output here, handled by JS
    } else {
        echo "Error deleting record: " . $conn->error; //  No output here, handled by JS
    }
    exit; // Important: Stop further execution to prevent HTML output
}

// delete_order.php
if (isset($_GET['id'])) {
    $delid = $_GET['id'];
    $sql = "DELETE FROM orders WHERE id='$delid'";
    if ($conn->query($sql) === TRUE) {
        //echo "Order deleted successfully";  // No output here, handled by JS
    } else {
        echo "Error deleting record: " . $conn->error; //  No output here, handled by JS
    }
    exit;
}

// delete_product.php
if (isset($_GET['id'])) {
    $delid = $_GET['id'];
    $sql = "DELETE FROM products WHERE id='$delid'";
    if ($conn->query($sql) === TRUE) {
       // echo "Product deleted successfully";  // No output here, handled by JS
    } else {
        echo "Error deleting record: " . $conn->error; //  No output here, handled by JS
    }
    exit;
}

//edit_user.php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
     $sql = "SELECT * FROM users WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
         echo '<div class="flex items-center justify-center h-screen bg-gray-100">
                    <form method="post" action="update_user.php" class="bg-white rounded-lg shadow-md p-8 w-80">
                        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit User</h2>
                        <input type="hidden" name="id" value="'.$row["id"].'">
                        <div class="mb-4">
                            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                            <input type="text" name="username" id="username" value="'.$row["username"].'" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                            <input type="email" name="email" id="email" value="'.$row["email"].'" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                            Update User
                        </button>
                         <a href="admin_dashboard.php" class="mt-4 inline-block text-gray-600 hover:text-gray-800 text-sm">Cancel</a>
                    </form>
                </div>';
         exit;

    }else{
        echo "User not found";
        exit;
    }
}

//update_user.php
if(isset($_POST['id']) && isset($_POST['username']) && isset($_POST['email'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
     $sql = "UPDATE users SET username='$username', email='$email' WHERE id='$id'";
      if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='admin_dashboard.php';</script>";
        exit;
      }else{
        echo "error";
        exit;
      }
}



//edit_order.php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
     $sql = "SELECT * FROM orders WHERE id='$id'";
    $result =$conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
         echo '<div class="flex items-center justify-center h-screen bg-gray-100">
                    <form method="post" action="update_order.php" class="bg-white rounded-lg shadow-md p-8 w-80">
                        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Order</h2>
                        <input type="hidden" name="id" value="'.$row["id"].'">
                        <div class="mb-4">
                            <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">User ID</label>
                            <input type="text" name="user_id" id="user_id" value="'.$row["user_id"].'" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" readonly>
                        </div>
                        <div class="mb-6">
                            <label for="order_date" class="block text-gray-700 text-sm font-bold mb-2">Order Date</label>
                            <input type="date" name="order_date" id="order_date" value="'.$row["order_date"].'" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                         <div class="mb-6">
                            <label for="total_amount" class="block text-gray-700 text-sm font-bold mb-2">Total Amount</label>
                            <input type="number" name="total_amount" id="total_amount" value="'.$row["total_amount"].'" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                            Update Order
                        </button>
                         <a href="admin_dashboard.php" class="mt-4 inline-block text-gray-600 hover:text-gray-800 text-sm">Cancel</a>
                    </form>
                </div>';
         exit;

    }else{
        echo "Order not found";
        exit;
    }
}

//update_order.php
if(isset($_POST['id']) && isset($_POST['user_id']) && isset($_POST['order_date']) && isset($_POST['total_amount'])){
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $order_date = $_POST['order_date'];
    $total_amount = $_POST['total_amount'];
     $sql = "UPDATE orders SET user_id='$user_id', order_date='$order_date', total_amount='$total_amount' WHERE id='$id'";
      if ($conn->query($sql) === TRUE) {
         echo "<script>window.location.href='admin_dashboard.php';</script>";
        exit;
      }else{
        echo "error";
        exit;
      }
}


//edit_product.php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
     $sql = "SELECT * FROM products WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
         echo '<div class="flex items-center justify-center h-screen bg-gray-100">
                    <form method="post" action="update_product.php" class="bg-white rounded-lg shadow-md p-8 w-80">
                        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Product</h2>
                        <input type="hidden" name="id" value="'.$row["id"].'">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Product Name</label>
                            <input type="text" name="name" id="name" value="'.$row["name"].'" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-6">
                            <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantity</label>
                            <input type="number" name="quantity" id="quantity" value="'.$row["quantity"].'" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                         <div class="mb-6">
                            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                            <input type="number" name="price" id="price" value="'.$row["price"].'" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                            Update Product
                        </button>
                         <a href="admin_dashboard.php" class="mt-4 inline-block text-gray-600 hover:text-gray-800 text-sm">Cancel</a>
                    </form>
                </div>';
         exit;

    }else{
        echo "Product not found";
        exit;
    }
}

//update_product.php
if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['quantity']) && isset($_POST['price'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
     $sql = "UPDATE products SET name='$name', quantity='$quantity', price='$price' WHERE id='$id'";
      if ($conn->query($sql) === TRUE) {
         echo "<script>window.location.href='admin_dashboard.php';</script>";
        exit;
      }else{
        echo "error";
        exit;
      }
}
?>
