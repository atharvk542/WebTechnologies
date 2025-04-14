
<!DOCTYPE html>
<html>
<head>
    <title>PHP Lab </title>
<style>
    body {
            background-color: orange;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .header-image {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            display: block;
        }

        .form-container {
            background-color: black;
            color: orange;
            padding: 30px;
            margin: 30px auto;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            font-family: 'Georgia', serif;
            font-size: 2em;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid orange;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: orange;
            color: black;
            font-weight: bold;
        }

        td {
            color: orange;
        }

        input[type="text"] {
            width: 80%;
            padding: 5px;
            border: none;
            border-radius: 4px;
        }

        input[type="submit"] {
            margin-top: 20px;
            width: 100%;
            background-color: orange;
            color: black;
            font-weight: bold;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
</style>
</head>
<body>
<?php include 'head.php'; ?>

<div class="form-container">
    <h1>Welcome to IMSA Auto Parts</h1>
    <form action="PHPLab.php" method="POST">
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tires</td>
                    <td><input type="text" name="tires_qty"></td>
                    <td>$75.56</td>
                </tr>
                <tr>
                    <td>Oil</td>
                    <td><input type="text" name="oil_qty"></td>
                    <td>$25.89</td>
                </tr>
                <tr>
                    <td>Spark Plugs</td>
                    <td><input type="text" name="spark_qty"></td>
                    <td>$49.99</td>
                </tr>
            </tbody>
        </table>
        <input type="submit" value="Submit Order">
    </form>
</div>

<?php
// Check if the form was submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve the form data and trim any extra whitespace.
    $tires_qty = isset($_POST['tires_qty']) ? trim($_POST['tires_qty']) : "";
    $oil_qty   = isset($_POST['oil_qty']) ? trim($_POST['oil_qty']) : "";
    $spark_qty = isset($_POST['spark_qty']) ? trim($_POST['spark_qty']) : "";

    // Convert empty or zero values to 0.
    $tires_qty = ($tires_qty === "" || $tires_qty == 0) ? 0 : (int)$tires_qty;
    $oil_qty   = ($oil_qty === ""   || $oil_qty == 0)   ? 0 : (int)$oil_qty;
    $spark_qty = ($spark_qty === "" || $spark_qty == 0) ? 0 : (int)$spark_qty;

    // Check if no items were ordered.
    if ($tires_qty === 0 && $oil_qty === 0 && $spark_qty === 0) {
        echo "<p>You didn’t buy anything from IMSA Auto Parts.</p>";
        exit;
    }

    // Validate that no more than 4 tires are selected.
    if ($tires_qty > 4) {
        echo "<p>You cannot order more than 4 tires.</p>";
        exit;
    }

    // Set the fixed prices for the items.
    $price_tires = 75.56;
    $price_oil   = 25.89;
    $price_spark = 49.99;

    // Calculate the cost for each item.
    $total_tires = $tires_qty * $price_tires;
    $total_oil   = $oil_qty   * $price_oil;
    $total_spark = $spark_qty * $price_spark;

    // Calculate the total before tax.
    $total_before_tax = $total_tires + $total_oil + $total_spark;

    // Calculate the sales tax (10%).
    $tax = $total_before_tax * 0.10;

    // Calculate the total after tax.
    $total_after_tax = $total_before_tax + $tax;

    // Round the totals to two decimal places.
    $total_before_tax = number_format($total_before_tax, 2, '.', '');
    $tax              = number_format($tax, 2, '.', '');
    $total_after_tax  = number_format($total_after_tax, 2, '.', '');

    // Output the order summary with blank lines for readability.
    echo "<h1>Order Summary</h1>";
    echo "<pre>\n";
    if ($tires_qty > 0) {
        echo "Tires:       $tires_qty @ \$$price_tires each = \$" . number_format($total_tires, 2, '.', '') . "\n\n";
    }
    if ($oil_qty > 0) {
        echo "Oil:         $oil_qty @ \$$price_oil each = \$" . number_format($total_oil, 2, '.', '') . "\n\n";
    }
    if ($spark_qty > 0) {
        echo "Spark Plugs: $spark_qty @ \$$price_spark each = \$" . number_format($total_spark, 2, '.', '') . "\n\n";
    }
    echo "Total before tax: \$$total_before_tax\n\n";
    echo "Sales Tax (10%):  \$$tax\n\n";
    echo "Total after tax:  \$$total_after_tax\n";
    echo "</pre>";
}
?>
