@props(['color' => 'primary', 'type' => 'button'])

<button class="btn btn-{{ $color }} btn-sm" type="{{ $type }}" >{{ $slot }}</button>
