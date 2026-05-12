@extends('layouts.guest')
@section('meta_tag')
    {!! SEOMeta::generate() !!}
@endsection
@section('content')
    {{-- Navbar --}}
    @component('components.navbar')
    @endcomponent
    <div class=" p-0 overflow-x-hidden  scroll-smooth h-screen">

        {{-- lead banner image --}}
        <div class="w-full max-w-screen-xl mx-auto mt-[5rem] xl:mt-[10rem] px-3 md:px-5">
            @if($brands->uuid == 'eTRFTWZVeS01')
                <img loading="lazy"
                    src="https://diix1yrt822hg.cloudfront.net/media/products/tiles/images/series/__sized__/chiancastone/ambience/high-res/ChiancaStone-crop-c0-5__0-5-1600x775.png"
                    class="w-full h-[30vh] xl:h-[40vh] object-cover"
                    alt=""
                />
            @elseif($brands->uuid == 'OVhQd3B1dy0x')
                <img
                    src="https://www.aristongroup.com/content/dam/aristongroup/images/our-brands/NUOS%20PLUS%20S2_bathroom%20(1).jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />
            @elseif(
            $brands->uuid === 'NWpEWGJUWi0z')
                <img loading="lazy"
                    src="https://grundfos.scene7.com/is/image/grundfos/products-service-optimization-and-consultancy-heroimage-master:1800x500?wid=3600&hei=1000&dpr=off"
                    class="w-full h-[30vh] xl:h-[40vh] object-cover"
                    alt=""
                />
            @elseif(
            $brands->uuid === 'ZG56bDFzUS00')
                <img loading="lazy"
                    src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi1yHgQnWYE5JhDZJsWIdUUFkqRSLcetVcvgQZ6UYyNG3zeNzaQkdfrJfEbZUt_IjHfzN1AdPYrjq-LQaEWMVLkcU7SJQpHWjAH_zk8qKwmoZYWfmDqaWz3Y8hI7FfVzEHXRFrHhAulpUg/w1425-h430-c/purepro-rs-108-dm-6a.jpg"
                    class="w-full h-[30vh] xl:h-[40vh] object-cover"
                    alt=""
                />
            @else
                <img loading="lazy"
                    src="https://asia.toto.com/neorestcollections/images/p_mainv.jpg"
                    class="w-full h-[30vh] xl:h-[40vh] object-cover"
                    alt=""
                />
            @endif
        </div>
        <div class="w-full max-w-screen-xl mx-auto px-3 md:px-5">
            <h1 class="text-center font-medium text-[20px] md:text-[22px] lg:text-[32px] xl:text-[32px] p-5"> {{ $brands->name ?? $navCategoryTitle }} Products</h1>
            @if(!empty($brands->description))
                <div class="w-full max-w-screen-xl mx-auto text-black mb-16 mt-3 ">{!! $brands->description !!}</div>
            @endif
            <div class="grid grid-cols-2  md:grid-cols-3 xl:grid-cols-4 justify-center xl:justify-start items-center gap-[1.5rem] p-3 md:p-0">
                @foreach($product as $item)
                    @if($item->status === 1)
                        <a href="{{ route('category.show', [$brands->slug, $item->slug]) }}" class="group transition-all duration-150 ease-in-out">
                            <div class="w-full {{$brands->uuid === 'bXRMSTQ3OC0y' ? 'h-full md:h-[200px]':'h-[200px] md:h-[230px]'}} mx-auto overflow-hidden">
                                @if(empty($item->link))
                                    <img loading="lazy" src="https://placehold.co/500x330" alt="" class="w-full lg:w-[400px] h-full mx-auto object-center object-cover ">
                                @else
                                    <img loading="lazy" class="w-full h-full mx-auto object-center object-cover group-hover:scale-[1.04] transition-all duration-300 ease-in-out"
                                         src="{{$item->link}}" alt="{{$item->name}}">
                                @endif
                            </div>
                            <h1 class="relative w-fit mx-auto text-center text-wrap text-[16px] md:text-[14px] lg:text-[16] 2xl:text-[18px] leading-[14px] md:leading-[16px] 2xl:leading-[18px]  font-[500] p-3
                                before:content-[''] before:absolute
                                before:bottom-0 before:left-0 before:w-full  before:h-[2px] before:bg-gray-900 before:scale-x-[0] before:transition-transform before:duration-[500ms]
                                before:ease-in-out before:origin-bottom-right group-hover:before:scale-x-[1] group-hover:before:origin-bottom-left">
                                {{session()->get('locale') == 'en' ? $item->name : (session()->get('locale') == 'km' ? $item->name_khmer : $item->name_chinese)}}
                            </h1>
                        </a>
                    @else
                        <a href="{{ route('brands-client.model', [$brands->slug, $item->slug]) }}" class="group transition-all duration-150 ease-in-out">
                            <div class="w-full {{$brands->uuid === 'bXRMSTQ3OC0y' ? 'h-full md:h-[200px]':'h-[200px] md:h-[230px]'}} mx-auto overflow-hidden">
                                @if(empty($item->link))
                                    <img loading="lazy" src="https://placehold.co/500x330" alt="" class="w-full lg:w-[400px] h-full mx-auto object-center object-cover ">
                                @else
                                    <img loading="lazy" class="w-full h-full mx-auto object-center object-cover group-hover:scale-[1.04] transition-all duration-300 ease-in-out"
                                         src="{{$item->link}}" alt="{{$item->name}}">
                                @endif
                            </div>
                            <h1 class="relative w-fit mx-auto text-center text-[16px] md:text-[14px] lg:text-[16] 2xl:text-[18px] leading-[14px] md:leading-[16px] 2xl:leading-[18px]  font-[500] p-3
                                before:content-[''] before:absolute before:bottom-0 before:left-0
                                before:w-full before:h-[2px] before:bg-gray-900 before:scale-x-[0] before:transition-transform before:duration-[500ms]  before:ease-in-out  before:origin-bottom-right  group-hover:before:scale-x-[1]  group-hover:before:origin-bottom-left">
                                    {{session()->get('locale') == 'en' ? $item->name : (session()->get('locale') == 'km' ? $item->name_khmer : $item->name_chinese)}}
                            </h1>
                        </a>
                    @endif
                @endforeach
            </div>

            {{-- FAQ Section --}}
            @if(isset($faqs) && $faqs->isNotEmpty())
            <div class="my-[3rem] max-w-full mx-auto">
                <h2 class="text-black text-xl font-medium my-4 text-center">Frequently Asked Questions</h2>
                <div class="flex flex-col gap-2 pb-[10rem]">
                    @foreach($faqs as $index => $faq)
                        @php
                            $locale = app()->getLocale();
                            $question = $locale === 'km' ? $faq->q_khmer : ($locale === 'zh' ? $faq->q_china : $faq->q_english);
                            $answer   = $locale === 'km' ? $faq->a_khmer : ($locale === 'zh' ? $faq->a_china : $faq->a_english);
                        @endphp
                        @if(!empty($question))
                            <button type="button"
                                onclick="selectFaq({{ $index }}, this)"
                                id="faq-btn-{{ $index }}"
                                class="faq-btn w-full flex items-center justify-between px-4 py-3 text-left bg-white transition-colors duration-150"
                                style="border: 0.5px solid #B5D4F4; border-left: 3px solid #378ADD;">
                                <span class="text-sm font-medium faq-label" style="color: #000;">{{ $question }}</span>
                                <svg class="faq-arrow w-4 h-4 shrink-0" style="color: #378ADD;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 18l6-6-6-6"/>
                                </svg>
                            </button>
                            <div id="faq-panel-{{ $index }}" class="hidden px-4 py-3"
                                style="background:#B5D4F4; border: 0.5px solid #85B7EB; border-left: 3px solid #185FA5; border-top: none;">
                                <p class="text-sm leading-relaxed" style="color: #0C447C;">{{ $answer }}</p>
                                @if(!empty($faq->link_text) && !empty($faq->link_url))
                                    <a href="{{ $faq->link_url }}" class="inline-block mt-2 text-sm font-medium underline underline-offset-2" style="color: #0C447C;">{{ $faq->link_text }}</a>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @else
                <div class="pb-[10rem]"></div>
            @endif
        </div>

        <footer class="absolute inset-x-0 bottom-0 bg-black py-1">
            <p class="text-white text-[12px] text-center">© Copyright 2024 SUNHOUR GROUP, All Rights Reserved</p>
        </footer>
    </div>
</div>

<script>
let activeFaq = null;

function selectFaq(index, btn) {
    // Close previous
    if (activeFaq !== null && activeFaq !== index) {
        const prev = document.getElementById('faq-btn-' + activeFaq);
        prev.style.background = '#ffffff';
        prev.style.borderColor = '#B5D4F4';
        prev.style.borderLeftColor = '#378ADD';
        prev.querySelector('.faq-label').style.color = '#000';
        prev.querySelector('.faq-arrow').style.color = '#378ADD';
        document.getElementById('faq-panel-' + activeFaq).classList.add('hidden');
    }

    // Toggle current
    if (activeFaq === index) {
        btn.style.background = '#ffffff';
        btn.style.borderColor = '#B5D4F4';
        btn.style.borderLeftColor = '#378ADD';
        btn.querySelector('.faq-label').style.color = '#000';
        btn.querySelector('.faq-arrow').style.color = '#378ADD';
        document.getElementById('faq-panel-' + index).classList.add('hidden');
        activeFaq = null;
    } else {
        btn.style.background = '#185FA5';
        btn.style.borderColor = '#185FA5';
        btn.style.borderLeftColor = '#0C447C';
        btn.querySelector('.faq-label').style.color = '#E6F1FB';
        btn.querySelector('.faq-arrow').style.color = '#B5D4F4';
        document.getElementById('faq-panel-' + index).classList.remove('hidden');
        activeFaq = index;
    }
}

// Hover effect via JS (since Tailwind can't pick up dynamic colors)
document.querySelectorAll('.faq-btn').forEach(btn => {
    btn.addEventListener('mouseenter', () => {
        if (btn !== document.getElementById('faq-btn-' + activeFaq)) {
            btn.style.background = '#f3f4f6';
        }
    });
    btn.addEventListener('mouseleave', () => {
        if (btn !== document.getElementById('faq-btn-' + activeFaq)) {
            btn.style.background = '#ffffff';
        }
    });
});
</script>
@endsection