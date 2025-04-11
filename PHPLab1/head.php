<?php // Removed include 'head.php'; ?>

    <div class="form-container">
        <!-- Add the image at the top -->
        <img src="service.jpg" alt="Service Logo" class="header-image">

        <h1>Welcome to IMSA Auto Parts</h1>

        <form action="#" method="post">
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

    <style>
        body {
            background-color: orange;
            font-family: 'Roboto', sans-serif;
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

        input[type="submit"]:hover {
            background-color: #ffaa00;
        }
    </style>

</body>
</html>