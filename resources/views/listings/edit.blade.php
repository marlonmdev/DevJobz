<x-layout>
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <x-card>
                        <form method="POST" action="/listings/{{ $listing->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="text-center mb-3">
                                <span class="text-dark text-center fs-4 ls-2">EDIT JOB LISTING</span>
                            </div>
                            
                            <div class="form-group row">
                                
                                <div class="col-sm-6 mb-2">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" name="company" value="{{ $listing->company }}">
                                    @error('company')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="col-sm-6 mb-2">
                                    <label>Job Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $listing->title }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-6 mb-2">
                                    <label>Job Location</label>
                                    <input type="text" class="form-control" name="location" value="{{ $listing->location }}">
                                    @error('location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="col-sm-6 mb-2">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ $listing->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                
                                
                                <div class="col-sm-6 mb-2">
                                    <label>Website</label>
                                    <input type="text" class="form-control" name="website" value="{{ $listing->website }}">
                                    @error('website')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            
                                <div class="col-sm-6 mb-2">
                                    <label>Monthly Salary</label>
                                    <input type="text" class="form-control" name="salary" placeholder="Salary/Salary Range" value="{{ $listing->salary }}">
                                    @error('salary')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>                               
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-2">
                                    <label>Tags (Comma Separated)</label>
                                    <input type="text" class="form-control" name="tags" placeholder="Ex. laravel, mysql, vuejs" value="{{ $listing->tags }}">
                                    @error('tags')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    
                                    <div class="mt-2">
                                        <label>Company Logo</label>
                                        <input type="file" class="form-control" name="logo">
                                    </div>
                                    
                                    <img src="{{ $listing->logo ? asset('storage/'. $listing->logo) : asset('images/no-image.png') }}" class="my-2" width="120" height="auto" alt="company logo">
                                    
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <label>Job Descritption</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10">{{ $listing->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-12 mb-2 d-flex justify-content-start">
                                <button type="submit" class="btn btn-warning btn-rounded text-light me-2">
                                    UPDATE JOB
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