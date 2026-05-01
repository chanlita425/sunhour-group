@extends('layouts.guest')
@php
    use Artesaos\SEOTools\Facades\SEOTools;
@endphp
@section('meta_tag')
    {!! SEOTools::generate() !!}
@endsection
@section('content')
    @component('components.navbar')
    @endcomponent
    <div class="overflow-x-hidden  scroll-smooth h-screen">

        <div class="w-full max-w-screen-xl mx-auto mt-[5rem] md:mt-[11rem] xl:mt-[10rem] px-3 md:px-5">
            @if($products->uuid == 'a2U1eS0zMTIzNTg=')
                <img  loading="lazy"
                    src="https://asia.toto.com/products/washlet/images/WASHLET.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />
            @elseif ($products->uuid == 'Y2NpVC0yNzA2NTM=')
                <img  loading="lazy"
                    src="https://asia.toto.com/products/toilets/images/TOILETS.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />
            @elseif ($products->uuid == 'YnBjeC0zMTE5OTk=')
                <img  loading="lazy"
                    src="https://asia.toto.com/products/bathtubs/images/BATHTUBS.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />
            @elseif ($products->uuid == 'SUxSMi00NDAwNDE=')
                <img  loading="lazy"
                    src="https://asia.toto.com/products/lavatories/images/LAVATORIES.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />
            @elseif ($products->uuid == 'N0xiai04MjA5NTY=')
                <img  loading="lazy"
                    src="https://asia.toto.com/products/fittings/images/Bathroom-Taps-Singapore.jpg"
                    class=" object-cover"
                    alt=""
                />
            @elseif ($products->uuid == 'WjNHbS0yOTUxODk=')
                <img  loading="lazy"
                    src="https://asia.toto.com/products/fittings/shower-column/images/c._Showers_shower-column.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />
            @elseif ($products->uuid == 'MGpVbS0zNzkyNTQ=')
                <img  loading="lazy"
                    src="https://asia.toto.com/products/public/images/PUBLIC.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />
            @else
                <img  loading="lazy"
                    src="https://www.toto.com/en/neorestcollections/images/p_mainv_sp.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />
            @endif

            <div>
                @if($products->uuid == 'a2U1eS0zMTIzNTg=')
                    <p class="text-black my-3 font-light text-wrap">
                        The innovative shower toilet technology - WASHLET is TOTO's signature product. IT was first launched in 1980 and has attracted the attention of the rest of the world with its thorough cleansing capabilities and appealing comfort features. With unparalleled hygiene and comfort standards, WASHLET is renowned as the World's first-class toilet.
                    </p>
                @elseif ($products->uuid == 'Y2NpVC0yNzA2NTM=')
                    <p class="text-black my-3 font-light text-wrap">
                        TOTO products represent the next generation of washroom products. We continuously make technological advancements to develop the most hygienic, comfortable and sustainable toilet bowl brands. Combined with TOTO's distinctive minimalist design aesthetic, our toilets enhance every washroom setting.
                    </p>
                @elseif ($products->uuid == 'YnBjeC0zMTE5OTk=')
                    <p class="text-black my-3 font-light text-wrap">
                        You now have the time to indulge in luxury everday. TOTO's wide range of bathtubs are specially designed to maximize the little time you have for yourself. Our bathtubs not only cleanse your body but also entice you to soak in supreme comfort and tranquiliry.
                    </p>
                @elseif ($products->uuid == 'SUxSMi00NDAwNDE=')
                    <p class="text-black my-3 font-light text-wrap">
                        Here at TOTO, we introduced bathroom sinks with revolutionary designs for modern living. Simple and beautiful in appearance yet comfortable and with streamlined design. Made from earth-friendly materials, our bathroom sinks in Singapore boast impressive performance with trusted durability. All the essential factors that underlie all of our bathroom basins. Browse through this page for wash basins that complement your modern bathroom.
                    </p>
                @elseif ($products->uuid == 'N0xiai04MjA5NTY=')
                    <p class="text-black my-3 font-light text-wrap">
                        Less is more. The secret of fulfilment is appreciating the simple things in life. A beautiful bathroom design can also include both the best high technology and intricately designed bathroom taps, rain showerheads, shower mixers and handshowers in Singapore. A commitment to this minimalist sensibility influences all of TOTO's design choices. Our streamlined series of fittings emanate elegance and sophistication.
                    </p>
                @elseif ($products->uuid == 'WjNHbS0yOTUxODk=')
                    <p class="text-black my-3 font-light text-wrap">
                        For every toilet, bathtub or shower product that TOTO offers, there are corresponding bathroom accessories that complement it. These uniquely designed fixtures add the finishing touches to your washroom decor, giving you convenience in the shower, by the basin, or on the toilet bowl. Apart from that, these bathroom accessories are specifically crafted to make your bathroom more comfortable and smartly designed, keeping your toilet as clean and neat as you want it to be while providing a stylish appearance for a modern-style bathroom.
                    </p>
                @elseif ($products->uuid == 'MGpVbS0zNzkyNTQ=')
                    <p class="text-black my-3 font-light text-wrap">
                        TOTO products utilize the latest technologies to provide clean and sustainable washrooms. Water-saving, energy-saving, and user-friendly, every detail and every mechanism is designed to offer comfortable, healthful, and hygienic lifestyles.
                    </p>
                @else
                @endif
            </div>
        </div>

        <section class="w-full max-w-screen-xl mx-auto px-3 md:px-5">
            <h1 class="font-medium text-[30px] p-5">
                {{ app()->getLocale() == 'en' ? $products->name : (app()->getLocale() == 'km' ? $products->name_khmer : $products->name_chinese) }}
            </h1>

            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 justify-center xl:justify-start items-center gap-[1.5rem] p-3 md:p-0">
                @foreach($category as $item)
                    <a href="{{ route('brands-client.model_category', [$brands->slug,$products->slug, $item->slug]) }}" class="group transition-all duration-150 ease-in-out">
                        <div class="w-full mx-auto overflow-hidden">
                            @if(empty($item->link))
                                <img  loading="lazy" src="https://placehold.co/500x330" alt="" class="w-[500px] h-full mx-auto object-center object-contain ">
                            @else
                            <img  loading="lazy" class="w-full h-auto mx-auto object-center object-contain group-hover:scale-[1.04] transition-all duration-300 ease-in-out"
                                 src="{{$item->link}}" alt="{{$item->name}}">
                            @endif
                        </div>
                        <h1 class="relative w-fit mx-auto text-center text-[16px] md:text-[14px] lg:text-[16] 2xl:text-[18px] leading-[14px] md:leading-[16px] 2xl:leading-[18px]  font-[500] font-['Inter'] p-3
                        before:content-['']
                        before:absolute
                        before:bottom-0
                        before:left-0
                        before:w-full
                        before:h-[2px]
                        before:bg-gray-900
                        before:scale-x-[0]
                        before:transition-transform
                        before:duration-[500ms]
                        before:ease-in-out
                        before:origin-bottom-right
                        group-hover:before:scale-x-[1]
                        group-hover:before:origin-bottom-left
                        ">{{$item->name}}</h1>
                    </a>
                @endforeach
            </div>

            {{-- FAQ Section --}}
            @if(isset($faqs) && $faqs->isNotEmpty())
                <div class="mt-[3rem] pb-[10rem]">
                    <h2 class="text-black text-xl font-medium mb-5">Frequently Asked Questions</h2>
                    <div class="space-y-3">
                        @foreach($faqs as $index => $faq)
                            @php
                                $locale = app()->getLocale();
                                $question = $locale === 'km' ? $faq->q_khmer : ($locale === 'zh' ? $faq->q_china : $faq->q_english);
                                $answer   = $locale === 'km' ? $faq->a_khmer : ($locale === 'zh' ? $faq->a_china : $faq->a_english);
                            @endphp
                            @if(!empty($question))
                                <div class="border border-gray-200 rounded-sm overflow-hidden">
                                    <button type="button"
                                        onclick="toggleFaq('faq-{{ $index }}')"
                                        class="w-full flex items-center justify-between px-4 py-3 text-left bg-white hover:bg-gray-50 transition-colors duration-150">
                                        <span class="text-sm font-medium text-black">{{ $question }}</span>
                                        <svg id="faq-icon-{{ $index }}" class="w-4 h-4 text-gray-500 shrink-0 transition-transform duration-200"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M6 9l6 6 6-6"/>
                                        </svg>
                                    </button>
                                    <div id="faq-{{ $index }}" class="hidden px-4 pb-4 bg-white">
                                        <p class="text-sm text-gray-600">{{ $answer }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @else
                <div class="pb-[10rem]"></div>
            @endif
        </section>

        <footer class="absolute inset-x-0 bottom-0 bg-black py-1">
            <p class="text-black text-[12px] text-center"> © Copyright 2024 SUNHOUR GROUP, All Rights Reserved</p>
        </footer>
    </div>
    <script>
        function toggleFaq(id) {
            const panel = document.getElementById(id);
            const index = id.replace('faq-', '');
            const icon = document.getElementById('faq-icon-' + index);
            panel.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }
    </script>
@endsection
