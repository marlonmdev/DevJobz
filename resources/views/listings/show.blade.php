<x-layout>

    <section data-aos="zoom-in" data-aos-delay="100">
        
        <div class="container mt-5">
            <div class="mb-3">
                @auth
                    <a href="#" class="btn btn-dark btn-rounded" onclick="history.back()"> &nbsp; GO BACK &nbsp;</a>
                @else
                    <a href="/" class="btn btn-dark btn-rounded"> &nbsp; GO BACK &nbsp;</a>
                @endauth
                
            </div>
            <div class="row">
                    
                <div id="job-details" class="card">
                    <div class="card-body">
                        <div class="text-center mb-2">
                            <img src="{{ $listing->logo ? asset('storage/'. $listing->logo) : asset('images/no-image.png') }}" class="my-2" width="120" height="auto" alt="company logo">
                            <br>
                            <h4 class="fw-bolder">{{ $listing['title'] }}</h4>
                            
                            <x-listing-tags :tagsCsv="$listing->tags"/>
                        </div>
                        
                        <p class="card-text">💵 Salary : {{ $listing->salary }}</p>
                        
                        <p class="card-text">🏢 Company: {{ $listing['company'] }}</p>
                        
                        <p class="card-text">🌎 Location: {{ $listing['location'] }}</p>
                        
                        <h5 class="card-title text-success">✔ Job Description</h5>
                        
                        <p class="card-text">{{ $listing['description'] }}</p>
                        
                        <p>✉ Email: {{ $listing['email'] }}</p>
                        
                        <p>🌐 Website: <a href="{{ $listing['website'] }}" class="link-primary">{{ $listing['website'] }}</a></p> 
                        
                        <p class="small text-muted">
                            Posted On: {{ date("F d, Y", strtotime($listing['created_at'])) }}
                        </p>
                        
                        <div class="text-center mt-4 mb-3">
                            <a href="/listing/{{ $listing->id }}/apply" class="btn btn-info btn-rounded btn-lg text-light">
                                <i class="bi bi-send-plus"></i> QUICK APPLY
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>     
    
 
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">DELETE CONFIRMATION</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    Are you sure to delete Job Listing?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="/listings/{{ $listing->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes</button>  
                    </form>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>


