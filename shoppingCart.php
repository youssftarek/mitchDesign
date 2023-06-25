<?php
// Start the session
session_start();

// Connect to the database
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'egyhardware');
$sql = "SELECT * FROM products WHERE featured = 1";
$featured = $con->query($sql);

// Check for errors
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if the form was submitted
if (isset($_POST['add_to_cart'])) {
    // Get the product data from the products table
    $sql1 = "SELECT * FROM products WHERE id = ?";
    $stmt1 = $con->prepare($sql1);
    $stmt1->bind_param("i", $_POST['product_id']);
    $stmt1->execute();
    $result = $stmt1->get_result();
    $data = $result->fetch_assoc();

    // Add the product to the shopping cart
    $item_array = array(
        'product_id' => $_POST['product_id'],
        'name' => $data['name'],
        'price' => $data['price'],
        'quantity' => $_POST['quantity']
    );
    $_SESSION['shopping_cart'][] = $item_array;

    // Close the prepared statements and database connection
    $stmt1->close();
    $conn->close();

    // Redirect to the shopping cart page
    header("Location: shopping_cart.php");
    exit();
}
?>

<!-- HTML form to collect data from the user -->
<form method="post">
    <input type="hidden" name="product_id" value="<?= $products['id'];?>">
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" value="1">
    <button type="submit" name="add_to_cart">Add to Cart</button>
</form>