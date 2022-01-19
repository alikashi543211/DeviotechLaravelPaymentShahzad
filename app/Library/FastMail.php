<?php
namespace App\Library;

use Mail;

class FastMail
{

    private $view;
    private $data;
    private $email;
    private $subject;
    private $error;





    function __construct()
    {

    }




    public function validate()
    {
        if(is_null($this->view))
        {
            $this->error = "Email-Error: View parameter is required";
            return false;
        }
        if(is_null($this->data))
        {
            $this->error = "Email-Error: Data parameter is required";
            return false;
        }
        if(!is_array($this->data))
        {
            $this->error = "Email-Error: Data parameter must be an array is required";
            return false;
        }
        if(is_null($this->email))
        {
            $this->error = "Email-Error: Email parameter is required";
            return false;
        }
        if(is_null($this->subject))
        {
            $this->error = "Email-Error: Subject parameter is required";
            return false;
        }
        return true;
    }





    public function send()
    {
        $view = $this->view;
        $data = $this->data;
        $email = $this->email;
        $subject = $this->subject;

        Mail::send($view, $data, function ($send) use($email, $subject)
        {
            $send->to($email)->subject($subject);
        });
    }





    
    // Setter Functions
    public function setView($value)
    {
        $this->view = $value;
    }

    

    public function setEmail($value)
    {
        $this->email = $value;
    }



    public function setData($value)
    {
        $this->data = $value;
    }


    public function setSubject($value)
    {
        $this->subject = $value;
    }







    // Getter Functions
    public function getValidationError()
    {
        return $this->error;
    }
}