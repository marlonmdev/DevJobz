<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    
    public function index($id){
        // Sample DB query
        // $data = DB::table('applicants')
        //         ->select(DB::raw('count(*) as gender_count, gender'))
        //         ->groupBy('gender')->get();
        
        $data = Applicant::where('listing_id', $id)->orderBy('id', 'desc')->paginate(10);
        
        return view('applicants.index', ['applicants' => $data]);
    }
    
    public function show(Applicant $applicant){
        return view('applicants.show', ['applicant' => $applicant]);
    }
    
    // Show job application form
    public function create(Listing $listing){
        return view('applicants.create', ['listing' => $listing]);
    }
    
    
    // Store job application
    public function store(Request $request){
        
        $formFields = $request->validate([
            'name'       => 'required|min:3',
            'email'      => 'required|email',
            'resume'     => 'required',
            'message'    => 'required|min:6'
        ]);
        
        if($request->hasFile('resume')){
            // if there's an image file, store it inside public/logos folder inside the storage directory
            $formFields['resume'] = $request->file('resume')->store('resumes', 'public');
        }
        
        $formFields['name'] = ucwords($request->name);
        $formFields['listing_id'] = $request->listing_id;
        
        Applicant::create($formFields);
        
        $redirect_page = '/listing/' . $request->listing_id; 
        
        return redirect($redirect_page)->with('message', 'Job application submitted successfully!');
    }
        
}
