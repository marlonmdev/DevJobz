<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Applicants;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    // Show all job listings with filters if necessary
    public function index(){
        $searchValue = "";
        if(request('tag') !== null)  {
            $searchValue = request('tag');
        }elseif(request('search') !== null){
            $searchValue = request('search');
        }
        
        $data = Listing::latest()->filter(request(['tag', 'search']))->paginate(10);
        
        return view('listings.index', [
            'searchVal' => $searchValue,
            'listings' => $data
        ]); 
    }
    
    // Show single job listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    
    // Show create job listing form
    public function create(){
        return view('listings.create');
    }    
    
    // Store job listing
    public function store(Request $request){
        $formFields = $request->validate([
            'title'         => 'required|min:3',
            'salary'        => '',
            'company'       => 'required',
            'location'      => 'required',
            'website'       => 'required',
            'email'         => 'required|email',
            'tags'          => 'required',
            'description'   => 'required'
        ]);
        
        if($request->hasFile('logo')){
            // if there's an image file, store it inside public/logos folder inside the storage directory
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        
        $formFields['user_id'] = auth()->id();
        
        Listing::create($formFields);
        
        return redirect('/listings/create')->with('message', 'Job listing posted successfully!');
    }
    
    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }
    
    // Update job listing
    public function update(Request $request, Listing $listing){
        // Make sure logged in user is the owner of the listing
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized');
        }
        
        $formFields = $request->validate([
            'title'         => 'required',
            'salary'        => '',
            'company'       => 'required',
            'location'      => 'required',
            'website'       => 'required',
            'email'         => 'required|email',
            'tags'          => 'required',
            'description'   => 'required'
        ]);
        
        if($request->hasFile('logo')){
            // if there's an image file, store it inside public/logos folder inside the storage directory
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            
            // Delete old uploaded logo inside the storage directory
            if($listing->logo && Storage::disk('public')->exists($listing->logo)) {
                Storage::disk('public')->delete($listing->logo);
            }
        }
        
        $listing->update($formFields);
        
        return back()->with('message', 'Job listing updated successfully!');
    }
    
    // Delete job listing
    public function delete(Listing $listing){
        // Make sure logged in user is the owner of the listing
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized');
        }
        
        // Delete uploaded logo inside the storage directory
        if($listing->logo && Storage::disk('public')->exists($listing->logo)) {
            Storage::disk('public')->delete($listing->logo);
        }
        
        $listing->delete();
        
        return back()->with('message', 'Job listing deleted successfully!');
    }
    
    
    // Manage Listings
    public function manage_old(Listing $listing){
        return view('listings.manage', [
            'listings' => auth()->user()->listings()->paginate(10)
        ]); 
    }
    
    public function manage(Listing $listing){
        
        // Assuming you have the logged-in user's ID, get their job listings with applicant count
        $user_id = auth()->user()->id;
        
        $search = request('search') ?? '';
        
        $per_page = 10;

        // Retrieve the job listings with the count of applicants using 'withCount'
        $data = Listing::where('user_id', $user_id)
                        ->withCount('applicants')
                        ->filter(request(['search']))
                        ->paginate($per_page);
        
        return view('listings.manage', [
            'search' => $search,
            'listings' => $data
        ]);
        
    }
    
    
}
