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

class PostController extends Controller {

	public function deleteResource($id) {

	}

	public function deleteCode($id) {
		$code = Code::where('code_id', '=', $id)->first();
		return $code;
	}

	public function deletePost($id) {

	}

}