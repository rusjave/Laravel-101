<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;

use App\Blog;

use Validator;

use Response;

use Illuminate\Support\Facades\Input;


class BlogController extends Controller
{

	public function index ()
	{

		//we need to show all data from "blog" table
		$blogs = Blog::all();

		// dd($blogs);

		//show data tp our view

		return view('blog.index', ['blogs' => $blogs]);


 		// return view('blog.index', compact('blogs'));

	}

	public function editItem(Request $req)
	{

		$blog = Blog::find ($req->id);

		$blog->title = $req->title;

		$blog->description = $req->description;

		$blog->save();

		return response()->json ($blog);



	}

	public function addItem(Request $req)
	{

		$rules = array(

			'title' => 'required',

			'description' => 'required'

		);

		// fpr Valudator

		$validator = Validator::make (Input::all(), $rules);

		if ($validator->fails()) 
			
			return Response::json(array('errors' => $validator->getMessgaeBag()->toArray));

		else{

			$blog = new Blog();

			$blog->title = $req->title;

			$blog->description = $req->description;

			$blog->save();

			return response()->json($blog);

		}

	}

	public function deleteItem(Request $req)
	{
		// die('sas');
		Blog::find($req->id)->delete();

		return response()->json();

	}

}
