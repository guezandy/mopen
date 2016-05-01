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


	public function update2() {
		DB::disableQueryLog();
		//TODO order by likes ?
		$posts = array();
		$uploaded_posts = Post::where('uploaded', 1)->take(10)->get();
		$all_tags = Tag::all();
		foreach($uploaded_posts as $uploaded_post) {
			$user = User::where('id', '=', $uploaded_post->user_id)->first();
			$res = Resource::where('post_id', '=', $uploaded_post->post_id)->first();
			$url = 'https://s3-us-west-1.amazonaws.com/mopen'. $res->aws_key;
			$image = \Storage::disk('s3')->get($res->aws_key);
			$post_tags = PostTag::where('post_id', '=', $uploaded_post->post_id)->lists('tag_id');
			$tags = Tag::whereIn('id', $post_tags)->get();
			$post = array();
			$post['post'] = $uploaded_post;
			$post['user'] = $user->full_name;
			$post['res'] = $res;
			$post['image'] = $image;
			$post['tags'] = $tags;
			array_push($posts, $post);
		}
		return view('update/landing')->with('tab', 1)->with('posts', $posts)->with('all_tags', $all_tags);
	}

	public function post($id) {
		$main_post = Post::where('post_id', '=', $id)->first();
		$user = User::where('id', '=', $main_post->user_id)->first();
		$resources = Resource::where('post_id', '=', $main_post->post_id)->get();
		$images = array();
		foreach($resources as $res) {
			$url = 'https://s3-us-west-1.amazonaws.com/mopen'. $res->aws_key;
			$file = \Storage::disk('s3')->get($res->aws_key);
			array_push($images, $file);
		}
		$post_tags = PostTag::where('post_id', '=', $main_post->post_id)->lists('tag_id');
		$tags = Tag::whereIn('id', $post_tags)->get();
		$codes = Code::where('post_id', '=', $main_post->post_id)->get();
		$post_users = PostUser::where('post_id', '=', $main_post->post_id)->lists('user_id');
    	$collaborators = User::whereIn('id', $post_users)->get();

		$posts = array();
		$uploaded_posts = Post::where('uploaded', 1)->take(10)->get();
		$all_tags = Tag::all();
		foreach($uploaded_posts as $uploaded_post) {
			$user = User::where('id', '=', $uploaded_post->user_id)->first();
			$res = Resource::where('post_id', '=', $uploaded_post->post_id)->first();
			$url = 'https://s3-us-west-1.amazonaws.com/mopen'. $res->aws_key;
			$image = \Storage::disk('s3')->get($res->aws_key);
			$post_tags = PostTag::where('post_id', '=', $uploaded_post->post_id)->lists('tag_id');
			$tags = Tag::whereIn('id', $post_tags)->get();
			$post = array();
			$post['post'] = $uploaded_post;
			$post['user'] = $user->full_name;
			$post['res'] = $res;
			$post['image'] = $image;
			$post['tags'] = $tags;
			array_push($posts, $post);
		}

		return view('update/post')
			->with('tab', 1)
			->with('post', $main_post)
			->with('user', $user)
			->with('tags', $tags)
			->with('resources', $resources)
			->with('images', $images)
			->with('collaborators', $collaborators)
			->with('posts', $posts)
			->with('all_tags', $all_tags)
			->with('codes', $codes);		
	}


	public function people() {
		$user_query = User::where('verified_email', '=', 1);
		if(Session::get('user_id')) {
			$user_query->where('id', '<>', Session::get('user_id'));
		}
		if(Input::get('search')) {
			$search = Input::get('search');
			$user_query->where('full_name', 'like', '%'.$search.'%')
				->orWhere('username', 'like', '%'.$search.'%');
		}
		$users = $user_query->get();
		return view('update/people')->with('tab', 2)->with('users', $users);
	}
/* NOT NEEDED */
	public function search() {
		$search = Input::get('search');
		
		return view('update/people')->with('user', 'none');
	}  

	public function profile($username, $id) {
		$posts = array();
		$user = User::where('username', '=', $username)->first();
		$user_posts = Post::where('user_id', '=', $user->id)->where('uploaded', 1)->take(10)->get();
		$all_tags = Tag::all();
		foreach($user_posts as $user_post) {
			$user = User::where('id', '=', $user_post->user_id)->first();
			$res = Resource::where('post_id', '=', $user_post->post_id)->first();
			$url = 'https://s3-us-west-1.amazonaws.com/mopen'. $res->aws_key;
			$image = \Storage::disk('s3')->get($res->aws_key);
			$post_tags = PostTag::where('post_id', '=', $user_post->post_id)->lists('tag_id');
			$tags = Tag::whereIn('id', $post_tags)->get();
			$post = array();
			$post['post'] = $user_post;
			$post['user'] = $user->full_name;
			$post['res'] = $res;
			$post['image'] = $image;
			$post['tags'] = $tags;
			array_push($posts, $post);
		}
		if($id != 'all') {
			$main_post = Post::where('post_id', '=', $id)->first();
			if($main_post != null) {
				$user = User::where('id', '=', $main_post->user_id)->first();
				$resources = Resource::where('post_id', '=', $main_post->post_id)->get();
				$images = array();
				foreach($resources as $res) {
					$url = 'https://s3-us-west-1.amazonaws.com/mopen'. $res->aws_key;
					$file = \Storage::disk('s3')->get($res->aws_key);
					array_push($images, $file);
				}
				$post_tags = PostTag::where('post_id', '=', $main_post->post_id)->lists('tag_id');
				$tags = Tag::whereIn('id', $post_tags)->get();
				$codes = Code::where('post_id', '=', $main_post->post_id)->get();
				$post_users = PostUser::where('post_id', '=', $main_post->post_id)->lists('user_id');
		    	$collaborators = User::whereIn('id', $post_users)->get();
		    }
			return view('update/profile')
					->with('post', $main_post)
					->with('tags', $tags)
					->with('resources', $resources)
					->with('images', $images)
					->with('collaborators', $collaborators)
					->with('codes', $codes)
					->with('tab', 3)
					->with('user', $user)
					->with('posts', $posts)
					->with('all_tags', $all_tags);
		} else {
			return view('update/profile')
					->with('tab', 3)
					->with('user', $user)
					->with('posts', $posts)
					->with('all_tags', $all_tags);			
		}
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
					return Redirect::to('home')->with('tab', 1);
				}
				else{
					return view('login')->with('message', 'Invalid username and password');
				}
			}else{
				return view('login')->with('message','Please verify your account via email');
			}
		} else{
			return view('login')->with('message','Invalid username');
		}
	}

	// public function profile() {
 //    	return view('profile')->with('user', 'some');
 //    }
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

    

    // public function post() {
    // 	return view('post')->with('user', 'none');
    // }
  

//NOTIFICATIONS:
	public function notifications() {
		return view('notifications')->with('user', 'none');
	}	
}