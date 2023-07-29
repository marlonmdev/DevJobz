<x-layout>
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-sm-12">
                    <x-card>
                        <form method="POST" action="/applicant" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                            <div class="text-center mb-3">
                                <span class="text-dark text-center fs-4 ls-2">QUICK APPLY</span>
                            </div>
                            <div class="form-group mb-2">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                                  
                            <div class="form-group mb-2">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="{{old('email')}}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                                
                            <div class="form-group mb-2">
                                <label>Resume (*PDF Only)</label>
                                <input type="file" class="form-control" name="resume" accept="application/pdf">
                                @error('resume')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group mb-2">    
                                <label>Message</label>
                                <textarea name="message" class="form-control" cols="30" rows="10">{{old('message')}}</textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror   
                            </div>
                            

                            <div class="row mt-3">
                                <div class="col-sm-12 mb-2 d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning btn-rounded text-light me-2">
                                    SUBMIT APPLICATION
                                </button>
                                <a href="#" onclick="window.history.back()" class="btn btn-dark btn-rounded">
                                    GO BACK
                                </a>
                                </div>
                            </div>
                        </form>
                    </x-card>
                </div>
            </div>
        </div>
    </section>
</x-layout>