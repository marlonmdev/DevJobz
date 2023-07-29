<?php

namespace App\Models;

use App\Models\User;
use App\Models\Applicants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;
    
    protected $table = 'listings';
    
    // uncomment this if Model::unguard is not set in function boot() in the AppServiceProvider file
    // protected $fillable = ['title', 'company', 'location', 'website', 'email', 'tags', 'description'];
       
    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        
        if($filters['search'] ?? false){
            $query->where('tags', 'like', '%' . request('search') . '%')
                  ->orWhere('title', 'like', '%' . request('search') . '%')
                  ->orWhere('location', 'like', '%' . request('search') . '%')
                  ->orWhere('company', 'like', '%' . request('search') . '%')
                  ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }
    
    // Relationship to the User
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function applicants(){
        return $this->hasMany(Applicant::class, 'listing_id');
    }
    
    public function getListingApplicants(){
        $results = Listing::join('applicants', 'listings.id', '=', 'applicants.listing_id')
        ->select('listings.*', 'applicants.name')
        ->get();
        
        return $results;
    }
    
}
