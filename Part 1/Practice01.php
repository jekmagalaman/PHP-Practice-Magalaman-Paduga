<!DOCTYPE html>
<html>
<head>
    <title>Triangle Area Calculator</title>
</head>
<body>
    <h2>Triangle Area Calculator</h2>
    <form method="POST">
        Side 1: <input type="number" name="side1" step="any" required><br>
        Side 2: <input type="number" name="side2" step="any" required><br>
        Side 3: <input type="number" name="side3" step="any" required><br>
        <input type="submit" name="calculate" value="Calculate Area">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST['side1'];
        $b = $_POST['side2'];
        $c = $_POST['side3'];
        
        $s = ($a + $b + $c) / 2;
        
        $areaSquared = $s * ($s - $a) * ($s - $b) * ($s - $c);
        
        if ($areaSquared > 0) {
            $x = $areaSquared;
            $y = 1;
            for ($i = 0; $i < 10; $i++) {
                $y = ($y + $x / $y) / 2;
            }
            
            echo "<h3>Triangle Area: " . number_format($y, 2) . " square units</h3>";
        } else {
            echo "<h3>Invalid triangle sides. Please enter valid values.</h3>";
        }
    }
    ?>
</body>
</html>
