<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php


foreach($oneMovie->getActeur() as $acteur) {
    echo $acteur->getId().'   '.$acteur->getlastName().'   '.$acteur->getfirstName().'</br>';
}

?>


</body>
</html>