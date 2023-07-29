<x-layout>
    
    <section>
        <div id="div-container" class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3" style="margin-top:120px;">
                    <x-card>
                        <div class="mb-3 pt-4">
                            <h5 class="text-center"><span class="text-dark fs-4">Login to your Account</span></h5>
                        </div>
                        @error('invalid')
                            <div class="text-center mb-2" x-data="{show: true}" x-init="setTimeout(() => show = false, 4000)" x-show="show">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                        <form method="POST" action="/users/authenticate" class="pb-3 px-3">
                            @csrf
                            <div class="form-floating form-outline mb-3">
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control form-control-sm" placeholder="Email" autocomplete="off" />
                                <label class="form-label" for="email">Email</label>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-floating form-outline mb-3">
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control form-control-sm" placeholder="Password" autocomplete="off" />
                                <label class="form-label" for="password">Password</label>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end mb-3">
                                <div class="me-3 d-flex align-items-center">
                                    <a href="/register" class="link-primary">Don't have an Account?</a>
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded text-light btn-lg">Login Now</button>
                            </div>
                        </form>
                    </x-card>
                </div>
            </div>
        </div>
    </section>
</x-layout>