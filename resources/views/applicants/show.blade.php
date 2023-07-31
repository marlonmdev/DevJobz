<x-layout>
    <section class="mt-5">
        <div id="div-container" class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-sm-12">
                    <div>
                        <a href="#" onclick="history.back()" class="btn btn-dark btn-rounded"> &nbsp; GO BACK &nbsp;</a>
                    </div>
                    <br>
                    <x-card>
                        <h5 class="text-center text-uppercase fw-bold">Applicant Details</h5>
                        <hr>
                        <div class="form-group mb-2">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $applicant->name }}" readonly>
                        </div>
                              
                        <div class="form-group mb-2">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $applicant->email }}" readonly>
                        </div>
                        
                        <div class="form-group mb-2">    
                            <label>Message</label>
                            <textarea name="message" class="form-control" cols="30" rows="10">{{ $applicant->message }}</textarea>
                        </div>
                        
                        <div class="my-3 text-center"> 
                            <a href="{{ asset('storage/'. $applicant->resume) }}" target="_blank" class="btn btn-danger btn-rounded">
                                &nbsp; VIEW RESUME &nbsp;
                            </a>
                        </div>
                    </x-card>
                </div>
            </div>
        </div>
    </section>  
</x-layout>