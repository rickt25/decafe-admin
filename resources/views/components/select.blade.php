@props([
  'error' => false
])

<select {!! $attributes->merge(['class' => 'form-control ' . ($error ? 'is-invalid' : '')]) !!}>
  {{ $slot }}
</select>

@if($error)
  <span class="invalid-feedback" role="alert">
    <strong>{{ $error }}</strong>
  </span>
@endif
