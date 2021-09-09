<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Customer;
use App\Models\Appointment;
use App\Models\User;

class CustomerController extends Controller
{
    //show home page
    public function index(){
        // get all types collection from about table
        $abouts = About::all();
        // Send the all types to views/customer/index.blade.php
        return view('customer.index', compact('abouts'));
    }

    public function appointCheck(Request $request){
        $request->validate([           
            'appoint_date' => ['required', 'string'],
            'appoint_time' => ['required', 'string'],
        ]);    

        $appointments = Appointment::where('appoint_date', '=', $request['appoint_date'])->get();
        
        if(!$appointments->contains('appoint_time', $request['appoint_time'])){
        // check the appoint that already reserved, if not reserved return success, else failed
        
           return response()->json('success');
        }else{
            return response()->json('failed');
        }; 
    }

    public function store(Request $request){
        // validation input values
        $request->validate([
            'fname' => ['required', 'string', 'max:50'],           
            'lname' => ['required', 'string', 'max:50'],
            'gender' => ['required', 'string'],
            'birthday' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'info' => ['required', 'string'],
            'appoint_date' => ['required', 'string'],
            'appoint_time' => ['required', 'string'],
            'agree_personal' => ['required'],
            'agree_data' => ['required']
        ]);         

            // check the customer that already saved customer or not
            // if saved customer, not save for avoid duplivate
        if(count(Customer::where('email', '=', $request['email'])->get())<1){
            $customer_options = new Customer([
                'fname' => $request['fname'],
                'lname' => $request['lname'],
                'gender' => $request['gender'],
                'birthday' => $request['birthday'],
                'email' => $request['email'],
                'phone' => $request['phone'],
            ]);

            $customer_options->save();
            //this is new customer

            $customer = Customer::where('email', '=', $request['email'])->get();
            $customer_id = $customer[0]->id;

        }else{
            $customer = Customer::where('email', '=', $request['email'])->get();
            $customer_id = $customer[0]->id;
            //already saved customer
        }        

        $appointments = Appointment::where('appoint_date', '=', $request['appoint_date'])->get();
        // this is same as appointment validation
        if(!$appointments->contains('appoint_time', $request['appoint_time'])){
            $appointment_options = new Appointment([
                'customers_id' => $customer_id,
                'about' =>  $request['about'],
                'appoint_date' => $request['appoint_date'],
                'appoint_time' => $request['appoint_time'],
                'info' => $request['info']
    
            ]);       

            // validation ok, save the appointment
            $appointment_options->save();
            
            // send email part
            $receiver_email = $request['email'];

            $sender = User::find(1);
            $sender_email = $sender->email;     
            
            $emailFrom = $sender_email;
            $reply = $sender_email;
            $to = $receiver_email;
            $subject = "Your Appointment Successfully Reserved";
            
            $message = '<body >
                <div style="width:500px; margin:10px auto; background:#f1f1f1; border:1px solid #ccc">
                    <table  width="100%" border="0" cellspacing="5" cellpadding="10">
                        <tr>
                            <td style="font-size:14px; color:#323232">Type</td>
                        </tr>
                        <tr>
                            <td style="font-size:16px; font-weight:bold"><strong>' .  $request['about'] .'</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size:14px; color:#323232">Date :</td>
                        </tr>
                        <tr>
                            <td style="font-size:16px;  font-weight:bold"><strong>'. $request['appoint_date'] .'</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size:14px; color:#323232">Time :</td>
                        </tr>
                        <tr>
                            <td style="font-size:16px;  font-weight:bold"><strong>'. $request['appoint_time'] .'</strong></td>
                        </tr>                                                        
                    </table>
                </div>
            </body>
            ';
            
            $headers = "From:" . $emailFrom . "\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
            
            mail($to,$subject,$message,$headers);

        }else{
            return response()->json('failed');
        }; 

     

        return response()->json('success');
       
    }


}
