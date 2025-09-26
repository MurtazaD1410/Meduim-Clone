@props(['user', 'size'=>'w-12 h-12'])

@if ($user->getFirstMedia())
<img src="{{ $user->imageUrl() }}" class="{{ $size }} rounded-full object-cover" alt="{{ $user }}">
@else
<img src="https://github.com/shadcn.png" alt="{{ $user->name }}" class="{{ $size }} rounded-full object-cover">
@endif
