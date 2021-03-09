<?php
require_once "autoload.php";
try {
    $exam = new Exam();
    $Ans = new Answer();
    
      $current_page=1;
    if(!isset($_SESSION['page_no'])) //if page_number not declare make it 1
        {
              $_SESSION['page_no'] = 1;
             $current_page=$_SESSION['page_no'];
            
        }
     if(isset($_POST['submit'])){
            //if press next button so increament with 1
             if ($_POST['submit']=='Next') 
            { 
                $_SESSION['page_no'] ++; 
                 $current_page=$_SESSION['page_no'];
            }
            //if press prev button so decreament with 1
           else if($_POST['submit']=='Previous' &&  $_SESSION['page_no'] != 1)
            {
                //but check if page_no less than or equal zero == greater than one so let value with one if not making decreament as usual 
                $_SESSION['page_no'] =(--$_SESSION['page_no'])>1?$_SESSION['page_no']:1; 
                $current_page=$_SESSION['page_no'];
            }
        }
            
        $question_num=$_SESSION['page_no']-1;
        $fp = fopen(student_answers_file, 'a');//append in file
        fwrite($fp,$_REQUEST['question']); //write question in file 
       if(strlen($_REQUEST['answer'])>0){ //student answer the question (select option) 
        if($_REQUEST['answer']=="True"||$_REQUEST['answer']=="False"){
                //if select value True or False write it and EOL
            fwrite($fp,"*".$_REQUEST['answer']);
            fwrite($fp,PHP_EOL);
            }
            else{
             //if select value of MCQ question
           fwrite($fp,"*".$_REQUEST['answer']); 
             }
       }
     else if(strlen($_REQUEST['answer'])==0){ // student didn't answer question
         fwrite($fp,"*"."\n");
     }
    fclose($fp);
    $current_page=($current_page >=1)?$current_page:1;
    if ($current_page == $exam->getQuestion_number()+1) {
        //if it's last Question will appear END view 
        include_once("views/End.php");
        exit();
    } else {
        //count array of questions if count less than total numer of Questions (it's not last Question) so load page
        $current_question = $exam->load_exam_page($current_page);
    }
} catch (Exception $ex) {
        //Mode Production So error view will appear
    if (mode === "production") {
        include("views/error.php");
        exit();
    } else {
        //if development mode appper history if error
        echo $ex->getMessage();
        echo $ex->getTraceAsString();
        exit();
    }
}
?>




<html>
    <?php include "views/header.php"; ?>
    <body>
        <?php include "views/questions.php"; ?>
    </body>
</html>