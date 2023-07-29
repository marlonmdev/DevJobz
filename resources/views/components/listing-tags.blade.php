@props(['tagsCsv'])
@php
    // turns any comma separated value into an array
    $tags = explode(', ', $tagsCsv);
@endphp

@foreach($tags as $tag)
    <a href="/?tag={{ $tag }}" class="badge rounded-pill text-bg-primary" data-bs-toggle="tooltip" title="Click to filter with tags">{{ $tag }}</a>
@endforeach

    