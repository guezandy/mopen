<?php
namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use Mail;
use Hash;
use URL;
use View;
use Session;
use Storage;
use Request;
use DB;

use App\models\Admin;
use App\models\Code;
use App\models\Follower;
use App\models\Post;
use App\models\PostCode;
use App\models\PostComment;
use App\models\PostLike;
use App\models\PostPost;
use App\models\PostResource;
use App\models\PostTag;
use App\models\PostType;
use App\models\PostUser;
use App\models\Resource;
use App\models\SavePost;
use App\models\Setting;
use App\models\Tag;
use App\models\User;

class AppController extends Controller {

//NEW STUFF
	public function update2() {
		return view('update/landing');
	}

	public function people2() {
		return view('update/people');
	}

	public function profile2() {
		return view('update/profile');
	}

	public function post2() {
		return view('update/post');		
	}

	public function upload2() {
		return view('update/upload/android_native/info');
	}

//LANDING PAGE STUFF
    public function home() {
    	return view('home')->with('user', 'none'); //change to none for anonymous screen
    }

    public function welcome() {
    	return view('welcome');
    }

//USER STUFF
    public function register() {
    	$mailchimp = app('Mailchimp');
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

		$info_validator = Validator::make(
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
		$email_validator = Validator::make(
			array(
				'email' => $email,
			),
			array(
				'email' => 'required|email'
			)
		);

		if ($info_validator->fails()) {
			$error_messages = $info_validator->messages();
			return Redirect::to('register')->with('message', 'Please Fill all the fields.');	
		} else if ($email_validator->fails()) {
			return Redirect::to('register')->with('message', 'Please Enter email correctly.');					
		} else if($password != $confirm_password) {
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
			     //$message->to($email)->subject($subject);
			     //});
					
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

	public function forgotPassword() {
		return "TODO: forgot apssword page that calls reset password";
	}
//TODO: TEST
	public function resetPassword()
	{
		$email = Input::get('email');
		$user = User::where('email',$email)->first();
		if($user)
		{
			$new_password = time();
			$new_password .= rand();
			$new_password = sha1($new_password);
			$new_password = substr($new_password,0,8);
			$user->password = Hash::make($new_password);
			$user->save();

			// send email
			$subject = "Your New Password";
			$email_data = array();
			$email_data['password']  = $new_password;
//TODO SEND EMAIL;
			$subject = "Your New Password";
			$email_data = array();
			$email_data['password']  = $new_password;
			$send_to = $user->email;
/*
		    Mail::send('emails.forgotpassword', array('email_data' => $email_data), function ($message) use ($send_to, $subject) {
            	//$message->from('andrew.rodriguez007@gmail.com', 'Laravel');
            	$message->to('andrew.rodriguez007@gmail.com')->subject($subject);
            });*/
			//send_email($user->id,'user',$email_data,$subject,'forgotpassword');

			return Redirect::to('login')->with('success', 'password reseted successfully. Please check your inbox for new password.');

		}
		else{
			return Redirect::to('login')->with('error', 'This email ID is not registered with us');
		}
	}

    public function login() {
    	return view('login');
    }

    public function verifyLogin()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		$user = User::where('username', '=', $username)->first();
		if($user){
			if($user->verified_email==1){
				if ($user && Hash::check($password, $user->password)) {
					Session::put('user_id', $user->id);
					Session::put('user_name', $user->username);
					Session::put('user_pic', $user->image);	
					return Redirect::to('home');
				}
				else{
					return view('login')->with('message', 'Invalid email and password');
				}
			}else{
				return view('login')->with('message','Please verify your email');
			}
		} else{
			return view('login')->with('message','Invalid email');
		}
	}

	public function profile() {
    	return view('profile')->with('user', 'some');
    }
    public function logout()
	{
		Session::flush();
		return Redirect::to('login');
	}

//TESTING UI STUFF
    public function upload() {
    	return view('upload')->with('user', 'none');
    }

    // public function upload2() {
    // 	return view('upload2')->with('count', 2);
    // }

    public function upload3() {
    	return view('upload3');
    }

    

    public function post() {
    	return view('post')->with('user', 'none');
    }

//Search stuff
	public function search() {
		return view('search')->with('user', 'none');
	}    

//NOTIFICATIONS:
	public function notifications() {
		return view('notifications')->with('user', 'none');
	}	
}