@props([
  'error' => false
])

<select {!! $attributes->merge(['class' => 'form-select ' . ($error ? 'is-invalid' : '')]) !!}>
  {{ $slot }}
</select>

@if($error)
  <span class="invalid-feedback" role="alert">
    <strong>{{ $error }}</strong>
  </span>
@endif
