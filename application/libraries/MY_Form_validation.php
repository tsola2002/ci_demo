<?php
/**
 *
 * Package: ci_demo
 * Filename: MY_Form_validation.php
 * Author: solidstunna101
 * Date: 02/11/13
 * Time: 09:33
 *
 */

class MY_Form_validation extends CI_Form_validation {

    //when you extend an existing library you have to the prefix MY_ to the name of the file

    function test(){
        echo "testing extended for validation library";
    }

    //takes value of input & score frm validation check
    function strong_pass($value, $params){

        //change error message to say that password is not strong enough
        $this->CI->form_validation->set_message('strong_pass', 'The %s is not strong enough');

        //set a base score of zero
        $score = 0;

        //checking with regular expressions
        //if it contains any digits increase the score
        if(preg_match('!\d!', $value)){
            $score++;
        }

        //if it contains characters a-z, increase the score
        if(preg_match('![A-z]!', $value)){
            $score++;
        }

        //if it contains extra characters, increase the score
        if(preg_match('!\W!', $value)){
            $score++;
        }

        //if it contains extra characters, increase the score
        if(strlen($value) >= 8){
            $score++;
        }

        //at the end if score is less than passed number then return false
        if($score < $params){
            return false;
        }
    }


}