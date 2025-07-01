<div class="hidden lg:block fixed w-full top-0 right-0 left-0  z-[100]">
    <div
        class="{{ Route::is('home') || Route::is('about-us') || Route::is('brands.all') || Route::is('career.index') || Route::is('about-us') ? 'hover:bg-[#0048a2]' : 'bg-[#0048a2]' }}
        group w-full transition-all duration-300 ease-in-out">
        <div class="w-full max-w-screen-xl mx-auto px-3 md:px-5">
            <div class="flex justify-between w-full border-b-[1px] border-gray-200 ">
                <a href="{{ route('home') }}" class="inline-flex w-[84px]">
                    <img src="{{ asset('Logo_white.png') }}" alt="logo" class="w-full h-full object-contain">
                </a>
                <div class="inline-flex items-center space-x-4">
                    <ul class="flex flex-col justify-center items-start gap-2 py-1">
                        <li class="flex items-center space-x-3">
                            <div class="flex items-start space-x-2">
                                <span class="bg-white p-[3px] md:p-1 rounded-full">
                                    <svg class="w-[12px] md:w-[14px]" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.25">
                                        <path
                                            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                        </path>
                                    </svg>
                                </span>
                                <p class="text-white text-[12px] md:text-[14px]">012 818 189</p>
                            </div>
                            <div class="flex items-start space-x-2">
                                <span class="bg-white p-[3px] md:p-1 rounded-full">
                                    <svg class="w-[12px] md:w-[14px]" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.25">
                                        <path
                                            d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                                        </path>
                                        <path d="M3 7l9 6l9 -6"></path>
                                    </svg>
                                </span>
                                <p class="text-white text-[12px] md:text-[14px]">ssl@sunhourgroup.com.kh</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-2">
                            <span class="bg-white p-[3px] md:p-1 rounded-full">
                                <svg class="w-[12px] md:w-[14px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.25">
                                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                    <path
                                        d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                                    </path>
                                </svg>
                            </span>
                            <p class="text-white text-[12px] md:text-[14px]">
                                <!--#427, Monivong Blv, Sangkat Boeung Prolit, Khan 7 Makara, Phnom Penh, Cambodia-->
                                @lang('message.address')
                            </p>
                        </li>
                    </ul>
                    @component('components.translator')
                    @endcomponent
                </div>
            </div>
            <div
                class="{{ Route::is('home')  || Route::is('brands.all') || Route::is('career.index') ? 'group-hover:border-b-[0px] border-b-[1px] border-gray-200' : 'border-b-[0px]' }}">
                <ul class="flex lg:justify-between items-center gap-10">
                    <li
                        class="{{ Route::is('home') ? 'border-b-4' : '' }}
                    hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                        <a href="{{ route('home') }}"
                            class="text-white text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">@lang('message.home')</a>
                    </li>
                    <li
                        class="{{ Route::is('about-us') ? 'border-b-4' : '' }}
                    hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                        <a href="{{ route('about-us') }}"
                            class="text-white text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">@lang('message.aboutus')</a>
                    </li>
                    <li
                        class="group
                    hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                        <button id="product"
                            class=" text-white text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">@lang('message.product')</button>

                        <div id="list"
                            class="fixed top-0 invisible  right-0 left-0 w-full mt-[7rem] bg-white h-fit transition-all duration-300 ease-linear">
                            <div class="max-w-screen-xl mx-auto p-5">
                                <div class="grid grid-cols-5 justify-center items-start gap-3">
                                    <div>
                                        <h1
                                            class="font-bold {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : "lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                            @lang('message.SanitaryWareFitting')</h1>
                                        <ul>
                                            <li
                                                class="hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                                                <a href="https://sunhourgroup.com.kh/bXRMSTQ3OC0y/Y2NpVC0yNzA2NTM=/category"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                    @lang('message.Toilets')
                                                </a>
                                            </li>
                                            <li class="hover:border-b-4 border-[#3b83db] py-4">
                                                <a href="https://sunhourgroup.com.kh/bXRMSTQ3OC0y/N0xiai04MjA5NTY=/category"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                    @lang('message.FaucetSeries')
                                                </a>
                                            </li>
                                            <li class="hover:border-b-4 border-[#3b83db] py-4">
                                                <a href="https://sunhourgroup.com.kh/bXRMSTQ3OC0y/YnBjeC0zMTE5OTk=/category"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                    @lang('message.Bathtubs')
                                                </a>
                                            </li>
                                            <li class="hover:border-b-4 border-[#3b83db] py-4">
                                                <a href="https://sunhourgroup.com.kh/bXRMSTQ3OC0y/MGpVbS0zNzkyNTQ=/category"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                    @lang('message.Public')
                                                </a>
                                            </li>
                                            <li class="hover:border-b-4 border-[#3b83db] py-4">
                                                <a href="https://sunhourgroup.com.kh/bXRMSTQ3OC0y/WjNHbS0yOTUxODk=/category"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                    @lang('message.Accessories')
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h1
                                            class="font-bold {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                            @lang('message.WaterHeaterSystem')</h1>
                                        <ul>
                                            <li
                                                class="hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                                                <a href="https://sunhourgroup.com.kh/OVhQd3B1dy0x/VDlNQS04NjUwMTU=/models"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                    @lang('message.InstantaneousWaterHeater')
                                                </a>
                                            </li>
                                            <li class="hover:border-b-4 border-[#3b83db] py-4">
                                                <a href="https://sunhourgroup.com.kh/OVhQd3B1dy0x/dU40bS0xMDQzMDk=/models"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                    @lang('message.GasboilerWaterHeater')
                                                </a>
                                            </li>
                                            <li class="hover:border-b-4 border-[#3b83db] py-4">
                                                <a href="https://sunhourgroup.com.kh/OVhQd3B1dy0x/OUpJSC00ODQ3NTU=/models"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                    @lang('message.StorageWaterHeater')
                                                </a>
                                            </li>
                                            <li class="hover:border-b-4 border-[#3b83db] py-4">
                                                <a href="https://sunhourgroup.com.kh/OVhQd3B1dy0x/Q0ZRMjAwNTM0OQ==/models"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                    @lang('message.SolarWaterHeater')
                                                </a>
                                            </li>
                                            <li class="hover:border-b-4 border-[#3b83db] py-4">
                                                <a href="https://sunhourgroup.com.kh/OVhQd3B1dy0x/RlRZLTIwMDg0Mg==/models"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Inter']" }}">
                                                    @lang('message.HeatPump')
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h1
                                            class="font-bold {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                            @lang('message.WaterPump')</h1>
                                        <ul>
                                            <li
                                                class="hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                                                <a href="https://sunhourgroup.com.kh/NWpEWGJUWi0z/eGZLTy00MDI0OTQ=/models"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                    @lang('message.WaterTransfer')
                                                </a>
                                            </li>
                                            <li class="hover:border-b-4 border-[#3b83db] py-4">
                                                <a href="https://sunhourgroup.com.kh/NWpEWGJUWi0z/WEFZSC02MDE2MTc=/models"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                    @lang('message.WaterPressurepump')
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h1
                                            class="font-bold {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                            @lang('message.WaterFilter')</h1>
                                        <ul>
                                            <li
                                                class="hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                                                <a href="https://sunhourgroup.com.kh/ZG56bDFzUS00/RHNacC00MjAxODk=/models"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                    @lang('message.HomeDrinkingWaterSystem')
                                                </a>
                                            </li>
                                            <li class="hover:border-b-4 border-[#3b83db] py-4">
                                                <a href="https://sunhourgroup.com.kh/ZG56bDFzUS00/SVpHby01MDc1MTE=/models"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                    @lang('message.WaterDispenser')
                                                </a>
                                            </li>
                                            <li class="hover:border-b-4 border-[#3b83db] py-4">
                                                <a href="https://sunhourgroup.com.kh/ZG56bDFzUS00/T3Vpdi00MzYwMDE=/models"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                    @lang('message.IndustrialWaterTreatmentSystem')
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h1
                                            class="font-bold {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                            @lang('message.PorcelainTileCeramicTile')</h1>
                                        <ul>
                                            <li
                                                class="hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                                                <a href="https://www.rakceramics.com/asia/en/tiles-floors-coverings/tile-technology"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Inter']" }}">
                                                    @lang('message.RakStone')
                                                </a>
                                            </li>
                                            <li class="hover:border-b-4 border-[#3b83db] py-4">
                                                <a href="https://www.rakceramics.com/asia/en/large-format-porcelain-tiles-slab/maximus"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Inter']" }}">
                                                    @lang('message.SwimmingPool')
                                                </a>
                                            </li>
                                            <li class="hover:border-b-4 border-[#3b83db] py-4">
                                                <a href="https://www.rakceramics.com/asia/en/signature-collection"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Inter']" }}">
                                                    @lang('message.WallTiles')
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li
                        class="{{ Route::is('brands.all') ? 'border-b-4' : '' }}
                    hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                        <a href="{{ route('brands.all') }}"
                            class="text-white text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">@lang('message.brand')</a>
                    </li>
                    <li
                        class="{{ Route::is('partnerships.index') ? 'border-b-4' : '' }}
                    hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                        <a href="{{ route('partnerships.index') }}"
                            class="text-white text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">@lang('message.partnerships')</a>
                    </li>
                    <li
                        class="{{ Route::is('career.index') ? 'border-b-4' : '' }}
                    hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                        <a href="{{ route('career.index') }}"
                            class="text-white text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">@lang('message.career')</a>
                    </li>
                    <li
                        class="{{ Route::is('contact.index') ? 'border-b-4' : '' }}
                    hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                        <a href="{{ route('contact.index') }}"
                            class="text-white text-[14px] font-light
                        {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}
                        ">@lang('message.contact')</a>
                    </li>
                    <li>
                        <div class="w-full">
                            <form action="{{ route('search.index') }}" method="GET"
                                class="w-full lg:w-[14vh] xl:w-[24vh] mx-auto">
                                <label for="search"
                                    class="w-full flex items-center gap-2 bg-gray-100 rounded-full px-4 py-2">
                                    <button type="submit">
                                        <span>
                                            <svg class="text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-linecap="round" stroke-linejoin="round" width="24"
                                                height="24" stroke-width="1.25">
                                                <path d="M11 19a8 8 0 1 0 0 -16a8 8 0 0 0 0 16z"></path>
                                                <path d="M21 21l-4.35 -4.35"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <input name="search" value="{{ request('search') }}" type="text"
                                        placeholder="@lang('message.search')"
                                        class="w-full text-gray-800 bg-transparent outline-none">
                                </label>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="lg:hidden block fixed w-full top-0 left-0 z-[1000] bg-white">
    <div class="w-full max-w-screen-xl mx-auto px-3 md:px-5">
        <div class="flex justify-between items-center w-full border-b-[1px] border-gray-200 py-2">
            <div class="flex items-center">
                <button id="btnOpen" class="z-[20] bg-[#395aa0]/20 p-2 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" width="20" height="20"
                        stroke-width="2">
                        <path d="M4 6l16 0"></path>
                        <path d="M4 12l16 0"></path>
                        <path d="M4 18l16 0"></path>
                    </svg>
                </button>
                <a href="{{ route('home') }}">
                    <img src="{{ asset('logos.png') }}" alt="logo" class="w-[70px] h-[70px] object-contain">
                </a>
            </div>
            <div class="w-full">
                <form action="{{ route('search.index') }}" method="GET" class="w-[24vh] ms-auto pe-5">
                    <label for="search" class="w-full flex items-center gap-2 bg-gray-100 rounded-full px-4 py-2">
                        <button type="submit">
                            <span>
                                <svg class="text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" width="24" height="24" stroke-width="1.25">
                                    <path d="M11 19a8 8 0 1 0 0 -16a8 8 0 0 0 0 16z"></path>
                                    <path d="M21 21l-4.35 -4.35"></path>
                                </svg>
                            </span>
                        </button>
                        <input name="search" value="{{ request('search') }}" type="text"
                            placeholder="@lang('message.search')"
                            class="w-full text-gray-800 bg-transparent outline-none">
                    </label>
                </form>
            </div>
            @component('components.translator')
            @endcomponent
        </div>
    </div>
    <div id="menu"
        class="translate-x-[-100%] opacity-0
     w-full fixed inset-0 bg-[#0048a2] overflow-y-auto z-[999] transition-all duration-300 ease-in-out">
        <div class="flex justify-between items-center w-full border-b-[1px] border-gray-200 p-2">
            <div class="z-[10]">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('Logo_white.png') }}" alt="logo"
                        class="w-[48px] h-[48px] object-contain">
                </a>
            </div>

            <button id="btnClose" class="hover:bg-black/30 rounded-full p-2 transition-all duration-300 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#ffffff"
                    stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                    <path d="M18 6l-12 12"></path>
                    <path d="M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div class="w-full border-b-[1px] border-gray-200">
            <ul class="flex flex-col ">
                <li
                    class="w-full p-2 {{ Route::is('home') ? 'bg-white/30' : '' }}
                    hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                    <a href="{{ route('home') }}"
                        class="text-white text-[14px] font-[400] {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">@lang('message.home')</a>
                </li>
                <li
                    class="w-full p-2 {{ Route::is('about-us') ? 'bg-white/30' : '' }}
                    hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                    <a href="{{ route('about-us') }}"
                        class="text-white text-[14px] font-[400] {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">@lang('message.aboutus')</a>
                </li>
                <li
                    class="group w-full p-2 {{ Route::is('about-us') ? 'bg-white/30' : '' }}
                    hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                    <button
                        class="text-white text-[14px] font-[400] {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">@lang('message.product')</button>
                    <div
                        class="group-hover:block hidden w-full bg-white h-fit transition-all duration-300 ease-linear">
                        <div class="max-w-screen-xl mx-auto p-5">
                            <div class="grid grid-cols-1 justify-center items-start gap-3">
                                <div>
                                    <h1
                                        class="font-bold {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                        @lang('message.SanitaryWareFitting')</h1>
                                    <ul>
                                        <li
                                            class="hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                                            <a href="https://sunhourgroup.com.kh/bXRMSTQ3OC0y/Y2NpVC0yNzA2NTM=/category"
                                                class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                @lang('message.Toilets')
                                            </a>
                                        </li>
                                        <li class="hover:border-b-4 border-[#3b83db] py-4">
                                            <a href="https://sunhourgroup.com.kh/bXRMSTQ3OC0y/N0xiai04MjA5NTY=/category"
                                                class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                @lang('message.FaucetSeries')
                                            </a>
                                        </li>
                                        <li class="hover:border-b-4 border-[#3b83db] py-4">
                                            <a href="https://sunhourgroup.com.kh/bXRMSTQ3OC0y/YnBjeC0zMTE5OTk=/category"
                                                class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                @lang('message.Bathtubs')
                                            </a>
                                        </li>
                                        <li class="hover:border-b-4 border-[#3b83db] py-4">
                                            <a href="https://sunhourgroup.com.kh/bXRMSTQ3OC0y/MGpVbS0zNzkyNTQ=/category"
                                                class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                @lang('message.Public')
                                            </a>
                                        </li>
                                        <li class="hover:border-b-4 border-[#3b83db] py-4">
                                            <a href="https://sunhourgroup.com.kh/bXRMSTQ3OC0y/WjNHbS0yOTUxODk=/category"
                                                class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                @lang('message.Accessories')
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div>
                                    <h1
                                        class="font-bold {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                        @lang('message.WaterHeaterSystem')</h1>
                                    <ul>
                                        <li
                                            class="hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                                            <a href="https://sunhourgroup.com.kh/OVhQd3B1dy0x/VDlNQS04NjUwMTU=/models"
                                                class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                @lang('message.InstantaneousWaterHeater')
                                            </a>
                                        </li>
                                        <li class="hover:border-b-4 border-[#3b83db] py-4">
                                            <a href="https://sunhourgroup.com.kh/OVhQd3B1dy0x/dU40bS0xMDQzMDk=/models"
                                                class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                @lang('message.GasboilerWaterHeater')
                                            </a>
                                        </li>
                                        <li class="hover:border-b-4 border-[#3b83db] py-4">
                                            <a href="https://sunhourgroup.com.kh/OVhQd3B1dy0x/OUpJSC00ODQ3NTU=/models"
                                                class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                @lang('message.StorageWaterHeater')
                                            </a>
                                        </li>
                                        <li class="hover:border-b-4 border-[#3b83db] py-4">
                                            <a href="https://sunhourgroup.com.kh/OVhQd3B1dy0x/Q0ZRMjAwNTM0OQ==/models"
                                                class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                @lang('message.SolarWaterHeater')
                                            </a>
                                        </li>
                                        <li class="hover:border-b-4 border-[#3b83db] py-4">
                                            <a href="https://sunhourgroup.com.kh/OVhQd3B1dy0x/RlRZLTIwMDg0Mg==/models"
                                                class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Inter']" }}">
                                                @lang('message.HeatPump')
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div>
                                    <h1
                                        class="font-bold {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                        @lang('message.WaterPump')</h1>
                                    <ul>
                                        <li
                                            class="hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                                            <a href="https://sunhourgroup.com.kh/NWpEWGJUWi0z/eGZLTy00MDI0OTQ=/models"
                                                class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                @lang('message.WaterTransfer')
                                            </a>
                                        </li>
                                        <li class="hover:border-b-4 border-[#3b83db] py-4">
                                            <a href="https://sunhourgroup.com.kh/NWpEWGJUWi0z/WEFZSC02MDE2MTc=/models"
                                                class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                @lang('message.WaterPressurepump')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <h1
                                        class="font-bold {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                        @lang('message.WaterFilter')</h1>
                                    <ul>
                                        <li
                                            class="hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                                            <a href="https://sunhourgroup.com.kh/ZG56bDFzUS00/RHNacC00MjAxODk=/models"
                                                class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                @lang('message.HomeDrinkingWaterSystem')
                                            </a>
                                        </li>
                                        <li class="hover:border-b-4 border-[#3b83db] py-4">
                                            <a href="https://sunhourgroup.com.kh/ZG56bDFzUS00/SVpHby01MDc1MTE=/models"
                                                class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                @lang('message.WaterDispenser')
                                            </a>
                                        </li>
                                        <li class="hover:border-b-4 border-[#3b83db] py-4">
                                            <a href="https://sunhourgroup.com.kh/ZG56bDFzUS00/T3Vpdi00MzYwMDE=/models"
                                                class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                                @lang('message.IndustrialWaterTreatmentSystem')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <h1
                                        class="font-bold {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">
                                        @lang('message.PorcelainTileCeramicTile')</h1>
                                    <ul>
                                            <li
                                                class="hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                                                <a href="https://www.rakceramics.com/asia/en/tiles-floors-coverings/tile-technology"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Inter']" }}">
                                                    @lang('message.RakStone')
                                                </a>
                                            </li>
                                            <li class="hover:border-b-4 border-[#3b83db] py-4">
                                                <a href="https://www.rakceramics.com/asia/en/large-format-porcelain-tiles-slab/maximus"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Inter']" }}">
                                                    @lang('message.SwimmingPool')
                                                </a>
                                            </li>
                                            <li class="hover:border-b-4 border-[#3b83db] py-4">
                                                <a href="https://www.rakceramics.com/asia/en/signature-collection"
                                                    class="text-black text-[14px] font-light {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Inter']" }}">
                                                    @lang('message.WallTiles')
                                                </a>
                                            </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li
                    class="w-full p-2 {{ Route::is('brands.all') ? 'bg-white/30' : '' }}
                    hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                    <a href="{{ route('brands.all') }}"
                        class="text-white text-[14px] font-[400] {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">@lang('message.brand')</a>
                </li>
                <li
                    class="w-full p-2 {{ Route::is('partnerships.index') ? 'bg-white/30' : '' }}
                    hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                    <a href="{{ route('partnerships.index') }}"
                        class="text-white text-[14px] font-[400] {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">@lang('message.partnerships')</a>
                </li>
                <li
                    class="w-full p-2 {{ Route::is('career.index') ? 'bg-white/30' : '' }}
                    hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                    <a href="{{ route('career.index') }}"
                        class="text-white text-[14px] font-[400] {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}">@lang('message.career')</a>
                </li>
                <li
                    class="w-full p-2 {{ Route::is('contact.index') ? 'bg-white/30' : '' }}
                    hover:border-b-4 border-[#3b83db] py-4 transition-all duration-300 ease-in-out">
                    <a href="{{ route('contact.index') }}"
                        class="text-white text-[14px] font-[400]
                        {{ session()->get('locale') === 'en' ? "font-['Inter']  lg:text-[16px] xl:text-[18px]" : " lg:text-[14px] xl:text-[16px] font-['Siemreap']" }}
                        ">@lang('message.contact')</a>
                </li>
            </ul>
        </div>

        <ul class="flex flex-col justify-center items-start gap-2 p-2">
            <li class="flex items-center space-x-3">
                <div class="flex items-start space-x-2">
                    <span class="bg-white p-[3px] md:p-1 rounded-full">
                        <svg class="w-[12px] md:w-[14px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.25">
                            <path
                                d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                            </path>
                        </svg>
                    </span>
                    <p class="text-white text-[12px] md:text-[14px]">012 818 189</p>
                </div>
                <div class="flex items-start space-x-2">
                    <span class="bg-white p-[3px] md:p-1 rounded-full">
                        <svg class="w-[12px] md:w-[14px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.25">
                            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                            </path>
                            <path d="M3 7l9 6l9 -6"></path>
                        </svg>
                    </span>
                    <p class="text-white text-[12px] md:text-[14px]">ssl@sunhourgroup.com.kh</p>
                </div>
            </li>
            <li class="flex items-start space-x-2">
                <span class="bg-white p-[3px] md:p-1 rounded-full">
                    <svg class="w-[12px] md:w-[14px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.25">
                        <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                        <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                        </path>
                    </svg>
                </span>
                <p class="text-white text-[12px] md:text-[14px]">
                    #427, Monivong Blv, Sangkat Boeung Prolit, Khan 7 Makara, Phnom Penh, Cambodia
                </p>
            </li>
        </ul>
    </div>
</div>

<script>
    const isOpen = document.getElementById('btnOpen');
    const isClose = document.getElementById('btnClose');
    const menu = document.getElementById('menu');
    const product = document.getElementById('product');
    const list = document.getElementById('list');
    isOpen.addEventListener('click', () => {
        menu.classList.remove('translate-x-[-100%]', 'opacity-0');
    })
    isClose.addEventListener('click', () => {
        menu.classList.add('translate-x-[-100%]', 'opacity-0');
    })
    product.addEventListener('mouseenter', () => {
        list.classList.remove('invisible');
    })
    list.addEventListener('mouseleave', () => {
        list.classList.add('invisible');
    })
</script>
