<?php
//Creation class View
Class View {
   

    //Methode
    public function displayHeader() {
        include 'View/header.php';
        displayHeader();
        return $this;
    }

    public function displayFooter() {
        include 'View/footer.php';
        displayFooter();
        return $this;
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>