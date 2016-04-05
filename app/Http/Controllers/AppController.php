<?php
namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use App\models\User;


class AppController extends Controller {

	public function profile() {
    	return view('profile')->with('user', 'none');
    }

    public function home() {
    	return view('home')->with('user', 'some'); //change to none for anonymous screen
    }

    public function welcome() {
    	return view('welcome');
    }

    public function register() {
    	return view('register');
    }

    public function registerNewUser() {
    	//TODO: register
//messages: 1. Passwords dont match 2. Username is taken 3. succesful register
    	$full_name = Input::get('full_name');
		$username = Input::get('username');
		$email = Input::get('email');
		$password = Input::get('password');
		$confirm_password = Input::get('retype-password');

		$validator = Validator::make(
			array(
				'full_name' => $full_name,
				'username' => $username,
				'email' => $email,
				'password' => $password
			),
			array(
				'password' => 'required',
				'email' => 'required',
				'username' => 'required',
				'full_name' => 'required'
			)
		);
		$validator1 = Validator::make(
			array(
				'email' => $email,
				),
			array(
				'email' => 'required|email'
				)
		);

		if ($validator->fails()) {
			//return "V1";
			$error_messages = $validator->messages();
			return Redirect::to('register')->with('message', 'Please Fill all the fields.');	
		} else if ($validator1->fails()) {
						return "V2";

			return Redirect::to('register')->with('message', 'Please Enter email correctly.');					
		} else if($password != $confirm_password) {
						return "V3";

			return Redirect::to('register')->with('message', 'Passwords don\'t match.');					
		} else {
			if(User::where('username',$username)->count() == 0) {
				$activation_code = uniqid();
				$user = new User;
				$user->full_name = $full_name;
				$user->username = $username;
				$user->email = $email;
				$user->activation_code = $activation_code;

				if ($password != "") {
					$user->password = Hash::make($password);
				}
			
				$user->token = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', Hash::make(rand() . time() . rand())));//generate_token();
				$user->token_expiry = time() + 3600000;
				$user->save();

				$subject = "MoPen: Welcome yo!";
				$email_data['name'] = $user->full_name;
				$url = URL::to('/user/activation').'/'.$activation_code;
				$email_data['url'] = $url;

			    // Mail::send('emails.userregister', array('email_data' => $email_data), function ($message) use ($email, $subject) {
		     //    	$message->to($email)->subject($subject);
		     //    });
					
				return Redirect::to('login')->with('message', 'You have successfully registered. Please verify your Email to Login')->with('message_type', 'success');
				
			} else {
				return Redirect::to('register')->with('message', 'This username is already registered.');
			}
		}
    }

	public function userActivation($act){
		//verify the email activation
		if($act){
			$get_token=User::where('activation_code','=',$act)->first();
			if($get_token)
			{
				if($get_token->verified_email == 1)
				{
					return View::make('login')->with('message','Your Email already activated, Please Login');
				} else{

					$user = User::find($get_token->id);
					$user->verified_email = 1;
					$user->save();

					if($user->save()){
						return View::make('login')->with('message','Your Email is activated, Please Login')->with('message_type', 'success');

					}else{
						return View::make('login')->with('message','Something Went Wrong');
					}
				}
			}else
			{
				return View::make('login')->with('message','Something Went Wrong');
			}
		} else{
			return Redirect::to('register');
		}
	}

    public function login() {
    	return view('login');
    }

    public function upload() {
    	return view('upload')->with('user', 'none');
    }
}