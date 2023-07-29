<x-layout>
    
    <section class="mt-5">
        <div id="div-container" class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-12">
                   
                    <div>
                        <a href="/listings/create" class="btn btn-primary btn-rounded"> &nbsp; ADD LISTING &nbsp;</a>
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
                                            <td>{{ $listing->applicants_count }}</td>
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
                            <h5 class="text-center text-muted">You don't have any listings yet!</h5>
                        @endunless
                        
                    </x-card>
                </div>
            </div>
        </div>
    </section>
    
    {{-- <div class="text-center mt-4 mb-3">
        <button class="btn btn-info btn-rounded text-light">
            <i class="bi bi-send-plus"></i> APPLY
        </button>
        
        &nbsp;
        
        <a href="/listings/{{ $listing->id }}/edit" class="btn btn-success btn-rounded text-light">
            <i class="bi bi-pencil"></i> EDIT
        </a>
        
        &nbsp;
        
        <button type="button" class="btn btn-danger btn-rounded text-light" data-bs-toggle="modal" data-bs-target="#deleteModal">
            <i class="bi bi-trash"></i> DELETE
        </button>
        
    </div> --}}


    
 
    <!-- Modal -->
    {{-- <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
    </div> --}}
    
</x-layout>


