@if(session()->has('message')) 

  {{-- uses alpinejs to show and hide alert --}}
  <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="container fixed-top">
    <div class="row">
      <div class="col-md-8 col-sm-12 offset-md-2 offset-sm-0">
        <div class="alert alert-success text-center" role="alert">
          <span class="fs-5"><i class="bi bi-check-circle-fill"></i> {{session('message')}}</span>
        </div>
      </div>
    </div>
  </div>

@endif