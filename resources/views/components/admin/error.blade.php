@props(['field'])
@if ($errors->has($field))
    <span class="invalid-feedback">{{$errors->first($field)}}</span>
@endif
{{-- @if (session('error'))
    <span class="invalid-feedback">{{ session('error') }}</span>
@endif --}}