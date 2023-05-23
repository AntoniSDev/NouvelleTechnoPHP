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
            
        /**
         * add
         *
         * @param  mixed $nb1
         * @param  mixed $nb2
         * @return void
         */
        function add($nb1, $nb2){
            return $nb1 + $nb2;
        }
        
        /**
         * hi
         *
         * @param  mixed $hello
         * @param  mixed $first_name
         * @param  mixed $last_name
         * @return void
         */
        function hi($hello, $first_name, $last_name){
            echo "$hello $first_name $last_name";
        }
    
        $total = add(18, 8);
        var_dump($total);
    ?>

    <p><?php echo add(12, 52); ?></p>
    <p><?php echo add(2, 5); ?></p>
    <p><?php echo add(72, 9); ?></p>

    <h1><?php hi("greetings", "mike", "kel")?></h1>
</body>
</html>