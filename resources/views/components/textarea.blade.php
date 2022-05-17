@props([
  'error' => false
])

<textarea {!! $attributes->merge(['class' => 'form-control ' . ($error ? 'is-invalid' : '')]) !!}>
  {{ $slot }}
</textarea>

@if($error)
  <span class="invalid-feedback" role="alert">
    <strong>{{ $error }}</strong>
  </span>
@endif
