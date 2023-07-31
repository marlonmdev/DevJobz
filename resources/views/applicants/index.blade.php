<x-layout>
    
    <section class="mt-5">
        <div id="div-container" class="container" data-aos="fade-down" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <a href="#" onclick="history.back()" class="btn btn-dark btn-rounded"> &nbsp; GO BACK &nbsp;</a>
                    </div>
                    <br>
                    <x-card>
                        <h5 class="text-center text-uppercase fw-bold">Job Listing Applicants</h5>
                        <hr>
                        @unless($applicants->isEmpty())
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                               
                                    @foreach($applicants as $applicant)
                                        <tr>
                                            <td>{{ $applicant->id }}</td>
                                            <td>{{ $applicant->name }}</td>
                                            <td>{{ $applicant->email }}</td>
                                            <td class="d-flex">
                                                <div class="d-flex">
                                                    <a href="/applicant/{{ $applicant->id }}" class="btn btn-info text-light" data-bs-toggle="tooltip" title="Click to view applicant details">
                                                        <i class="bi bi-eye"></i>
                                                    </a> 
                                                    &nbsp;
                                                    <a href="{{ asset('storage/'. $applicant->resume) }}" target="_blank" class="btn btn-danger" data-bs-toggle="tooltip" title="Click to view resume">
                                                        <i class="bi bi-file-person-fill"></i>
                                                    </a>
                                                </div> 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <div class="mt-4">
                                {{ $applicants->links() }}
                            </div>
                        @else
                            <h5 class="text-center text-muted">No applicants found!</h5>
                        @endunless
                        
                    </x-card>
                </div>
            </div>
        </div>
    </section>
    
    
</x-layout>


