<x-layout>
        
    @include('partials._hero')

    <main id="main">
    
        {{-- @include('partials._search') --}}

        <!-- ======= Job Listings Section ======= -->
        <section id="listings" class="listings">
            <div class="container">
                <div class="section-title">
                    <h2>Jobs</h2>
                    <p>Latest Postings</p>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        @if(count($listings) == 0)
                            <h2 class="text-center text-secondary">✖ No Job Postings Available</h2>
                        @endif
                        
                        @foreach($listings as $listing)
                            <x-listing-card :listing="$listing" />
                        @endforeach
                    </div>
                </div>
                
                <div class="mt-4">
                    {{ $listings->links() }}
                </div>
            </div>
        </section>

    </main>

</x-layout>
