<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Lab No. 6 - Temp. Converter</title>
</head>

<body>

    <?php
    // function to calculate converted temperature
    function convertTemp($temp, $unit1, $unit2)
    {
        if (is_numeric($temp) && isset($unit1) && isset($unit2) && $unit1 != "--Select--" && $unit2 != "--Select--") {
            switch ($unit1) {
                case 'fahrenheit':
                    switch ($unit2) {
                        case 'fahrenheit':
                            $converted = $temp;
                            return $converted;
                            break;
                        case 'celsius':
                            $converted = ($temp - 32) / 1.8;
                            return $converted;
                            break;
                        case 'kelvin':
                            $converted = ($temp + 459.67) * (5/9);
                            return $converted;
                            break;
                    }
                    break;
                case 'celsius':
                    switch ($unit2) {
                        case 'fahrenheit':
                            $converted = $temp * 1.8 + 32;
                            return $converted;
                            break;
                        case 'celsius':
                            $converted = $temp;
                            return $converted;
                            break;
                        case 'kelvin':
                            $converted = $temp + 273.15;
                            return $converted;
                            break;
                    }
                    break;
                case 'kelvin':
                    switch ($unit2) {
                        case 'fahrenheit':
                            $converted = ($temp * 1.8 ) - 459.67;
                            return $converted;
                            break;
                        case 'celsius':
                            $converted = $temp - 273.15;
                            return $converted;
                            break;
                        case 'kelvin':
                            $converted = $temp;
                            return $converted;
                            break;
                    }
                    break;
                
                
            }
        }
        // conversion formulas
        // Celsius to Fahrenheit = T(°C) × 9/5 + 32
        // Celsius to Kelvin = T(°C) + 273.15
        // Fahrenheit to Celsius = (T(°F) - 32) × 5/9
        // Fahrenheit to Kelvin = (T(°F) + 459.67)× 5/9
        // Kelvin to Fahrenheit = T(K) × 9/5 - 459.67
        // Kelvin to Celsius = T(K) - 273.15

        // You need to develop the logic to convert the temperature based on the selections and input made

    } // end function

    // Logic to check for POST and grab data from $_POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Store the original temp and units in variables
        // You can then use these variables to help you make the form sticky
        // then call the convertTemp() function
        // Once you have the converted temperature you can place PHP within the converttemp field using PHP
        // I coded the sticky code for the originaltemp field for you

        $originalTemperature = $_POST['originaltemp'];
        $originalUnit = $_POST['originalunit'];
        $conversionUnit = $_POST['conversionunit'];
        $convertedTemp = convertTemp($originalTemperature, $originalUnit, $conversionUnit);
    } else {
        $convertedTemp = "";
    }// end if

    ?>
    <!-- Form starts here -->
    <h1>Temperature Converter</h1>
    <h4>CTEC 127 - PHP with SQL 1</h4>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <div class="group">
            <label for="temp">Temperature</label>
            <input type="text" value="<?php if (isset($_POST['originaltemp'])) {
                                            echo $_POST['originaltemp'];
                                        }
                                        ?>" name="originaltemp" size="14" maxlength="7" id="temp">

            <select name="originalunit">
                <option value="--Select--" <?php if (isset($_POST['originalunit']) && $_POST['originalunit'] == "--Select--") {
                                            echo "Selected";
                                        }
                                        ?>>--Select--</option>
                <option value="celsius" <?php if (isset($_POST['originalunit']) && $_POST['originalunit'] == "celsius") {
                                            echo "Selected";
                                        }
                                        ?>>Celsius</option>
                <option value="fahrenheit" <?php if (isset($_POST['originalunit']) && $_POST['originalunit'] == "fahrenheit") {
                                            echo "Selected";
                                        }
                                        ?>>Fahrenheit</option>
                <option value="kelvin" <?php if (isset($_POST['originalunit']) && $_POST['originalunit'] == "kelvin") {
                                            echo "Selected";
                                        }
                                        ?>>Kelvin</option>
            </select>
        </div>

        <div class="group">
            <label for="convertedtemp">Converted Temperature</label>
            <input type="text" value="<?php echo $convertedTemp;?>" name="convertedtemp" size="14" maxlength="7" id="convertedtemp" readonly>

            <select name="conversionunit">
                <option value="--Select--" <?php if (isset($_POST['conversionunit']) && $_POST['conversionunit'] == "--Select--") {
                                            echo "Selected";
                                        }
                                        ?>>--Select--</option>
                <option value="celsius" <?php if (isset($_POST['conversionunit']) && $_POST['conversionunit'] == "celsius") {
                                            echo "Selected";
                                        }
                                        ?>>Celsius</option>
                <option value="fahrenheit" <?php if (isset($_POST['conversionunit']) && $_POST['conversionunit'] == "fahrenheit") {
                                            echo "Selected";
                                        }
                                        ?>>Fahrenheit</option>
                <option value="kelvin" <?php if (isset($_POST['conversionunit']) && $_POST['conversionunit'] == "kelvin") {
                                            echo "Selected";
                                        }
                                        ?>>Kelvin</option>
            </select>
        </div>
        <input type="submit" value="Convert" />
    </form>

</body>

</html>