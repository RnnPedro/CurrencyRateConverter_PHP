

<?php
    include 'country-list.php';

    $selectedFrom = 'NZD';
    $selectedTo   = 'BRL';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Currency Converter</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class ="wrapper">
        <header>Currency Converter</header>
        <form id="myForm">
            <div>
                <p>Enter Amount</p>
                <input type="text" name="amount" value="1">
            </div>
            <div class="from-to">
                <div class="from">
                    <p>From</p>
                    <div class="select-box">
                        <select name="select_from">
                            <?php foreach ($country_list as $value) { ?>
                                <option value="<?php echo $value; ?>" <?php echo ($value === $selectedFrom) ? 'selected' : ''; ?>>
                                    <?php echo $value; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="to">
                    <p>To</p>
                    <div class="select-box">
                        <select name="select_to">
                            <?php foreach ($country_list as $value) { ?>
                                <option value="<?php echo $value; ?>" <?php echo ($value === $selectedTo) ? 'selected' : ''; ?>>
                                    <?php echo $value; ?>
                                </option>
                            <?php   }?>
                        </select>
                    </div>
                </div>
            </div>
            <button name="submit">Convert</button>
            <div id="result"></div>
        </form>
    </div>

    <script>
        $('#myForm').submit(
            function(event) {
                
                event.preventDefault();
                var formData = $(this).serialize();

                $('#result').text("Converting... Please wait!");

                $.ajax({
                    url: 'convert.php',
                    type: 'POST',
                    data: formData,
                    success: function(response){
                        $('#result').text(response);
                    }
                })

            }
        );
    </script>
</body>
</html>