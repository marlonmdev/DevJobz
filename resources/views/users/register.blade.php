<x-layout>
    <section class="mt-5">
        <div id="div-container" class="container mt-4">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <x-card>
                        <div class="mb-3 pt-4">
                            <h5 class="text-center"><span class="text-dark fs-4">Register New Account</span></h5>
                        </div>
                        <form method="POST" action="/users" class="pb-3 px-3">
                            @csrf
                            <div class="form-floating form-outline mb-3">
                                <input type="text" name="name" class="form-control form-control-sm" placeholder="Full Name" value="{{ old('name') }}" autocomplete="off" />
                                <label class="form-label" for="name">Full Name</label>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-floating form-outline mb-3">
                                <input type="text" name="email" class="form-control form-control-sm" placeholder="Email" value="{{ old('email') }}" autocomplete="off" />
                                <label class="form-label" for="username">Email</label>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-floating form-outline mb-3">
                                <input type="password" name="password" class="form-control form-control-sm" placeholder="Password" value="{{ old('password') }}" autocomplete="off" />
                                <label class="form-label" for="password">Password</label>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-floating form-outline mb-3">
                                <input type="password" name="password_confirmation" class="form-control form-control-sm" placeholder="Password" value="{{ old('password_confirmation') }}" autocomplete="off" />
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end mb-3">
                                <div class="me-3 d-flex align-items-center">
                                    <a href="/login" class="link-primary">Already have an Account?</a>
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded text-light btn-lg">Register Now</button>
                            </div>
                        </form>
                    </x-card>
                </div>
            </div>
        </div>
    </section>
</x-layout>