<x-layout>
    <section class="mt-5">
        <div id="div-container" class="container mt-4">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <x-card>
                        <div class="mb-3 pt-4">
                            <h5 class="text-center"><span class="text-dark fs-4">Change Account Password</span></h5>
                        </div>
                        <form method="POST" action="/users/{{ auth()->id() }}" class="pb-3 px-3">
                            @csrf
                            @method('PUT')
                            <div class="form-floating form-outline mb-3">
                                <input type="password" name="current_password" class="form-control form-control-sm" placeholder="Current Name" value="{{ old('current_password') }}" autocomplete="off" />
                                <label class="form-label" for="name">Current Password</label>
                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-floating form-outline mb-3">
                                <input type="password" name="password" class="form-control form-control-sm" placeholder="New Password" value="{{ old('password') }}" autocomplete="off" />
                                <label class="form-label" for="password">New Password</label>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-floating form-outline mb-3">
                                <input type="password" name="password_confirmation" class="form-control form-control-sm" placeholder="Confirm New Password" value="{{ old('password_confirmation') }}" autocomplete="off" />
                                <label class="form-label" for="password_confirmation">Confirm New Password</label>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end mb-3">
                                <button type="submit" class="btn btn-dark btn-rounded text-light btn-lg">UPDATE PASSWORD</button>
                            </div>
                        </form>
                    </x-card>
                </div>
            </div>
        </div>
    </section>
</x-layout>