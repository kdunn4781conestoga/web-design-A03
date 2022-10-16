<!-- FILE          : animals.php -->
<!-- PROJECT       : Assignment 3 -->
<!-- PROGRAMMER    : David Czachor -->
<!-- FIRST VERSION : 2022-10-11 -->
<!-- PURPOSE       : This program uses PHP to display an animal 
                     from what was sent through the POST request -->
<!DOCTYPE html>
  <html>
    <head>
        <title>The Zoo</title>

        <style>
            img {
                float: left;
                padding-right: 10px;
            }
        </style>    
    </head>

    <body>
<?php 
	$username = $_POST['username']; // Username through post
	$animal = $_POST['animal']; // Animal through post
    define("UNABLE_TO_OPEN", "Unable to open file!"); // Constant for unable to open file

    switch ($animal) { // Case statement to display picture/text depending on what animal is chosen
        case 'dolphin':
            $animalPicture = './theZoo/dolphin.jpg';
            $animalTextFile = fopen('./theZoo/dolphin.txt', 'r') or die(UNABLE_TO_OPEN);
            break;
        case 'giraffe':
            $animalPicture = './theZoo/giraffe.jpg';
            $animalTextFile = fopen('./theZoo/giraffe.txt', 'r') or die(UNABLE_TO_OPEN);
            break;
        case 'lion':
            $animalPicture = './theZoo/lion.jpg';
            $animalTextFile = fopen('./theZoo/lion.txt', 'r') or die(UNABLE_TO_OPEN);
            break;
        case 'monkey':
            $animalPicture = './theZoo/monkey.jpg';
            $animalTextFile = fopen('./theZoo/monkey.txt', 'r') or die(UNABLE_TO_OPEN);
            break;
        case 'polarBear':
            $animalPicture = './theZoo/polarBear.jpg';
            $animalTextFile = fopen('./theZoo/polarBear.txt', 'r') or die(UNABLE_TO_OPEN);
            break;
        case 'zebra':
            $animalPicture = './theZoo/zebra.jpg';
            $animalTextFile = fopen('./theZoo/zebra.txt', 'r') or die(UNABLE_TO_OPEN);
            break;
    }

    if(empty($username) || empty($animal)) {
        echo "Incorrect data inputted";
    }
    else { ?>
        <h2>Hi <? echo $username ?>, your animal is a <? echo $animal ?>.</h2> 

        <br/><br/>
        <div>
            <img src="<?=$animalPicture ?>" alt="test" width = '400' height = '400'/> 
            <? while (!feof($animalTextFile)) { // Reads text file
            echo fgets($animalTextFile); // Prints text file
            }
            fclose($animalTextFile); ?>
        </div>
     <?php } ?>

    </body>
</html>