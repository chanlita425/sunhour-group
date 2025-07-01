<div class="col-span-4 flex items-center justify-end">
    <a href="{{ route('profile') }}" class="flex items-center gap-2">
        <img src="{{!empty(auth()->user()->image) ? asset(auth()->user()->image) : asset('https://placehold.co/100x100')}}" alt="logo" class="w-10 h-10 rounded-full">
        <h1 class="text-gray-800 text-sm font-bold">
            {{auth()->user()->name}}
        </h1>
    </a>
</div>
