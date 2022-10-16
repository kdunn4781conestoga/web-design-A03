<!DOCTYPE html>
  <html>
    <head>
      <title>The Zoo</title>
    </head>

    <body>
<?php 
	$username = $_POST['username'];
	$animal = $_POST['animal'];
    define("UNABLE_TO_OPEN", "Unable to open file!");

    switch ($animal) {
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
?>

	<h2>Hi, <? echo $username ?>, your animal is a <? echo $animal ?>.</h2>

    <style>
        img {
            float: left;
            padding-right: 10px;
        }
    </style>    

	<br/><br/>
        <div>
        <img src="<?=$animalPicture ?>" alt="test" width = '400' height = '400'/>
            <? while (!feof($animalTextFile)) {
            echo fgets($animalTextFile) . "<br>";
            }
            fclose($animalTextFile); ?>
        </div>
    </body>
</html>