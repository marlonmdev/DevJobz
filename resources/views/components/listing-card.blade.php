@props(['listing'])

<x-card class="border-0 rounded-4 mb-3">
    <div class="row align-items-center gx-5" >
        <div class="col text-center text-lg-start mb-2 mb-lg-0">
            <div class="text-center mb-1">
                <img src="{{ $listing->logo ? asset('storage/'. $listing->logo) : asset('images/no-image.png') }}" class="img-fluid mb-2" width="100" height="auto" alt="company logo">
            </div>
            <div class="text-center">
                <x-listing-tags :tagsCsv="$listing->tags"/>
            </div>
        </div>
        <div class="col-lg-8">    
            <div class="bg-light p-4 rounded-4">
                <div> 
                    <h4 class="text-dark fw-bolder">{{ $listing->title }}</h4> 
                </div>
                <div class="small">
                    💵 Salary : {{ $listing->salary }}
                </div>
                <div class="small text-justify">
                    🏢 Company : {{ $listing->company }} &nbsp;&nbsp; 🌎 Location : {{ $listing->location }} 
                </div>
                <div class="small text-muted mt-2">
                    <a href="/listing/{{ $listing->id }}" class="link-info fs-6" data-bs-toggle="tooltip" title="Click to view details">View Details ▶ </a> &nbsp;&nbsp; Posted On: {{ date("F d, Y", strtotime($listing['created_at'])) }}
                </div>
            </div>
        </div>
    </div>  
</x-card>
