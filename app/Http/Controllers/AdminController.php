<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\User;
use App\Location;
use App\Company;
use App\Category;
use App\Job;
use App\Qualification;
use App\Application;

class AdminController extends Controller
{
    public function index()
    {
        $jobs = Job::get();
        return view('admin.home',['jobs'=>$jobs]);
    }
    public function skills()
    {
        $skills = Skill::get();
        return view('admin.skills',['skills'=>$skills]);
    }
    public function locations()
    {
        $locations = Location::all();
        return view('admin.locations',['locations'=>$locations]);
    }
    public function addSkill(Request $request)
    {
        $skill = New Skill;
        $skill->skill_name = $request->skill_name;
        $skill->save();
        return back()->with('Success','Skill Added');
    }
    public function addLocation(Request $request)
    {
        $location = New Location;
        $location->location = $request->location;
        $location->save();
        return back()->with('Success','Location Added');
    }
    public function companies()
    {
        $companies = Company::all();
        return view('admin.companies',['companies'=>$companies]);
    }
    public function add_company()
    {
        return view('admin.add_company');
    }
    public function post_add_company(Request $request)
    {
        $company = New Company;
        $company->company_name = $request->company_name;
        $image = $request->logo;
        $file = $this->uploadFunction($image,'logos');
        $company->company_logo = $file;
        $company->company_address = $request->address;
        $company->company_contact = $request->contact;
        $company->description = $request->description;
        $company->save();
        return back()->with('Success','Company added');
        
    }
    public function uploadFunction($image,$path)
    {
        $filename = uniqid().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/'.$path);
        $image->move($destinationPath, $filename);
        return $filename;
    }
    public function add_job()
    {
        $companies = Company::get();
        $categories = Category::get();
        $skills = Skill::get();
        $locations = Location::get();
        $qualification = Qualification::get();
        return view('admin.add_job',[
            'companies'=>$companies,
            'categories'=>$categories,
            'skills'=>$skills,
            'locations'=>$locations,
            'qualifications'=>$qualification
            ]);
    }
    public function add_category()
    {
        $categories = Category::get();
        return view('admin.categories',['categories'=>$categories]);
    }
    public function post_add_category(Request $request)
    {
        $category = New Category;
        $category->category_name = $request->category_name;
        $category->save();
        return back();
    }
    public function post_add_job(Request $request)
    {
        $job = New Job;
        $job->company_id = $request->company_id;
        $job->job_title = $request->job_title;
        $job->job_description = $request->description;
        $job->last_date_of_submission = $request->last_date_of_submission;
        $job->no_of_post = $request->number_of_post;
        $job->age_limit = $request->age_limit;
        $job->location_id = $request->location;
        $job->job_type = $request->job_type;
        $job->salary = $request->salary;
        $job->save();

        $skills = Skill::find($request->skills);
        $job->skills()->attach($skills);
        
        $categories = Category::find($request->categories);
        $job->categories()->attach($categories);
        
        $qualifications = Qualification::find($request->qualifications);
        $job->qualifications()->attach($qualifications);
        return back();
    }
    public function qualification()
    {
        $qualifications = Qualification::get();
        return view('admin.qualification',['qualifications'=>$qualifications]);
    }
    public function add_qualification(Request $request)
    {
        $qualification = New Qualification;
        $qualification->qualification = $request->qualification;
        $qualification->save();
        return back();
    }
    public function application_list()
    {
        $applications = Application::get();
        return view('admin.application_list',['applications'=>$applications]);
    }
    public function delete(Request $request)
    {
        $model = 'App\\'.$request->type;
        $model::findOrFail($request->id)->delete();
        return back();
    }
    public function edit(Request $request)
    {
        $model = 'App\\'.$request->type;
        $attribute = $request->attribute;
        $edit = $model::findOrFail($request->id);
        $edit->$attribute = $request->curr_val;
        $edit->save();
        return back();
    }
    public function edit_company($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.add_company',['company'=>$company]);
    }
    public function post_update_company(Request $request)
    {
        $company = Company::findOrFail($request->id);
        $company->company_name = $request->company_name;
        $company->company_address = $request->address;
        $company->company_contact = $request->contact;
        $company->description = $request->description;
        if($request->logo){
            $image = $request->logo;
            $file = $this->uploadFunction($image,'logos');
            $company->company_logo = $file;
        }
        $company->save();
        return redirect()->route('view_company',['id'=>$request->id]);
    }
    public function view_company($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.single_company',['company'=>$company]);
    }
    public function view_job($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.view_job',['job'=>$job]);
    }
    public function edit_job($id)
    {
        $job = Job::findOrFail($id);
        $companies = Company::get();
        $categories = Category::get();
        $skills = Skill::get();
        $locations = Location::get();
        $qualification = Qualification::get();
        $skill_ids = array();
        $qualification_ids = array();
        $category_ids = array();
        foreach($job->skills as $skill){
            array_push($skill_ids,$skill->id);
        }
        foreach($job->qualifications as $job_qualification){
            array_push($qualification_ids,$job_qualification->id);
        }
        foreach($job->categories as $category){
            array_push($category_ids,$category->id);
        }
        return view('admin.add_job',[
            'job'=>$job,
            'companies'=>$companies,
            'categories'=>$categories,
            'skills'=>$skills,
            'locations'=>$locations,
            'qualifications'=>$qualification,
            'skill_ids'=>$skill_ids,
            'qualification_ids'=>$qualification_ids,
            'category_ids'=>$category_ids
        ]);
    }
    public function post_update_job(Request $request)
    {
        $job = Job::findOrFail($request->id);
        $job->categories()->detach();
        $job->qualifications()->detach();
        $job->skills()->detach();

        $job->company_id = $request->company_id;
        $job->job_title = $request->job_title;
        $job->job_description = $request->description;
        $job->last_date_of_submission = $request->last_date_of_submission;
        $job->no_of_post = $request->number_of_post;
        $job->age_limit = $request->age_limit;
        $job->location_id = $request->location;
        $job->job_type = $request->job_type;
        $job->salary = $request->salary;
        $job->save();

        $skills = Skill::find($request->skills);
        $job->skills()->attach($skills);
        
        $categories = Category::find($request->categories);
        $job->categories()->attach($categories);
        
        $qualifications = Qualification::find($request->qualifications);
        $job->qualifications()->attach($qualifications);
        
        return redirect()->route('view_job',['id'=>$request->id]);
    }
    public function shortlist($id)
    {
        $application = Application::findOrFail($id);
        $application->status = "Shortlisted";
        $application->save();
        return back();
    }
    public function reject($id)
    {
        $application = Application::findOrFail($id);
        $application->status = "Rejected";
        $application->save();
        return back();
    }
}
