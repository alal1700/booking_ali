<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\About;
use App\Models\Customer;
use App\Models\Appointment;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //get today date
        $today = date("Y-m-d");
        //get all appointments collection from appointments table
        $all_appoints = Appointment::all();
        // get today appointments collection
        $today_appoints = Appointment::where('appoint_date', '=', $today)->get();
        // get upcoming appointments collection
        $upcoming_appoints = Appointment::where('appoint_date', '>', $today)->get();
        // get prev_ appointments collection
        $prev_appoints = Appointment::where('appoint_date', '<', $today)->get();
        // get all customers collection from customer table
        $customers = Customer::all();
        // get all types collection from about table
        $abouts = About::all();
        // Send the above collections to views/admin/index.blade.php
        return view('admin.index', compact('all_appoints', 'today_appoints', 'upcoming_appoints', 'prev_appoints', 'customers'));
    }

    // get today collection function
    public function today(){
        //get today date
        $today = date("Y-m-d");
        // get today appointments collection
        $appoints = Appointment::where('appoint_date', '=', $today)->get();
        $customers = Customer::all();
        $abouts = About::all();
        // Send the todays collections to views/admin/index.blade.php
        return view('admin.today', compact('appoints', 'customers', 'abouts'));
    }

    // delete the selected appoint function from today appointment page.
    public function today_delete($id){
        // get the selected appoint 
        $options = Appointment::find($id);
        //find the customer id with appointment
        $receiver_id = $options->customers_id;
         //select the customer with customer id
        $receiver = Customer::find($receiver_id);

        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        // delted the selected appointment
        $options->delete();     
        // get the customer email
        $receiver_email = $receiver->email;
        // select the amin 
        $sender = User::find(1);
        // select the admin email
        $sender_email = $sender->email;     
        
        //email part
        $emailFrom = $sender_email;
        $reply = $sender_email;
        $to = $receiver_email;
        $subject = "Your Appointment Canceled.";
        
        $message = '<body >
            <div style="width:500px; margin:10px auto; background:#f1f1f1; border:1px solid #ccc">
                <table  width="100%" border="0" cellspacing="5" cellpadding="10">
                    <tr>
                        <td style="font-size:14px; color:#323232">The Administrator has been canceled your appointment.</td>
                        <td style="font-size:14px; color:#323232">Please contact to administrator.<a href = "mailto:'.$sender_email.'>'.$sender_email.'</a>"</td>
                    </tr>                                                                       
                </table>
            </div>
        </body>
        ';
        
        $headers = "From:" . $emailFrom . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        // email send function
        mail($to,$subject,$message,$headers);
        // return
        return back()->with('success', 'Deleted Successfully');
    }

    //Similar to today appointment
    public function upcoming(){
        $today = date("Y-m-d");
        $appoints = Appointment::where('appoint_date', '>', $today)->get();
        $customers = Customer::all();
        $abouts = About::all();
        return view('admin.upcoming', compact('appoints', 'customers', 'abouts'));
    }

    //Similar to today appointment delete
    public function upcoming_delete($id){
        $options = Appointment::find($id);
        $receiver_id = $options->customers_id;
        $receiver = Customer::find($receiver_id);

        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->delete();     

        $receiver_email = $receiver->email;

        $sender = User::find(1);
        $sender_email = $sender->email;     
        
        $emailFrom = $sender_email;
        $reply = $sender_email;
        $to = $receiver_email;
        $subject = "Your Appointment Canceled.";
        
        $message = '<body >
            <div style="width:500px; margin:10px auto; background:#f1f1f1; border:1px solid #ccc">
                <table  width="100%" border="0" cellspacing="5" cellpadding="10">
                    <tr>
                        <td style="font-size:14px; color:#323232">The Administrator has been canceled your appointment.</td>
                        <td style="font-size:14px; color:#323232">Please contact to administrator.<a href = "mailto:'.$sender_email.'>'.$sender_email.'</a>"</td>
                    </tr>                                                                       
                </table>
            </div>
        </body>
        ';
        
        $headers = "From:" . $emailFrom . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        
        mail($to,$subject,$message,$headers);

        return back()->with('success', 'Deleted Successfully');
    }

     //Similar to today appointment
    public function prev(){
        $today = date("Y-m-d");
        $appoints = Appointment::where('appoint_date', '<', $today)->get();
        $customers = Customer::all();
        $abouts = About::all();
        return view('admin.prev', compact('appoints', 'customers', 'abouts'));
    }

    //Similar to today appointment delete
    public function prev_delete($id){
         $options = Appointment::find($id);
        $receiver_id = $options->customers_id;
        $receiver = Customer::find($receiver_id);

        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->delete();     

        $receiver_email = $receiver->email;

        $sender = User::find(1);
        $sender_email = $sender->email;     
        
        $emailFrom = $sender_email;
        $reply = $sender_email;
        $to = $receiver_email;
        $subject = "Your Appointment Canceled.";
        
        $message = '<body >
            <div style="width:500px; margin:10px auto; background:#f1f1f1; border:1px solid #ccc">
                <table  width="100%" border="0" cellspacing="5" cellpadding="10">
                    <tr>
                        <td style="font-size:14px; color:#323232">The Administrator has been canceled your appointment.</td>
                        <td style="font-size:14px; color:#323232">Please contact to administrator.<a href = "mailto:'.$sender_email.'>'.$sender_email.'</a>"</td>
                    </tr>                                                                       
                </table>
            </div>
        </body>
        ';
        
        $headers = "From:" . $emailFrom . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        
        mail($to,$subject,$message,$headers);
        
        return back()->with('success', 'Deleted Successfully');
    }

    // admin password change function
    public function changepassword(){
        // find the logined userId
        $userId = Auth::id();    
        // select the user with above user ID
        $users = User::find($userId);
        // Send the selected user to views/admin/changepassword.blade.php
        return view('admin.changepassword', compact( 'users'));
    }

    public function resetpassword(Request $request){
        $userId = Auth::id();
        // validation saved old password and puted old password
        $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $options = User::find($userId);
        // Encrypt new password
        $password = Hash::make($request['password']);
        // validation old password and new password
        if(Hash::check($request['old_password'], $options->password)){      
            $options->password = Hash::make($request['password']);
            // save new password
            $options->save();

            $receiver_email = $options->email;

            $sender = User::find(1);
            $sender_email = $sender->email;     
            
            $emailFrom = $sender_email;
            $reply = $sender_email;
            $to = $receiver_email;
            $subject = "You Password Changed";
            
            $message = '<body >
                <div style="width:500px; margin:10px auto; background:#f1f1f1; border:1px solid #ccc">
                    <table  width="100%" border="0" cellspacing="5" cellpadding="10">
                        <tr>
                            <td style="font-size:14px; color:#323232">Name</td>
                        </tr>
                        <tr>
                            <td style="font-size:16px; font-weight:bold"><strong>' . $options->name .'</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size:14px; color:#323232">Email :</td>
                        </tr>
                        <tr>
                            <td style="font-size:16px;  font-weight:bold"><strong>'. $options->email  .'</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size:14px; color:#323232">New Password :</td>
                        </tr>
                        <tr>
                            <td style="font-size:16px;  font-weight:bold"><strong>'.$request['password'] .'</strong></td>
                        </tr>                                                        
                    </table>
                </div>
            </body>
            ';
            
            $headers = "From:" . $emailFrom . "\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
            
            mail($to,$subject,$message,$headers);

            return redirect()->back()->with('success', 'Successfully Changed');    
        }else{
           return redirect()->back()->withErrors(['old_password' => 'Old password is not matched.']);
        }
    }


}
 