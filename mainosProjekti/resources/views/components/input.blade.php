@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-spruce-700 focus:ring-spruce-700 rounded-md shadow-sm']) !!}>
