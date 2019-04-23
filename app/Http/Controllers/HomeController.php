<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\User;
use App\SkillUser;
use App\Job;
use App\Qualification;
use App\Application;
use App\Category;
use Auth;
use App\Http\Controllers\AdminController;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::take(8)->get();
        $jobs = Job::orderBy('id','desc')->take(10)->get();
        if(Auth::check()){
            if(Auth::user()->role_id == 2){
                return redirect('/admin');
            }
        }
        return view('home',['jobs'=>$jobs,'categories'=>$categories]);
    }
    public function contact_us()
    {
        return view('contact_us');
    }
    public function login()
    {
        if(Auth::guest()){
            return view('login');
        }else{
            return back();
        }
    }
    public function signup()
    {
        if(Auth::guest()){
            $skills = Skill::get();
            return view('register',['skills'=>$skills]);
        }else{
            return back();
        }
    }
    public function post_register(Request $request)
    {
        $user = New User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->password = bcrypt($request->password);
        $user->role_id = 1;
        $user->date_of_birth = $request->dob;
        $user->save();
        $skills = Skill::find($request->skills);
        $user->skills()->attach($skills);
        // to remove relationship we can use detach function
        Auth::login($user);
        return redirect('/');
    }
    public function post_login(Request $request)
    {
        if(Auth::attempt(['name'=>$request->name,'password'=>$request->password])){
            return redirect('/')->with('Success','You have been logged in');
        }else{
            return back()->with('Error','Credentials not found');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function view_all_jobs()
    {
        $jobs = Job::paginate(10);
        return view('all_jobs',['jobs'=>$jobs]);
    }
    public function getJob($id)
    {
        $job = Job::findOrFail($id);
        return view('single_job',['job'=>$job]);
    }
    public function apply_job($id)
    {
        $job = Job::findOrFail($id);
        $qualifications = Qualification::get();
        return view('apply_job',['job'=>$job,'qualifications'=>$qualifications]);
    }
    public function post_apply(Request $request,$id)
    {
        $file = New AdminController;
        $resume = $request->resume;
        $res = $file->uploadFunction($resume,'resume');
        $application = New Application;
        $application->user_id = Auth::user()->id;
        $application->job_id = $id;
        $application->resume = $res;
        $application->self_description = $request->self;
        $application->qualification_id = $request->qualification_id;
        $application->save();
        return redirect()->route('single_job',['id'=>$id]);
    }
    public function getProfile()
    {
        return view('profile');
    }
    public function get_category_job($id)
    {
        $category = Category::findOrFail($id);
        $jobs = $category->jobs;
        return view('all_jobs',['jobs'=>$jobs]);
    }
    public function get_all_categories()
    {
        $categories = Category::all();
        return view('all_categories',['categories'=>$categories]);
    }
    public function get_search(Request $request)
    {
        $jobs = Job::where('job_title','LIKE','%'.$request->search.'%')->paginate(10);
        return view('all_jobs',['jobs'=>$jobs]);
    }
}
