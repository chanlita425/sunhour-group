@extends('layouts.guest')
@php
    use Artesaos\SEOTools\Facades\SEOTools;
@endphp
@section('meta_tag')
    {!! SEOTools::generate() !!}
@endsection
@section('content')
    {{-- Navbar --}}
    @component('components.navbar')
    @endcomponent
    <div class=" p-0 overflow-x-hidden  scroll-smooth h-screen">

        <div class="w-full max-w-screen-xl mx-auto mt-[5rem] xl:mt-[10rem] px-3 md:px-5">
            @if($products->uuid === 'MHFMay0zMjM5OTI=')
                <img alt="" src="https://www.toto.com/global_common_2019/index/images/img-pro-neorest.jpg"
                    class="h-[40vh] w-full object-cover" />
            @elseif(
                $brands->uuid === 'eTRFTWZVeS01')
                <img
                    src="https://diix1yrt822hg.cloudfront.net/media/products/tiles/images/series/__sized__/chiancastone/ambience/high-res/ChiancaStone-crop-c0-5__0-5-1600x775.png"
                    class="w-full h-[40vh]  object-cover"
                    alt=""
                />
            @elseif(
                $brands->uuid === 'OVhQd3B1dy0x')
                <img
                    src="https://www.aristongroup.com/content/dam/aristongroup/images/our-brands/NUOS%20PLUS%20S2_bathroom%20(1).jpg"
                    class="w-full h-[40vh]  object-cover"
                    alt=""
                />'
            @elseif(
                $brands->uuid === 'NWpEWGJUWi0z')
                <img
                    src="https://grundfos.scene7.com/is/image/grundfos/products-service-optimization-and-consultancy-heroimage-master:1800x500?wid=3600&hei=1000&dpr=off"
                    class="w-full h-[40vh]  object-cover"
                    alt=""
                />
            @elseif($brands->uuid === 'ZG56bDFzUS00')
                <img
                    src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi1yHgQnWYE5JhDZJsWIdUUFkqRSLcetVcvgQZ6UYyNG3zeNzaQkdfrJfEbZUt_IjHfzN1AdPYrjq-LQaEWMVLkcU7SJQpHWjAH_zk8qKwmoZYWfmDqaWz3Y8hI7FfVzEHXRFrHhAulpUg/w1425-h430-c/purepro-rs-108-dm-6a.jpg"
                    class="w-full h-[40vh]  object-cover"
                    alt=""
                />
            @elseif ($products->uuid == 'Z2JWci04MTAzMDQ=')
                <img
                    src="{{ asset('images/eco-washer.png') }}"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />
            @elseif (
            $products->uuid == 'console'
            )
                <img
                    src="https://asia.toto.com/products/lavatories/console/images/lavatories-console.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />
                @elseif ($products->uuid == 'self-rimming')
                <img
                    src="https://asia.toto.com/products/lavatories/self-rimming/images/b.%20Lavatories_selfrimming.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />
                  @elseif (
                    $products->uuid == 'under-counter'
                    )
                        <img
                            src="https://asia.toto.com/products/lavatories/under-counter/images/c.%20Lavatories_under-counter.jpg"
                            class="w-full h-[40vh] object-cover"
                            alt=""
                        />
                   @elseif ( $products->uuid == 'semi-recessed' )
                        <img
                            src="https://asia.toto.com/products/lavatories/semi-recessed/images/d.%20Lavatories_semirecessed.jpg"
                            class="w-full h-[40vh] object-cover"
                            alt=""
                        />
                           @elseif ( $products->uuid == 'wall-hung')
                        <img
                            src="https://asia.toto.com/products/lavatories/wall-hung/images/e.%20Lavatories_wallhung.jpg"
                            class="w-full h-[40vh] object-cover"
                            alt=""
                        />
                           @elseif ($products->uuid == 'reinforced-marble')
                        <img
                            src="https://asia.toto.com/products/lavatories/reinforced-marble/images/Reinforced_Marble_Home_Page_Banner_1024x330_RBG.jpg"
                            class="w-full h-[40vh] object-cover"
                            alt=""
                        />
            @elseif ($products->uuid == 'washlet-plus')
                <img
                    src="{{ asset('images/washlet.png') }}"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />
            @elseif ($products->uuid == 'washlet')
                <img
                    src="https://asia.toto.com/products/washlet/washlet/images/WASHLET_Home_Page_Banner_1024x330_RGB.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />
            @elseif (
            $products->uuid == 'galalato'
            )
                <img
                    src="https://asia.toto.com/products/bathtubs/galalato/images/GALALATO_Home_Page_Banner_1024x330.jpg"
                    class="w-full h-[40vh] object-fit"
                    alt=""
                />
            @elseif (
            $products->uuid == 'pearl-acrylic'
            )
                <img
                    src="https://asia.toto.com/products/bathtubs/pearl-acrylic/images/c.%20Bathtubs_pearl-acrylic.jpg"
                    class="w-full h-[40vh] object-fit"
                    alt=""
                />
            @elseif (
            $products->uuid == 'acrylic'
            )
                <img
                    src="https://asia.toto.com/products/bathtubs/acrylic/images/e.%20Bathtubs_acrylic.jpg"
                    class="w-full h-[40vh] object-fit"
                    alt=""
                />
            @elseif (
            $products->uuid == 'one-piece'
            )
                <img
                    src="https://asia.toto.com/products/toilets/one-piece/images/ONE-PIECE.jpg"
                    class="w-full h-[40vh] object-fit"
                    alt=""
                />
            @elseif (
            $products->uuid == 'close-coupled'
            )
                <img
                    src="https://asia.toto.com/products/toilets/close-coupled/images/CLOSE-COUPLED.jpg"
                    class="w-full h-[40vh] object-fit"
                    alt=""
                />
            @elseif (
            $products->uuid == 'wall-hung-toilet'
            )
                <img
                    src="https://asia.toto.com/products/toilets/wall-hung/images/WALL%20HUNG.jpg"
                    class="w-full h-[40vh] object-fit"
                    alt=""
                />
            @elseif (
            $products->uuid == 'wall-faced'
            )
                <img
                    src="https://asia.toto.com/products/toilets/wall-faced/images/WALL%20FACED.jpg"
                    class="w-full h-[40vh] object-fit"
                    alt=""
                />
            @elseif ($products->uuid == 'za' )
                <img
                    src="https://asia.toto.com/products/fittings/za/images/ZA.jpg"
                    class=" object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'zl')
                <img
                    src="https://asia.toto.com/products/fittings/zl/images/ZL_Cover_Image_Desktop.jpg"
                    class=" object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'zn' )
                <img
                    src="https://asia.toto.com/products/fittings/zn/images/ZN_Mood%20Shot%20Image%20(930x300).jpg"
                    class=" object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'ge' )
                <img
                    src="https://asia.toto.com/products/fittings/ge/images/GE.jpg"
                    class=" object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'gc' )
                <img
                    src="https://asia.toto.com/products/fittings/gc/images/GC.jpg"
                    class=" object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'gm' )
                <img
                    src="https://asia.toto.com/products/fittings/gm/images/GM.jpg"
                    class=" object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'gf' )
                <img
                    src="https://asia.toto.com/products/fittings/gf/images/GF.jpg"
                    class=" object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'ga' )
                <img
                    src="https://asia.toto.com/products/fittings/go/images/GO_Cover_Image_Desktop.jpg"
                    class=" object-cover"
                    alt=""
                />

            @elseif ( $products->uuid == 'go' )
                <img
                    src="https://asia.toto.com/products/fittings/go/images/GO_Cover_Image_Desktop.jpg"
                    class=" object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'gr')
                <img
                    src="https://asia.toto.com/products/fittings/gr/images/GR_Cover_Image_Desktop.jpg"
                    class=" object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'gs' )
                <img
                    src="https://asia.toto.com/products/fittings/gs/images/GS_Cover_Image_Desktop.jpg"
                    class=" object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'lb')
                <img
                    src="https://asia.toto.com/products/fittings/lb/images/LB_Cover_Image_Desktop.jpg"
                    class=" object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'lc' )
                <img
                    src="https://asia.toto.com/products/fittings/lc/images/LC_Cover_Image_Banner.jpg"
                    class=" object-cover"
                    alt=""
                />

            @elseif ( $products->uuid == 'lf' )
                <img
                    src="https://asia.toto.com/products/fittings/lf/images/LF_Cover_Image_Desktop.jpg"
                    class=" object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'ln' )
                <img
                    src="https://asia.toto.com/products/fittings/ln/images/LN_Cover_Image_Desktop.jpg"
                    class=" object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'z-selection-showers')
                <img
                    src="https://asia.toto.com/products/fittings/z-selection-showers/images/Z%20SELECTION%20SHOWERS.jpg"
                    class=" object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'rei')
                <img
                    src="https://asia.toto.com/products/fittings/rei/images/p._Fittings_rei.jpg"
                    class=" object-cover"
                    alt=""
                />
            @elseif ($products->uuid == 'hand-shower' )
                            <img
                                src="https://asia.toto.com/products/fittings/hand-shower/images/a._Showers_hand-shower.jpg"
                                class="w-full h-[40vh] object-cover"
                                alt=""
                            />

            @elseif ($products->uuid == 'fixed-shower-head')
                            <img
                                src="https://asia.toto.com/products/fittings/fixed-shower-head/images/b._Shower_fixed-shower-head.jpg"
                                class="w-full h-[40vh] object-cover"
                                alt=""
                            />

            @elseif ($products->uuid == 'shower-column')
                            <img
                                src="https://asia.toto.com/products/fittings/shower-column/images/c._Showers_shower-column.jpg"
                                class="w-full h-[40vh] object-cover"
                                alt=""
                            />

            @elseif ($products->uuid == 'suite-collection-accessory')
                            <img
                                src="https://asia.toto.com/products/accessories/suite-collection/images/a.%20Accessories_suite.jpg"
                                class="w-full h-[40vh] object-cover"
                                alt=""
                            />

            @elseif ($products->uuid == 'g-selection-accessory' )
                            <img
                                src="https://asia.toto.com/products/accessories/g-selection/images/G%20Selection%20Banner_banner.jpg"
                                class="w-full h-[40vh] object-cover"
                                alt=""
                            />

            @elseif ($products->uuid == 'l-selection-accessory')
                            <img
                                src="https://asia.toto.com/products/accessories/l-selection/images/L%20Selection%20Banner_banner.jpg"
                                class="w-full h-[40vh] object-cover"
                                alt=""
                            />

            @elseif ($products->uuid == 'urinal' )
                <img
                    src="https://asia.toto.com/products/public/urinal/images/a.%20Public_urinal.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'flush-value')
                <img
                    src="https://asia.toto.com/products/public/flush-valve/images/b.%20Public-flush.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />

           @elseif ( $products->uuid == 'touchless-faucet' )
                <img loading="lazy"
                    src="https://asia.toto.com/products/public/touchless-faucet/images/Public-Sensor_faucet_Large_Banner_1600x500.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'concealed-tank-system' )
                <img
                    src="https://asia.toto.com/products/public/concealed-tank-system/images/e._Public_concealed-tank-system.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'hand-dryer' )
                <img
                    src="https://asia.toto.com/products/public/hand-dryer/images/f.%20Public_hand-dryer.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />

            @elseif ($products->uuid == 'touchless-soap-dispenser')
                <img
                    src="https://asia.toto.com/products/public/touchless-soap-dispenser/images/Public-ASD_Large_Banner_1590x500.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />
            @elseif ($products->uuid == 'handrail-1')
                <img
                    src="https://asia.toto.com/products/universal-design/handrail/images/b.UD_Handrail.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />
            @elseif ($products->uuid == 'WEZZdy01MTk5MjI=')
                <img
                    src="https://asia.toto.com/products/universal-design/handrail/images/b.UD_Handrail.jpg"
                    class="w-full h-[40vh] object-cover"
                    alt=""
                />
            @else
                <img loading="lazy" alt="" src="https://asia.toto.com/products/ecowasher/images/b.%20Washlets_ecowasher.jpg"
                    class="w-full h-[40vh]  object-cover" />
            @endif
        </div>
        <div class="w-full max-w-screen-xl mx-auto px-3 md:px-5">
            <div class="my-[3rem]" >
                <p class="text-black text-[20px] md:text-[22px] lg:text-[32px] xl:text-[32px] font-medium capitalize">  
                    {{ str_replace('-', ' ', $categories ?? (app()->getLocale() == 'en' ? $products->name : ($app->getLocale() == 'km' ? $products->name_khmer : $products->name_chinese))) }}
                </p>
                
                {{-- @if ($products->slug === 'smart-toilet')
                    {{ app()->getLocale() == 'en' ? $products->name : ($app->getLocale() == 'km' ? 'បង្គន់អនាម័យឆ្លាតវៃ' : 'fafdsa ch') }}
                @elseif( $products->slug === 'washlet' )
                    {{ app()->getLocale() == 'en' ? $products->name : ($app->getLocale() == 'km' ? 'ម៉ាស៊ីនបោកអេកូ' : 'fa dsaf asd') }}
                @endif --}}

                @if(!empty($products->description))
                    <div class="text-black mt-2">{!! $products->description !!}</div>
                @endif
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-5 justify-center xl:justify-start gap-[10px] md:gap-[15px]">
                @foreach ($model as $models)
                    @if (!empty($models->link) && !empty($models->name))
                        <a href="{{ route('brands-client.model-details', [
                            'locale' => app()->getLocale(),
                            'brands' => $brands->slug,
                            'products' => $products->slug,
                            'models' => $models->uuid
                        ]) }}"
                           class="w-full hover:shadow-sm hover:scale-[1.01] transition-all duration-150 overflow-hidden">
                            <article class="flex flex-col justify-between bg-white w-full {{$brands->uuid == 'bXRMSTQ3OC0y' || $brands->uuid == 'ZG56bDFzUS00' ? 'h-full':'h-[500px]'}} border-2 border-gray-200">
                                <div class="w-full relative px-2 py-4">
                                    <h1 class="max-w-[150px] text-md 2xl:text-lg font-medium mb-3 2xl:mb-7 min-h-[50px] whitespace-normal break-words">
                                        {{ $models->name }}
                                    </h1>
                                    <div class="max-w-[150px] text-sm 2xl:text-lg font-light mb-1 capitalize">
                                        <p>{{ str_replace('-', ' ', $categories ?? (app()->getLocale() == 'en' ? $products->name : ($app->getLocale() == 'km' ? $products->name_khmer : $products->name_chinese))) }}</p>
                                    </div>
                                    <div class="{{$products->uuid != 'MHFMay0zMjM5OTI=' ? "hidden": ""}} absolute top-[7.5%] right-2">
                                            <span class="font-medium text-red-600 px-2 py-[2px] text-[18px]">
                                            New
                                            </span>
                                    </div>
                                </div>
                                <div class="w-[180px] mx-auto">
                                    <img loading="lazy" src="{{ $models->link }}"
                                         alt="" class="w-full h-full object-contain object-center pb-5">
                                </div>
                                <button class="bg-[#0248a4] text-[#FFFFFF] py-2">
                                    {{ app()->getLocale() == 'en' ? 'More Details' : ($app->getLocale() == 'km' ? 'ព័ត៌មាន​បន្ថែម' : '更多信息') }}
                                </button>
                            </article>
                        </a>
                    @else
                        <h1>Not Available</h1>
                    @endif
                @endforeach
            </div>

             {{-- FAQ Section --}}
            @if(isset($faqs) && $faqs->isNotEmpty())
            <div class="my-[3rem] max-w-full mx-auto">
                <h2 class="text-black text-xl font-medium my-4 text-center">Frequently Asked Questions?</h2>
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