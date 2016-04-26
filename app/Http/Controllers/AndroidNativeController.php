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
use Image;

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

class AndroidNativeController extends Controller {

	public function discard() {
		Session::flush();
	}

    public function renderUploadScreen() {
    	$types = PostType::all();
    	//Session::put('post_id', '5715d46da26da'); //TODO remove this line
    	$session_post_id = Session::get('post_id');
    	if(Session::get('post_id') !== null) {
			$post = Post::where('post_id', '=', $session_post_id)->first();
			$resources = Resource::where('post_id', '=', $session_post_id)->get();
			$images = array();
			foreach($resources as $res) {
				$url = 'https://s3-us-west-1.amazonaws.com/mopen'. $res->aws_key;
				$file = \Storage::disk('s3')->get($res->aws_key);
				array_push($images, $file);
			}
			$left_query = DB::table('code')
					->where('post_id', '=', $session_post_id)
	                ->whereIn('format', ['Java', 'C#']);
			$left_code = $left_query->get();
			$right_query = DB::table('code')
					->where('post_id', '=', $session_post_id)
	                ->whereNotIn('format', ['Java', 'C#']);
			$right_code = $right_query->get();
			return view('upload.android_native')
				->with('postTypes', $types)
				->with('post', $post)
				->with('resources', $resources)
				->with('images', $images)
				->with('left_code', $left_code)
				->with('right_code', $right_code);
    	} else {
	    	$post_id = uniqid();
    		$new_post = new Post;
			$new_post->post_id = $post_id;
			$new_post->save();
	    	if(Session::get('user_name') !== null) {
	    		$post_user = new PostUser;
	    		$post_user->post_id = $post_id;
	    		$post_user->user_id = Session::get('user_name');
	    		$post_user->save();
	    	} 
    		Session::put('post_id', $post_id); //new post id
    		return view('upload.android_native')
    			->with('postTypes', $types)
    			->with('post', $new_post)
    			->with('images', [])
				->with('resources', [])
				->with('left_code', [])
				->with('right_code', []);
    	}
    }

    public function addXmlSnippet() {
		$types = PostType::all();
		$session_post_id = Session::get('post_id');
		$code = new Code;
		$code->code_id = uniqid();
		$code->post_id = $session_post_id;
		$code->format = 'XML';
		$code->code = '<!-- This is a new code file with XML Syntax hightlighitng! -->';
		//$code->description = 'Describe your post here';
		$code->save();

		$post = Post::where('post_id', '=', $session_post_id)->first();
		$resources = Resource::where('post_id', '=', $session_post_id)->get();
		$images = array();
		foreach($resources as $res) {
			$url = 'https://s3-us-west-1.amazonaws.com/mopen'. $res->aws_key;
			$file = \Storage::disk('s3')->get($res->aws_key);
			array_push($images, $file);
		}
		$left_query = DB::table('code')
				->where('post_id', '=', $session_post_id)
                ->whereIn('format', ['Java', 'C#']);
		$left_code = $left_query->get();
		$right_query = DB::table('code')
				->where('post_id', '=', $session_post_id)
                ->whereNotIn('format', ['Java', 'C#']);
		$right_code = $right_query->get();
		return Redirect::to('upload/android_native')
			->with('postTypes', $types)
			->with('post', $post)
			->with('resources', $resources)
			->with('images', $images)
			->with('left_code', $left_code)
			->with('right_code', $right_code);
    }

	public function addJavaSnippet() {
		$types = PostType::all();
		$session_post_id = Session::get('post_id');
		$code = new Code;
		$code->code_id = uniqid();
		$code->post_id = $session_post_id;
		$code->format = 'Java';
		$code->code = '//This is a new code file ready to go for you';
		//$code->description = 'Describe your post here';
		$code->save();

		$post = Post::where('post_id', '=', $session_post_id)->first();
		$resources = Resource::where('post_id', '=', $session_post_id)->get();
		$images = array();
		foreach($resources as $res) {
			$url = 'https://s3-us-west-1.amazonaws.com/mopen'. $res->aws_key;
			$file = \Storage::disk('s3')->get($res->aws_key);
			array_push($images, $file);
		}
		$left_query = DB::table('code')
				->where('post_id', '=', $session_post_id)
                ->whereIn('format', ['Java', 'C#']);
		$left_code = $left_query->get();
		$right_query = DB::table('code')
				->where('post_id', '=', $session_post_id)
                ->whereNotIn('format', ['Java', 'C#']);
		$right_code = $right_query->get();
		return Redirect::to('upload/android_native')
			->with('postTypes', $types)
			->with('post', $post)
			->with('resources', $resources)
			->with('images', $images)
			->with('left_code', $left_code)
			->with('right_code', $right_code);
	}

    public function saveBasicInfo() {
    	$types = PostType::all();
    	$post_id = Session::get('post_id');

    	$post = Post::where('post_id', '=', $post_id)->first();

    	$type = Input::get('type');
    	$title = Input::get('title');
		$vc = Input::get('vc');
		$description = Input::get('description');
		//$tags= Input::get('tags'); //gets the last tag selected
		$post->name = $title;
		$post->vc_link = $vc;
		$post->description = $description;
		$post->save();

		$resources = Resource::where('post_id', '=', $post_id)->get();
		$images = array();
		foreach($resources as $res) {
			$url = 'https://s3-us-west-1.amazonaws.com/mopen'. $res->aws_key;
			$file = \Storage::disk('s3')->get($res->aws_key);
			array_push($images, $file);
		}
		$left_query = DB::table('code')
				->where('post_id', '=', $post_id)
                ->whereIn('format', ['Java', 'C#']);
		$left_code = $left_query->get();
		$right_query = DB::table('code')
				->where('post_id', '=', $post_id)
                ->whereNotIn('format', ['Java', 'C#']);
		$right_code = $right_query->get();
		return Redirect::to('upload/android_native')
			->with('postTypes', $types)
			->with('post', $post)
			->with('resources', $resources)
			->with('images', $images)
			->with('left_code', $left_code)
			->with('right_code', $right_code);
    }

	//upload an screenshot image
	public function uploadResource() {
		$types = PostType::all();

		$post_id = Session::get('post_id');
		$file = Input::file('file');
		if(!isset($file)) {
			return Redirect::back();//to('upload.android_native'); //TODO fix this
		}
		$extension = $file->getClientOriginalExtension();
		$newfilename = str_random(10).'.' . $extension;
		$aws_url = '/post/' . $post_id . '/' . $newfilename;

		$res = new Resource;
		$res->res_id = uniqid();
		$res->format = $extension;
		$res->post_id = $post_id;
		$res->file_name = $newfilename;
		//TODO res->status
		$res->aws_key = $aws_url;
		$res->save();
		/* TODO not sure if really needed yet defining joint table */
    	\Storage::disk('s3')->put($aws_url, file_get_contents($file));
		
    	$post = Post::where('post_id', '=', $post_id);
		$resources = Resource::where('post_id', '=', $post_id)->get();
		$images = array();
		foreach($resources as $res) {
			$url = 'https://s3-us-west-1.amazonaws.com/mopen'. $res->aws_key;
			$file = \Storage::disk('s3')->get($res->aws_key);
			array_push($images, $file);
		}
		$left_query = DB::table('code')
				->where('post_id', '=', $post_id)
                ->whereIn('format', ['Java', 'C#']);
		$left_code = $left_query->get();
		$right_query = DB::table('code')
				->where('post_id', '=', $post_id)
                ->whereNotIn('format', ['Java', 'C#']);
		$right_code = $right_query->get();
		return Redirect::to('upload/android_native')
			->with('postTypes', $types)
			->with('post', $post)
			->with('resources', $resources)
			->with('images', $images)
			->with('left_code', $left_code)
			->with('right_code', $right_code);
	}

	public function saveCode() {
		$types = PostType::all();
		$post_id = Session::get('post_id');
		$post = Post::where('post_id', '=', $post_id)->first();
		$resources = Resource::where('post_id', '=', $post_id)->get();
		$images = array();
		foreach($resources as $res) {
			$url = 'https://s3-us-west-1.amazonaws.com/mopen'. $res->aws_key;
			$file = \Storage::disk('s3')->get($res->aws_key);
			array_push($images, $file);
		}
		$left_query = DB::table('code')
				->where('post_id', '=', $post_id)
                ->whereIn('format', ['Java', 'C#']);
		$left_code = $left_query->get();
		$right_query = DB::table('code')
				->where('post_id', '=', $post_id)
                ->whereNotIn('format', ['Java', 'C#']);
		$right_code = $right_query->get();
		$left_count = count($left_code);
		$right_count = count($right_code);

		if($left_count > 0) {
			$java_code_id = Input::get('java_codeid_1');
			$java_filename_1 = Input::get('java_file_1');
			$java_code_1 = Input::get('java_code_1');
			$java_description_1 = Input::get('java_description_1');
			$code = Code::where('code_id', '=', $java_code_id)->first();
			$code->file_name = $java_filename_1;
			$code->code = $java_code_1;
			$code->description = $java_description_1;
			$code->save();
		}
		if($left_count > 1) {
			$java_code_id_2 = Input::get('java_codeid_2');
			$java_filename_2 = Input::get('java_file_2');
			$java_code_2 = Input::get('java_code_2');
			$java_description_2 = Input::get('java_description_2');
			
			$code = Code::where('code_id', '=', $java_code_id_2)->first();
			$code->file_name = $java_filename_2;
			$code->code = $java_code_2;
			$code->description = $java_description_2;
			$code->save();
		}

		if($right_count > 0) {
			$xml_code_id = Input::get('xml_codeid_1');
			$xml_filename_1 = Input::get('xml_file_1');
			$xml_code_1 = Input::get('xml_code_1');
			$xml_description_1 = Input::get('xml_description_1');
			$code = Code::where('code_id', '=', $xml_code_id)->first();
			$code->file_name = $xml_filename_1;
			$code->code = $xml_code_1;
			$code->description = $xml_description_1;
			$code->save();
		}
		if($right_count > 1) {
			$xml_code_id_2 = Input::get('xml_codeid_2');
			$xml_filename_2 = Input::get('xml_file_2');
			$xml_code_2 = Input::get('xml_code_2');
			$xml_description_2 = Input::get('xml_description_2');
			
			$code = Code::where('code_id', '=', $xml_code_id_2)->first();
			$code->file_name = $xml_filename_2;
			$code->code = $xml_code_2;
			$code->description = $xml_description_2;
			$code->save();
		}

		return Redirect::to('upload/android_native')
			->with('postTypes', $types)
			->with('post', $post)
			->with('resources', $resources)
			->with('left_code', $left_code)
			->with('right_code', $right_code);
	}	
}