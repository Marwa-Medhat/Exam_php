<?php
session_start();  //start session
//config file
require_once "config.php";
//interfaces
require_once "classes/Exam_interface.php";
require_once "classes/Question_interface.php";
//helper files
require_once "classes/Helper.php";
//concrete classes
require_once "classes/MCQuestion.php";
require_once "classes/TrueOrFalseQuestion.php";
require_once "classes/Exam.php";
require_once "classes/Answer.php";

