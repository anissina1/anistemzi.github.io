<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Quiz</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<div class="card" style="width: 70rem; margin: 0 auto ;box-shadow: 7px 7px 5px black; float: none;margin-top: 1.5rem ;margin-bottom: 1.5rem ; border-radius: 1.5rem;">
<style>   
    body {
    background-color: rgb(207, 227, 240);
    text-align:center;
    align:center;
    }
   #score{
    margin-top: 6rem;
}
 
    </style>
<?php 

$Questions = [
    1 => [
        'Question' => '1. Quel pays a remporté la toute première Coupe du monde en 1930 ?',
        'type'=>'radio',
        'Answers' => [
            'A' => 'Brésil',
            'B' => 'Uruguay',
            'C' => 'Pays-bas'
        ],
        'CorrectAnswer' => 'B'
        ],
    2 => [
        'Question' => "2. Avec 260 buts, qui est le meilleur buteur de l'histoire de la Premier League ?",
        'type'=>'select',
        'Answers' => [
            'A' => 'Alan Shearer',
            'B' => 'Sergio aguero',
            'C' => 'Didier Drogba'
        ],
        'CorrectAnswer' => 'A'
        ],
    3 => [
        'Question' => '3. Quel club a remporté le plus grand nombre de Champions League ?',
        'type'=>'radio',
        'Answers' => [
            'A' => 'Barcelona',
            'B' => 'Real Madrid',
            'C' => 'bayern munich'
        ],
        'CorrectAnswer' => 'B'
        ],
    4 => [
        'Question' => '4. Combien de club participe au phase de groupe en ligue des champions',
        'type'=>'text',
        'CorrectAnswer' => '32'
    ],
    5 => [
        'Question' => '5. Quel club a remporté 6 trophées de Champions League ?',
        'type'=>'checkbox',
        'Answers' => [
            'A' => 'Liverpool',
            'B' => 'Ac Milan',
            'C' => 'Man United'
        ],
        'CorrectAnswer' => 'A'
        ],
    6 => [
        'Question' => '6. Quelle équipe a remporté le premier titre de Premier League ?',
        'type'=>'select',
        'Answers' => [
            'A' => 'Arsenal',
            'B' => 'Man United',
            'C' => 'Liverpool',
        ],
        'CorrectAnswer' => 'B'
        ],
    7 => [
        'Question' => "7. Quel pays a participé à trois finales de Coupe du monde, mais n'a jamais remporté la compétition ?",
        'type'=>'checkbox',
        'Answers' => [
            'A' => 'Pays-bas',
            'B' => 'Argentine',
            'C' => 'Portugal'
        ],
        'CorrectAnswer' => 'A'
        ],
    8 => [
        'Question' => "8. Messi a remporté un nombre record de Ballon d'Or - combien ?",
        'type'=>'text',
        'CorrectAnswer' => '7'
    ],
    9 => [
        'Question' => '9. Quel joueur a marqué le triplé le plus rapide de la Premier League ? ',
        'type'=>'radio',
        'Answers' => [
            'A' => 'Didier Drogba',
            'B' => 'Cristiano Ronaldo',
            'C' => 'Sadio Mané'
        ],
        'CorrectAnswer' => 'C'
        ],
    10 => [
        'Question' => "10. Quel est le joueur le plus jeune à avoir obtenu le Ballon d'Or ? ",
        'type'=>'checkbox',
        'Answers' => [
            'A' => 'Ronaldo (Brésilien)',
            'B' => 'Lionel Messi',
            'C' => 'Michael Owen'
        ],
        'CorrectAnswer' => 'A'
        ],
        ];
$total = count($Questions);


if (isset($_POST['answers'])){
    $Answers = $_POST['answers']; 
    $counter = isset($_POST['counter']) ? $_POST['counter'] : 0;

    foreach ($Questions as $QuestionNo => $Value){
        
        if ($Answers[$QuestionNo] == $Value['CorrectAnswer']){
            $counter++;
           }
          }  ?><h1 id="score"><?php echo "Votre score est: ".$counter."/".$total."<br><br><br>";?> </h1><?php 
          if($counter == $total){
            ?><h4> <?php echo '<span style="color: green;"> Bravo! toutes vos réponses sont correctes. <br><br>';}?></h4>
           <?php 
     foreach ($Questions as $QuestionNo => $Value){
        if ($Answers[$QuestionNo] != $Value['CorrectAnswer']){
            ?><h6><?php echo ' <span style="color: red;"> Question '.$QuestionNo.'</span><br>';?></h6> <?php
          }  }    
                                                 
} else {  
?><div class="card-body"><br><br><br>
<h1 style="color:#0d6efd">Quiz</h1><br><br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="quiz">
    <?php foreach ($Questions as $QuestionNo => $Value){
        echo "<br><br>";?>
        <h4><b><?php echo $Value['Question']; ?></b></h4><br>
        <?php 
           if($Value['type']=='radio'){
            foreach ($Value['Answers'] as $Letter => $Answer){ 
            $Label = 'question-'.$QuestionNo.'-answers-'.$Letter;
        ?>
        <div class="form-check">
            <input type="radio" name="answers[<?php echo $QuestionNo; ?>]" id="<?php echo $Label; ?>" value="<?php echo $Letter; ?>" />
            <label for="<?php echo $Label; ?>"><?php echo $Answer; ?> </label>
            </div>
        <?php } }
        if($Value['type']=='checkbox'){
            foreach ($Value['Answers'] as $Letter => $Answer){ 
            $Label = 'question-'.$QuestionNo.'-answers-'.$Letter;
        ?>
        <div>
            <input type="checkbox" name="answers[<?php echo $QuestionNo; ?>]" id="<?php echo $Label; ?>" value="<?php echo $Letter; ?>" />
            <label for="<?php echo $Label; ?>"><?php echo $Answer; ?> </label>
            </div>
        <?php } }
        if($Value['type']=='text'){
            ?>
        <div>
                <input type="text" name="answers[<?php echo $QuestionNo; ?>]" id="<?php echo $Label; ?>"  />
                <label for="<?php echo $Label; ?>"> </label>
                </div>
            <?php }
            if($Value['type']=='select'){ ?>
                <select name="answers[<?php echo $QuestionNo; ?>]" size= "3">
                <?php
               foreach ($Value['Answers'] as $Letter => $Answer){ 
             
        ?>
         <option value="<?php echo $Letter; ?>" ><?php echo $Answer; ?></option>
      <?php
      }
      ?>
    </select>       
    <?php } } ?>
    <br><br>
    <div class="btn">
    <input type="reset" value="Réinitialiser" class="btn btn-secondary">
    <input type="submit" value="Voir les résultats" class="btn btn-primary"/></div>
    <br><br>
    </form>
<?php 
}
?>  </div>
</div>
</body>
</html>