<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
      //question
      $answer = true;
      if($answer){
        echo "yes";       
      } 
      else{
        echo "no";
      } 
      // comparison
      // ==  compare value
      // === compare value and type
      // < >= ! 
      
      
      
      // combinator <=>
      $a = 17;
      $b = 14;
      // switch       
        switch($a <=> $b){
            case -1:
                echo "A inferior to B";
                break;
            case 0:
                echo "A is qual to B";
                break;  
            case 1:
                echo "A superior to B";
        }
    ?>  

</body>
</html>