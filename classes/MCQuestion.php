<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of question
 *
 * @author memad
 */
class MCQuestion {
    private $question;
    private $options;
   //pass question in constructor (parameterized constructor)
    public function __construct($question){
        $this->question = $question;
    }
    
    
    
    function get_question() {
        return $this->question;
    }

    function get_options() {
        return $this->options;
    }
    
    //add option as we have 4 options   
    function Add_an_Option($option) {
        $this->options[] = $option;
    }


   
}
