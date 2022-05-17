@props([
  'error' => false
])

<input
  {!! $attributes->merge(['class' => 'form-control ' . ($error ? 'is-invalid' : '')]) !!}
/>

@if($error)
  <span class="invalid-feedback" role="alert">
    <strong>{{ $error }}</strong>
  </span>
@endif
