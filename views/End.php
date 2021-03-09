<html>
    <?php
    unset($_SESSION['page_no']);  //to destory specified variable
      session_unset();
      session_destroy(); //destory all data associated with current session
    
     $no_wrong_answer=$Ans->checkAnswers(); //to get number of wrong answer
   
    ?>
    <head>
        <style>
            body{
                background-color: #333;  
                margin: 0px;
                padding: 0px;
            }
            center{
              
                color: red;
            }
            h2,h3
            {
                color:black;
            }
            .question{
                font-size: 3erm;
                color: black;
                text-align:center;
            }
            .correctAns{
                font-size: 2erm;
                color: black;
                text-align:center;
            }
            .studentAns{
                font-size: 2erm;
                color: red;
                text-align:center;
            }
            .container{
                margin: 10px;
                background-color: #555;
                padding: inherit;
                border-style:solid;
                border-color:black;
                border-width:2px; 
                
            }
            h1
            {
                color:#228B22;
                /* font-size:bold; */
            }
        </style>
    </head>
    <body>
    <div class='container'>
    <center>
        <h2> Exam Results </h2>
        <!-- <h3>Youre score: <?php echo 5-$no_wrong_answer?> / 5 </h3> -->
        <!-- <h4>Number of wrong answers : <?php echo $no_wrong_answer?></h4> -->
        <!-- <h5>Number of correct answers : <?php echo 5-$no_wrong_answer?></h4> -->
            <?php
                 if($no_wrong_answer == 0)
                 {
                     echo "<h1> congratulations !! </h1>";
                 }
                 else
                 {
                     echo "<h4>Number of wrong answers :". $no_wrong_answer ."</h4>";
                 }

            ?>
     </center>
        <?php
    //loop on wrong answer file it contain  questions && student answers  && correct answers     
        $lines = file(wrong_answers_file);
        foreach ($lines as $line) {
            echo "<div class='bord'>";
            if (substr($line, 0, 1) === "Q") //if line start with Q so it's question 
            {
                echo"<div class='question'>$line</div>";
            }
            if (substr($line, 0, 1) === "Y")   //if line start with Y Your answer so it's student answer 
            {
                echo"<div class='studentAns'>$line</div>";
            }
            if (substr($line, 0, 1) === "C")   //if line start with C Correct answer so it's correct answer 
            {
                echo"<div class='correctAns'><mark>$line</mark></div><br><hr style='margin:10px'><br>";
            }
            echo "</div> ";
        }
        // Write the contents back to the file
        file_put_contents(wrong_answers_file, "") ;
        file_put_contents(student_answers_file, "") ;
        ?>
    </div>
    </body>
    
    
</html>

