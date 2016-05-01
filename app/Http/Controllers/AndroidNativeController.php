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
    	DB::disableQueryLog();
    	$types = PostType::all();
    	$session_post_id = Session::get('post_id');
    	$user_id = Session::get('user_id'); //TODO check if user is logged in before?
    	$follower_followings = Follower::where('follower', '=', $user_id)->lists('following');
    	$user = User::find($user_id);
    	if(Session::get('post_id') !== null) {
			$post = Post::where('post_id', '=', $session_post_id)->first();
			$resources = Resource::where('post_id', '=', $session_post_id)->get();
			$images = array();
			foreach($resources as $res) {
				$url = 'https://s3-us-west-1.amazonaws.com/mopen'. $res->aws_key;
				$file = \Storage::disk('s3')->get($res->aws_key);
				array_push($images, $file);
			}
			$codes = Code::where('post_id', '=', $session_post_id)->get();
			$post_tags = PostTag::where('post_id', '=', $session_post_id)->lists('tag_id');
			$tags = Tag::whereIn('id', $post_tags)->get();
			$tags_left = Tag::whereNotIn('id', $post_tags)->get();

			$post_users = PostUser::where('post_id', '=', $session_post_id)->lists('user_id');
    		$collaborators = User::whereIn('id', $post_users)->get();
    		// following + not you + not already a collab on post
    		$collaborators_left = User::whereIn('id', $follower_followings)->whereNotIn('id', $post_users)->where('id', '<>', $user_id)->get();
    		//Session::put('message', 'Hey, you forgot to upload this post');
			return view('update.upload.android_native.info')
				->with('tab', 4)
				->with('user', $user)
				->with('postTypes', $types)
				->with('post', $post)
				->with('resources', $resources)
				->with('images', $images)
    			->with('tags_left', $tags_left)
    			->with('tags', $tags)
    			->with('collaborators_left', $collaborators_left)
    			->with('collaborators', $collaborators)
				->with('codes', (count($codes) > 0 ? $codes : []));
    	} else {
	    	$post_id = uniqid();
    		$new_post = new Post;
			$new_post->post_id = $post_id;
			$new_post->user_id = $user_id;
			$new_post->save();
			Session::put('message', null);
    		Session::put('post_id', $post_id); //new post id
    		$tags_left = Tag::all();
    		$collaborators_left = User::whereIn('id', $follower_followings)->get();
    		return view('update.upload.android_native.info')
    			->with('tab', 4)
    			->with('user', $user)
    			->with('postTypes', $types)
    			->with('post', $new_post)
    			->with('tags_left', $tags_left)
    			->with('tags', [])
    			->with('collaborators_left', $collaborators_left)
    			->with('collaborators', [])
    			->with('images', [])
				->with('resources', [])
				->with('codes', []);
    	}
    }

    public function addXmlSnippet() {
		$types = PostType::all();
		$session_post_id = Session::get('post_id');
		$code = new Code;
		$code->code_id = uniqid();
		$code->post_id = $session_post_id;
		$code->format = 'xml';
		$code->code = '<!-- This is a new code file with XML Syntax hightlighitng! -->';
		//$code->description = "Describe your post here";
		$code->save();
    }

	public function addJavaSnippet() {
		$session_post_id = Session::get('post_id');
		$code = new Code;
		$code->code_id = uniqid();
		$code->post_id = $session_post_id;
		$code->format = 'java';
		$code->code = '//This is a new code file ready to go for you';
		//$code->description = "Describe your post here";
		//return $code->code;
		$code->save();
	}

	public function save() {
		DB::disableQueryLog();
    	$post_id = Session::get('post_id');
    	$post = Post::where('post_id', '=', $post_id)->first();
    	$type = Input::get('type');
    	$title = Input::get('title');
		$vc = Input::get('vc');
		$description = Input::get('description');
		$tags = Input::get('tags');
		$collaborators = Input::get('collaborators');
		//Create a post users object
		if(count($tags) > 0) {
			foreach($tags as $tag) {
				$tag_exists = PostTag::where('post_id', '=', $post_id)->where('tag_id', '=', $tag)->first();
				//return $tag_exists;
				if($tag_exists == null) {
					$new_tag = new PostTag;
					$new_tag->post_id = $post_id;
					$new_tag->tag_id = $tag;
					$new_tag->save();
				} 
			}
		}
		if(count($collaborators)) {
			foreach($collaborators as $collaborator) {
				$exists = PostUser::where('post_id', '=', $post_id)->where('user_id', '=', $collaborator)->first();
				if($exists == null) {
					$new_user = new PostUser;
					$new_user->post_id = $post_id;
					$new_user->user_id = $collaborator;
					$new_user->save();
				} 
			}
		}
		$post->name = $title;
		$post->vc_link = $vc;
		$post->description = $description;
		$post->save();
		$codes = Code::where('post_id', '=', $post_id)->get();
		foreach($codes as $code) {
			$code->file_name = Input::get($code->code_id.':name');
			$code->description  = Input::get($code->code_id.':description');
			$code->code = Input::get($code->code_id.':code');
			$code->save();			
		}
        if(Input::get('upload_image')) {
        	$file = Input::file('file');
			if(isset($file)) {
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
				\Storage::disk('s3')->put($aws_url, file_get_contents($file));
				Session::put('message', 'Image upload successful');
			}
        } else if(Input::get('next')) {
        	Session::put('message', "Post saved, preview created");
        } else if(Input::get('upload')) {
        	$post_tags = PostTag::where('post_id', '=', $post_id)->count();
        	$resources = Resource::where('post_id', '=', $post_id)->count();
			if($post->name == '' || count($codes) < 1 || $resources < 1 || $post_tags < 1) {
				Session::put('message', "Required: Title, 1 image, 1 code snippet, 1 tag");
			} else {
				$images = array();
				foreach($resources as $res) {
					$url = 'https://s3-us-west-1.amazonaws.com/mopen'. $res->aws_key;
					$file = \Storage::disk('s3')->get($res->aws_key);
					array_push($images, $file);
				}
				$post->uploaded = 1;
				$post->save();
				Session::put('post_id', null);
				Session::put('message', 'Upload Successful');
		    	return Redirect::to('post')
		    			->with('tab', 1)
		    			->with('post', $post)
		    			->with('images', $images)
		    			->with('resources', $resources)
		    			->with('codes', $codes);    
		    }    	
        } else if(Input::get('add_java')) {
        	$this->addJavaSnippet();
        	Session::put('message', "Added Java Snippet");
        } else if(Input::get('add_xml')) {
        	$this->addXmlSnippet();
        	Session::put('message', "Added XML Snippet");
        }
		$user_id = Session::get('user_id'); //TODO check if user is logged in before?
		$user = User::find($user_id);
		$codes = Code::where('post_id', '=', $post_id)->get();
		$resources = Resource::where('post_id', '=', $post_id)->get();
		$images = array();
		foreach($resources as $res) {
			$url = 'https://s3-us-west-1.amazonaws.com/mopen'. $res->aws_key;
			$file = \Storage::disk('s3')->get($res->aws_key);
			array_push($images, $file);
		}
		$post_tags = PostTag::where('post_id', '=', $post_id)->lists('tag_id');
		$tags = Tag::whereIn('id', $post_tags)->get();
		$tags_left = Tag::whereNotIn('id', $post_tags)->get();

		$post_users = PostUser::where('post_id', '=', $post_id)->lists('user_id');
		$follower_followings = Follower::where('follower', '=', $user_id)->lists('following');
    	$collaborators = User::whereIn('id', $post_users)->get();
    	// following + not you + not already a collab on post
    	$collaborators_left = User::whereIn('id', $follower_followings)->whereNotIn('id', $post_users)->where('id', '<>', $user_id)->get();
    	return Redirect::to('upload/android_native')
    			->with('tab', 4)
    			->with('user', $user)
    			->with('post', $post)
    			->with('tags_left', $tags_left)
    			->with('tags', $tags)
    			->with('collaborators_left', $collaborators_left)
    			->with('collaborators', $collaborators)
    			->with('images', $images)
    			->with('resources', $resources)
    			->with('codes', $codes);
	}
}