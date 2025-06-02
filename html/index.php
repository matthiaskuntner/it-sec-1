<?php
$input_value = "";
if( $_SERVER["REQUEST_METHOD"] == "POST"){
    $_POST['item'] = 1;
}

if ( isset($_POST['item'])) {
    $input_value = $_POST["textfield"];
    
    // Check if the file exists and redirect to it
    if (!empty($input_value)) {
        $file_path = "products/" . $input_value . ".html";
        if (file_exists($file_path)) {
            echo file_get_contents($file_path);
        } else {
            $message = "File '" . htmlspecialchars($file_path) . "' not found.";?>
            <p style="color: red;"><?php echo $message; ?></p>
            <?php
        }
    }
}else{
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Form</title>
</head>
<body>
    <div>
        <form method="post" >
            <input type="text" name="textfield" placeholder="Enter filename (without .html)" value="<?php echo htmlspecialchars($input_value); ?>">
            <input type="submit" value="Open File">
        </form>
    </div>
    
    <?php if (isset($message)): ?>
        <p style="color: red;"><?php echo $message; ?></p>
    <?php endif; ?>
</body>
</html>

<?php }?>

