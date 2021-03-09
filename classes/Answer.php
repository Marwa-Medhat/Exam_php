<?php
  
class Answer{
    private $question;
    private $answer;
    public function __construct(){}
    /*
        loop on student answer when find Q so it's question store it in Question array and set flag getquestion
        when find * so It's answer replace * with "" and save it answer and set flag get answer with true
        when two flags set so call fn get correct answer to take correct answer of specified question
        and return correct answer
        then compare correct answer with answer of student if wrong increase wronganswer with one 
        then write question and student answer and correct answer in file 

    */
    public function checkAnswers()
    { 
        $getQuestion=false; //flag to check that question get
        $getAnswer=false;    //flag to check that answer get
        $wronganwser=0;  
        $lines = file(student_answers_file);
        $questions = array(); //array of questions
        foreach ($lines as $line) {
           
            if (substr($line, 0, 1) === "Q"){
                $question=$line;
                $getQuestion=true;
            }
            else if(substr($line, 0, 1) === "*" && $getQuestion==true)
            {
                $answer=str_replace("*", "", $line);
                $getAnswer=true;
            }
             if($getQuestion==true && $getAnswer==true) 
            {
                $getQuestion=false;
                $getAnswer=false;
                $correctAnswer=$this->getCorrectAnswer($question,$answer);
               //if($returnAnswer!=$answer) {
               //if(!strcmp($returnAnswer,$answer)) {
                if($correctAnswer!=$answer)  {
                   $wronganwser++;
                    $fp = fopen(wrong_answers_file, 'a');
                    fwrite($fp,$question);
                    fwrite($fp,"Your answer : ".$answer."\n");
                    fwrite($fp,"Correct answer : ".$correctAnswer);
               }
            }
        }
        return  $wronganwser;
    }
    //take Question and get its correct answer 
    //flag=false when loop on file and find question set flag so the next iterate take its correct answer 
    //then make flag  with false again  
    private function getCorrectAnswer($question,$answer)
    {
       
        $this->question=$question;
        $this->answer=$answer;
        $specifiedQuestionFlag=false;
        $lines = file(answer_file);
        foreach ($lines as $line) {
            if($line ==$question){
                $specifiedQuestionFlag=true;
            }
            else if($specifiedQuestionFlag==true)
            {
                $$specifiedQuestionFlag=false;
                return $line;
            }
        }    
    }
}
