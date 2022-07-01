@props(['tagsCsv'])

@php
  // Turn the tags csv into an array
  $tags = explode(',', $tagsCsv);    
@endphp

<ul class="flex">
  {{-- Loop through the $tags array and render a list item --}}
  @foreach($tags as $tag)
  <li
      class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
  >
      <a href="/?tag={{$tag}}">{{ $tag }}</a>
  </li>
  @endforeach
</ul>