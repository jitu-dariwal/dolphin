<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
	
    /**
     * Show the application current login user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
		$user = User::find(\Auth::user()->id);
		
        return view('profile',compact(['user']));
    }
	
    /**
     * Save the application current login user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveProfile(Request $request)
    {
		if($request->isMethod('post')){
			$data = $request->all();
			
			$validArr = [
                'name' => 'required|string|max:255',
				'email' => 'required|string|email|max:255|unique:users,email,'.\Auth::user()->id,
				'mobile_number' => 'required|regex:/(44)[0-9]{9}/',
				'hint_question' => 'required',
				'hint_answer' => 'required',
            ];
			
			$validation = Validator::make($data, $validArr);
			
			if ($validation->passes()) {
				$user = User::where('id' , \Auth::user()->id)->first();
				$user->name = $data['name'];
				$user->email = $data['email'];
				$user->mobile_number = $data['mobile_number'];
				$user->hint_question = $data['hint_question'];
				$user->hint_answer = $data['hint_answer'];
				//echo "<pre>";
				//print_r($user);die;
				$user->update();
				return redirect('/profile');
			}else{
				return redirect('/profile')->withErrors($validation)->withInput();
			}
		}
    }
}
