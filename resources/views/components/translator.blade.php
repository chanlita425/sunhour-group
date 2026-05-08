<div class="dropdown dropdown-hover dropdown-end">
    <div tabindex="0" role="button" class="w-full m-1">
       @if(session()->get('locale') == 'en')
            <img src="{{asset('en-flag.svg')}}" alt="" class="w-[2rem]">
        @elseif(session()->get('locale') == 'km')
            <img src="{{asset('kh-flag.svg')}}" alt="" class="w-[2rem]">
        @else
            <img src="{{asset('china-flag.svg')}}" alt="" class="w-[2rem]">
        @endif
    </div>
    <ul tabindex="0" class="dropdown-content menu bg-black rounded-box z-[1] w-52 p-2 shadow">
        <li class="{{session()->get('locale') != 'en' ? '': 'hidden'}}">
            <a href="{{ request()->fullUrlWithQuery(['locale' => 'en']) }}">
                <img src="{{asset('en-flag.svg')}}" alt="" class="w-[2rem]">
                <span class="text-white">
                    @lang('message.en')
                </span>
            </a>
        </li>
        <li class="{{session()->get('locale') != 'km' ? '': 'hidden'}}">
            <a href="{{ request()->fullUrlWithQuery(['locale' => 'km']) }}">
                <img src="{{asset('kh-flag.svg')}}" alt="" class="w-[2rem]">
                <span class="text-white ">
                    @lang('message.kh')
                </span>
            </a>
        </li>
        <li class="{{session()->get('locale') != 'cn' ? '': 'hidden'}}">
            <a href="{{ request()->fullUrlWithQuery(['locale' => 'cn']) }}">
                <img src="{{asset('china-flag.svg')}}" alt="" class="w-[2rem]">
                <span class="text-white">
                    @lang('message.cn')
                </span>
            </a>
        </li>
    </ul>
</div>
