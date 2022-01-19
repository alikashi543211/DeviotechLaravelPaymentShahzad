<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\PaypalPayment; //ADD NEWLY CREATED TRAIT NAMESPACE

class PaymentController extends Controller
{
    use PaypalPayment; //CALL THE TRAIT IN CONTROLLER

    public function paypalCheckout(Request $req)
    {
        // $this->test_trait();
        $data = [
                'price'             => 10,
                'payer_email'       => 'alikashi54321@gmail.com',
                'currency'          => 'USD',
                'quantity'          => 1,
                'description'       => 'DESCRIPTION_OF_PAYEMNT',
                'success_url'       => route('payment.paypal.success'), // PASS THE SUCCESS RESPONSE ROUTE NAME
                'cancel_url'        => route('payment.paypal.cancel')  // PASS THE CANCEL RESPONSE ROUTE NAME
            ];
            // dd($data);
            return $this->makePaypalCheckout($data);        
    }

    public function paymentPaypalSuccess(Request $request)
    {   

         $response = $this->paypalPaymentSuceess($request->all());

        if ($response->getState() == 'approved') 
        {
            dd("Payment Done Through PayPal");
            //DO YOUR TRANSACTION LOGIC HERE TO STORE RECORD IN DATABASE
        }

        return redirect()->route('index')->with('error','Payment failed! Try again later.');
    }

    public function paymentPaypalCancel()
    {
        return 'You have cancelled the transaction';
    }

}
