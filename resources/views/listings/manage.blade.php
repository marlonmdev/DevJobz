<x-layout>
    
    <section class="mt-5">
        <div id="div-container" class="container">
            <div class="row">
                <div class="col-lg-12">
                   
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <a href="/listings/create" class="btn btn-info text-light btn-rounded fw-bolder"> &nbsp; ADD NEW &nbsp;</a>
                            &nbsp;
                            <a href="/listings/manage" class="btn btn-dark text-light btn-rounded fw-bolder"> &nbsp; REFRESH &nbsp;</a>
                        </div>
                        
                        <div class="col-md-6 col-sm-12">
                            <form action="/listings/manage">
                                <div class="input-group news-input">
                                    <input type="text" class="form-control" name="search" value="{{ $search }}" placeholder="Search here.."/>
                                    <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i></button>  
                                </div>
                            </form>                               
                        </div>                      
                            
                    </div>
                    
                    <br>
                    <x-card>
                        <h5 class="text-center text-uppercase fw-bold">Your Job Listings</h5>
                        <hr>
                        @unless($listings->isEmpty())
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Job Title</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Applicants</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                               
                                    @foreach($listings as $listing)
                                        <tr>
                                            <td>{{ $listing->id }}</td>
                                            <td>{{ $listing->title }}</td>
                                            <td>{{ $listing->company }}</td>
                                            <td>
                                                <a href="/listing/{{ $listing->id }}/applicants" class="text-dark" data-bs-toggle="tooltip" title="Click to view applicants">
                                                    <strong> [ {{ $listing->applicants_count }} ]</strong> <span class="text-primary"><i class="bi bi-arrow-right-short fs-5"></i>View</span>
                                                </a>
                                            </td>
                                            <td class="d-flex">
                                                <div class="d-flex">
                                                    <a href="/listing/{{ $listing->id }}" class="btn btn-warning text-light">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    &nbsp;
                                                    <a href="/listings/{{ $listing->id }}/edit" class="btn btn-success">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    &nbsp;
                                                    <form method="POST" action="/listings/{{ $listing->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="bi bi-trash"></i>
                                                        </button>  
                                                    </form>  
                                                </div> 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <div class="mt-4">
                                {{ $listings->links() }}
                            </div>
                        @else
                            <h5 class="text-center text-muted">No Listings Found!</h5>
                        @endunless
                        
                    </x-card>
                </div>
            </div>
        </div>
    </section>
    
</x-layout>


