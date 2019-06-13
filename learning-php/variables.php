<html>
    <head>
<title>Variable in PHP</title>
    </head>
    <body>
        <?php
            /*
                All variables in PHP start with a $.
                Variables are "loosely typed" in PHP.
                The type of a variable is inferred from 
                the context:
            */
            $num1 = 12;      // an integer
            $num2 = 21.3;    // a floating point number
            
            // values of variables are interpolated when echoed
            echo "<h2>num1 is $num1, num2 is $num2</h2>";

            // all C-type operators are supported:
            $num1++;
            $num2 *= $num1;
            echo "<h2>num1 is $num1, num2 is $num2</h2>";

            // $num1 reassigned to a string (not a good practice...)
            $num1 = "Sani";
            echo "<h2>Hello, my name is $num1</h2>";    
        ?>
    </body>
</html>
