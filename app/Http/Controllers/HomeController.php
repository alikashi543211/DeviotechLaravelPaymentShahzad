<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\FastMail;

class HomeController extends Controller
{
    public  function home()
    {
        return view("welcome");
    }


    public  function sendEmail()
    {
        try
        {
            $user = (object)["name" => "Test User", "hobby" => "Cricket"];

            // View, Data, Email, Subject
            $fast_mail = new FastMail();
            $fast_mail->setView("emails.welcome");
            $fast_mail->setData(get_defined_vars());
            $fast_mail->setEmail("test@customemail.com");
            $fast_mail->setSubject("Test Custom Email");
            if($fast_mail->validate())
            {
                $fast_mail->send();
                dd("Email Sent Successfully");
                
            }else
            {
                dd($fast_mail->getValidationError());
            }
        }catch(\Exception $e)
        {
            dd($e->getMessage());
        }     
    }
}
