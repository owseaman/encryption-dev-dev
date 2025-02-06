<?php
include('../lib/encryption.php');

if(isset($_POST['action'])){
    $key = $_POST['key'];
    $payload = $_POST['payload'];

    $garble = encrypt($key, $payload);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
    <title>Encryption app</title>
</head>

<body>
    <div id="app">
        <header>
            <h2>C2 Encryption</h2>
        </header>

        <main>
            <div id="encrypt">
                    <form action="" method="post">
                        <label for="fname">Key:</label><br>
                        <input type="text" id="key" name="key" value="<?php echo $key?>"><br>
                        <label for="payload">Payload:</label><br>
                        <textarea id="payload" name="payload" rows="10" cols="70"><?php echo $payload?></textarea><br>

                        <input type="hidden" name="action" value="encrypt">
                        <input type="submit" value="Submit">
                    </form> 
            </div>

            <div id="garble">
                <h2>Encrypted payload</h2>
                <p>
                <?php 
                if(isset($garble)){
                    echo "$garble";
                }
                ?>
                </p>
            </div>
        </main>
    </div>
</body>

</html>
