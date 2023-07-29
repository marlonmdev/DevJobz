@extends('layout')

@section('content')
@include('partials._hero')

<main id="main">
  
@include('partials._search')

  <!-- ======= Job Listings Section ======= -->
  <section id="listings" class="listings">
    <div class="container" data-aos="fade-up">
      
      <div class="section-title">
        <h2>Jobs</h2>
        <p>Latest Postings</p>
      </div>

      <div class="row" data-aos="zoom-in" data-aos-delay="100">
   
        @if(count($listings) == 0)
          <h2 class="text-center text-secondary">✖ No Job Postings Available</h2>
        @endif
        
        @foreach($listings as $listing)
          <x-listing-card :listing="$listing" />
        @endforeach

      </div>

    </div>
  </section>

</main>

@endsection
