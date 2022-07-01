{{-- merge() -> will merge attributes defined on the component instance, with the string of preset attribute values --}}
{{-- merge(['attribute' => 'preset attribute values']) --}}
<div {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6']) }}>
  {{ $slot }}
</div>