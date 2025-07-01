@extends('layouts.app')
@section('content')
    <div class="w-full mx-auto">
        <nav class="grid grid-cols-12">
            @php
                $actionRoute = !empty($singleData->product_id)
                    ? route('models.index', [$singleData->product_id, $singleData->uuid])
                    : route('models.index', [$singleData->brands->uuid, $singleData->uuid]);
            @endphp

            <form action="{{ $actionRoute }}" method="GET" class="col-span-8 w-[54vh]">
                <label for="search" class="w-full flex items-center gap-2 bg-gray-100 rounded-full px-4 py-2">
                    <button type="submit">
                            <span>
                                <svg class="text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
                                     stroke-width="1.25">
                                    <path d="M11 19a8 8 0 1 0 0 -16a8 8 0 0 0 0 16z"></path>
                                    <path d="M21 21l-4.35 -4.35"></path>
                                </svg>
                            </span>
                    </button>
                    <input name="search" value="{{ request('search') }}" type="text" placeholder="Search models..."
                           class="w-full text-gray-800 bg-transparent outline-none">
                </label>
            </form>
            @include('components.navigation')
        </nav>

        <div class="mt-5">
            <div class="grid grid-cols-12">
                <div class="breadcrumbs text-sm col-span-4">
                    <ul>
                        <li>
                            <a href="{{ route('brands.index') }}" class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
                                    stroke-width="1.25">
                                    <path d="M5 12l14 0"></path>
                                    <path path d="M5 12l4 4"></path>
                                    <path d="M5 12l4 -4"></path>
                                </svg>
                                <p class="uppercase font-bold">
                                    {{ !empty($singleData->product_id) ?  $singleData->name : $singleData->brands->name }}
                                </p>
                            </a>
                        </li>
                        <li>
                             <a href="{{ !empty($singleData->product_id) ?  route('products.index', [$singleData->uuid]) : route('products.index', [$singleData->brands->uuid]) }}">
                                 {{ $singleData->name }}
                             </a>
                        </li>
                        <li>Add Models</li>
                    </ul>
                </div>
                <div class="col-span-8 flex items-center justify-end space-x-5">
                    <!-- Per Page Form -->
                    <form action="{{ !empty($singleData->product_id) ? route('models.index',[$singleData->product_id,$singleData->uuid]) : route('models.index',[$singleData->brands->uuid,$singleData->uuid]) }}" method="GET" id="perPage">
                        <label for="perPage">
                            Showing
                            <select name="perPage" id="perPage"
                                    class="select select-sm select-bordered bg-blue-300/30"
                                    onchange="this.form.submit()">
                                <option value="10" {{ request('perPage') == '10' ? 'selected' : '' }}>10</option>
                                <option value="20" {{ request('perPage') == '20' ? 'selected' : '' }}>20</option>
                                <option value="50" {{ request('perPage') == '50' ? 'selected' : '' }}>50</option>
                            </select>
                        </label>
                        <!-- Preserve other query parameters -->
                        @foreach(request()->except(['perPage', 'page']) as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-12 space-x-5 mt-5">
        <div class="bg-white rounded-lg col-span-8 xl:col-span-9 h-[75vh] xl:h-[85vh] overflow-auto">
            <table class="table ">
                <thead>
                    <tr class="text-gray-500 border-gray-200">
                        <th>#</th>
                        <th>Model</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                @if ($loading)
                    <tr>
                        <td>
                            <div class="inline-flex items-end gap-2">
                                <p>Data don't exist in storage.</p>
                                <span class="loading loading-dots loading-xs text-gray-500"></span>
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach ($models as $item)
                        @if($singleData->uuid == $item->product_id || $singleData->uuid == $item->category_id)
                            <tbody>
                                <tr class="hover:bg-gray-100 border-gray-200 border-b">
                                    <th>
                                        {{ $item->auto_number }}
                                    </th>
                                <td>
                                    <div class="inline-flex items-center gap-2 float-start">
                                        @if(empty($item->link))
                                            <img src="https://placehold.co/100x100" alt="" class="w-10 h-10 rounded-full">
                                        @else
                                            <img src="{{$item->link}}" alt="" class="w-10 h-10 rounded-full">
                                        @endif
                                        <p>{{$item->name}}</p>
                                    </div>
                                </td>
                                <td class="inline-flex items-center gap-2 float-end">
                                    <div class="dropdown dropdown-hover dropdown-end">
                                        <button data-tip="Go to Details" tabindex="0" role="button"
                                                class="bg-info/10 px-2 py-1 rounded-md tooltip tooltip-top tooltip-info link link-info">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                 width="24" height="24" stroke-width="1.25">
                                                <path
                                                    d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                                                </path>
                                                <path
                                                    d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z">
                                                </path>
                                                <path d="M9 12l.01 0"></path>
                                                <path d="M13 12l2 0"></path>
                                                <path d="M9 16l.01 0"></path>
                                                <path d="M13 16l2 0"></path>
                                            </svg>
                                        </button>
                                        <ul tabindex="0"
                                            class="dropdown-content menu bg-white rounded-box z-[2] w-64 shadow p-0 space-y-1">
                                            <li>
                                                <a href="{{ !empty($singleData->product_id) ? route('functions.index', [$singleData->product_id, $singleData->uuid, $item->uuid]) : route('functions.index', [$singleData->brand_id, $singleData->uuid, $item->uuid]) }}"
                                                   class="join-item px-4 py-2 inline-flex items-center gap-2 rounded-sm  border-s-[3px] border-blue-500 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-all duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                         fill="none" stroke="currentColor" stroke-linecap="round"
                                                         stroke-linejoin="round" width="24" height="24"
                                                         stroke-width="1.25">
                                                        <path d="M3 12l3 3l3 -3l-3 -3z"></path>
                                                        <path d="M15 12l3 3l3 -3l-3 -3z"></path>
                                                        <path d="M9 6l3 3l3 -3l-3 -3z"></path>
                                                        <path d="M9 18l3 3l3 -3l-3 -3z"></path>
                                                    </svg>
                                                    <p>Function Lists</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ !empty($singleData->product_id) ? route('daily-cleans.index', [$singleData->product_id, $singleData->uuid, $item->uuid]) : route('daily-cleans.index', [$singleData->brand_id, $singleData->uuid, $item->uuid]) }}"
                                                   class="join-item px-4 py-2 inline-flex items-center gap-2 rounded-sm  border-s-[3px] border-blue-500 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-all duration-300">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                             fill="none" stroke="currentColor" stroke-linecap="round"
                                                             stroke-linejoin="round" width="24" height="24"
                                                             stroke-width="1.25">
                                                            <path
                                                                d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z">
                                                            </path>
                                                            <path d="M16 3v4"></path>
                                                            <path d="M8 3v4"></path>
                                                            <path d="M4 11h16"></path>
                                                            <path d="M8 14v4"></path>
                                                            <path d="M12 14v4"></path>
                                                            <path d="M16 14v4"></path>
                                                        </svg>
                                                    </span>
                                                    <p>Daily Cleaning Lists</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ !empty($singleData->product_id) ? route('deep-cleans.index', [$singleData->product_id, $singleData->uuid, $item->uuid]) : route('deep-cleans.index', [$singleData->brand_id, $singleData->uuid, $item->uuid]) }}"
                                                   class="join-item px-4 py-2 inline-flex items-center gap-2 rounded-sm  border-s-[3px] border-blue-500 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-all duration-300">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                             fill="none" stroke="currentColor" stroke-linecap="round"
                                                             stroke-linejoin="round" width="24" height="24"
                                                             stroke-width="1.25">
                                                            <path d="M4 6h16"></path>
                                                            <path d="M7 12h13"></path>
                                                            <path d="M10 18h10"></path>
                                                        </svg>
                                                    </span>
                                                    <p>Deep Cleaning Lists</p>
                                                </a>
                                            </li>
                                          <li>
                                               <a href="{{ !empty($singleData->product_id) ? route('awards.index', [$singleData->product_id, $singleData->uuid, $item->uuid]) : route('awards.index', [$singleData->brand_id, $singleData->uuid, $item->uuid]) }}"
                                                  class="join-item px-4 py-2 inline-flex items-center  gap-2 rounded-sm  border-s-[3px] border-blue-500 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-all duration-300">
                                                   <span>
                                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" width="24" height="24"
                                                            stroke-width="1.25">
                                                           <path d="M14 12v.01"></path>
                                                           <path d="M3 21h18"></path>
                                                           <path d="M6 21v-16a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v16"></path>
                                                       </svg>
                                                   </span>
                                                   <p>Award Lists</p>
                                               </a>
                                           </li>
                                            <li>
                                                <a href="{{ !empty($singleData->product_id) ? route('features.index', [$singleData->product_id, $singleData->uuid, $item->uuid]) : route('features.index', [$singleData->brand_id, $singleData->uuid, $item->uuid]) }}"
                                                   class="join-item px-4 py-2 inline-flex items-center gap-2 rounded-sm  border-s-[3px] border-blue-500 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-all duration-300">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="1.25">
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                    <path d="M19 18v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1"></path>
                                                    <path d="M3 14h3m4.5 0h3m4.5 0h3"></path>
                                                    <path d="M5 10v-5a2 2 0 0 1 2 -2h7l5 5v2"></path>
                                                    </svg>
                                                </span>
                                                    <p>Features</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ !empty($singleData->product_id) ? route('spaces.index', [$singleData->product_id, $singleData->uuid, $item->uuid]) : route('spaces.index', [$singleData->brand_id, $singleData->uuid, $item->uuid]) }}"
                                                   class="join-item px-4 py-2 inline-flex items-center gap-2 rounded-sm  border-s-[3px] border-blue-500 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-all duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="1.25">
                                                        <path d="M4 13a8 8 0 0 1 7 7a6 6 0 0 0 3 -5a9 9 0 0 0 6 -8a3 3 0 0 0 -3 -3a9 9 0 0 0 -8 6a6 6 0 0 0 -5 3"></path>
                                                        <path d="M7 14a6 6 0 0 0 -3 6a6 6 0 0 0 6 -3"></path>
                                                        <path d="M15 9m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    </svg>
                                                    <p>Spaces</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ !empty($singleData->product_id) ? route('medias.index', [$singleData->product_id, $singleData->uuid, $item->uuid]) : route('medias.index', [$singleData->brand_id, $singleData->uuid, $item->uuid]) }}"
                                                   class="join-item px-4 py-2 inline-flex items-center gap-2 rounded-sm  border-s-[3px] border-blue-500 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-all duration-300">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="1.25">
                                                    <path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                                                    <path d="M16 3l-4 4l-4 -4"></path>
                                                    </svg>
                                                </span>
                                                    <p>Videos</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ !empty($singleData->product_id) ? route('downloads.index', [$singleData->product_id, $singleData->uuid, $item->uuid]) : route('downloads.index', [$singleData->brand_id, $singleData->uuid, $item->uuid]) }}"
                                                   class="join-item px-4 py-2 inline-flex items-center gap-2 rounded-sm  border-s-[3px] border-blue-500 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-all duration-300">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="1.25">
                                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                                        <path d="M12 17v-6"></path>
                                                        <path d="M9.5 14.5l2.5 2.5l2.5 -2.5"></path>
                                                    </svg>
                                                </span>
                                                    <p>Downloads</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <button data-tip="Edit"
                                            data-id="{{ $item->uuid }}"
                                            data-url="{{ !empty($singleData->product_id) ? route('models.edit', [$singleData->product_id, $singleData->uuid, $item->uuid]) : route('models.edit', [$singleData->brands->uuid,$singleData->uuid,$item->uuid]) }}"
                                            data-update-url="{{ !empty($singleData->product_id) ? route('models.update', [$singleData->product_id, $singleData->uuid, $item->uuid]) : route('models.update', [$singleData->brands->uuid, $singleData->uuid, $item->uuid]) }}"
                                        class="edit-btn tooltip tooltip-top bg-green-50 text-green-500 px-2 py-1 rounded-md hover:bg-green-500 hover:text-white transition-all duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                             width="24" height="24" stroke-width="1.25">
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                            </path>
                                            <path d="M16 5l3 3"></path>
                                        </svg>
                                    </button>
                                    <button data-tip="Delete"
                                            data-id="{{ $item->uuid }}"
                                            data-url="{{ !empty($singleData->product_id) ? route('models.destroy', [$singleData->product_id, $singleData->uuid, $item->uuid]) : route('models.destroy', [$singleData->brands->uuid,$singleData->uuid,$item->uuid]) }}"
                                        class="delete-btn tooltip tooltip-top bg-red-50 text-red-500 px-2 py-1 rounded-md hover:bg-red-500 hover:text-white transition-all duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                             width="24" height="24" stroke-width="1.25">
                                            <path d="M4 7l16 0"></path>
                                            <path d="M10 11l0 6"></path>
                                            <path d="M14 11l0 6"></path>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        @endif
                    @endforeach
                @endif
            </table>
            {{-- Pagination Of laravel --}}
            <div class="m-3">
                {{ $models->links('pagination::daisyui') }}
            </div>
        </div>

        {{-- form to add new brand --}}
        <div id="formAdd" class="col-span-4 xl:col-span-3 w-full pr-5">
            <form action="{{ !empty($singleData->product_id) ? route('models.store',[$singleData->product_id, $singleData->uuid]) : route('models.store',[$singleData->category_id ?? $singleData->brand_id, $singleData->uuid]) }}" method="POST" class="w-full bg-white rounded-lg p-5" id="brandFormAdd">
                @csrf
                @method('POST')
                <div x-data="{
                    name: '',
                    link: '',
                    isFormValid() {
                        return this.name.trim() !== '';
                    }
                }" class="space-y-4">
                    <!-- Always send product_id if possible -->
                    @if (!empty($singleData->product_id))
                        <input type="hidden" name="category_id" value="{{ $singleData->uuid }}">
                        <input type="hidden" name="product_id" value="{{ $singleData->product_id }}">
                    @else
                        <input type="hidden" name="product_id" value="{{ $singleData->uuid }}">
                    @endif
                    <!-- Model/Name Input -->
                    <div class="form-group w-full space-y-2">
                        <label for="add_name" class="text-gray-500 text-[12px]">Model</label>
                        <input type="text" name="name" x-model="name" id="add_name"
                            class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                            placeholder="Enter Model">
                    </div>
                    <!-- Link Input -->
                    <div class="form-group w-full space-y-2">
                        <label for="add_link" class="text-gray-500 text-[12px]">Link</label>
                        <label class="inline-flex items-center gap-2 w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300">
                            <!-- SVG ... -->
                            <input type="url" name="link" x-model="link" id="add_link"
                                class="w-full outline-none bg-transparent"
                                placeholder="https://placehold.co/100x100">
                        </label>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit"
                        x-bind:disabled="!isFormValid()"
                        class="text-[14px] bg-blue-500 text-white px-4 py-1 rounded-sm mt-2 hover:bg-blue-600 disabled:bg-gray-400 disabled:cursor-not-allowed">
                        Submit
                    </button>
                </div>
            </form>
        </div>

        <div id="formEdit" class="hidden col-span-4 xl:col-span-3 w-full pr-5">
            <form method="POST" class="w-full bg-white rounded-lg p-5" id="brandFormEdit">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <!-- Hidden fields for IDs -->
                    <input type="hidden" name="category_id" id="edit_category_id">
                    <input type="hidden" name="product_id" id="edit_product_id">
                    <input type="hidden" name="uuid" id="edit_uuid">
                    <!-- Model/Name Input -->
                    <div class="form-group w-full space-y-2">
                        <label for="edit_name" class="text-gray-500 text-[12px]">Model</label>
                        <input type="text" name="name" id="edit_name"
                            class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                            placeholder="Enter Model">
                    </div>
                    <!-- Link Input -->
                    <div class="form-group w-full space-y-2">
                        <label for="edit_link" class="text-gray-500 text-[12px]">Link</label>
                        <label class="inline-flex items-center gap-2 w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300">
                            <!-- SVG ... -->
                            <input type="url" name="link" id="edit_link"
                                class="w-full outline-none bg-transparent"
                                placeholder="https://placehold.co/100x100">
                        </label>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit"
                        class="text-[14px] bg-blue-500 text-white px-4 py-1 rounded-sm mt-2 hover:bg-blue-600 disabled:bg-gray-400 disabled:cursor-not-allowed"
                    >Update</button>
                    <button type="button" onclick="onCancel()"
                        class="text-[14px] bg-red-500 text-white px-4 py-1 rounded-sm mt-2 hover:bg-red-600 disabled:bg-red-400 disabled:cursor-not-allowed"
                    >Cancel</button>
                </div>
            </form>
        </div>
    </div>
    </div>

    <script>
        // Store (Add)
        document.getElementById('brandFormAdd').addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        icon: "success",
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                    }).then(() => {
                        document.getElementById('brandFormAdd').reset();
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: data.message,
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                });
            });
        });

        // Edit
        let editFormHandler;
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', async function() {
                const url = this.getAttribute('data-url');
                const updateUrl = this.getAttribute('data-update-url');
                const id = this.getAttribute('data-id');

                const formAdd = document.getElementById('formAdd');
                const formEdit = document.getElementById('formEdit');

                if (id) {
                    formAdd.classList.add('hidden');
                    formEdit.classList.remove('hidden');
                } else {
                    formAdd.classList.remove('hidden');
                    formEdit.classList.add('hidden');
                }

                try {
                    const response = await fetch(url, {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value,
                            'Accept': 'application/json',
                        }
                    });

                    const data = await response.json();
                    if (data.success && data.data) {
                        // Populate form fields
                        document.getElementById('edit_category_id').value = data.data.category_id || '';
                        document.getElementById('edit_product_id').value = data.data.product_id || '';
                        document.getElementById('edit_uuid').value = data.data.uuid || '';
                        document.getElementById('edit_name').value = data.data.name || '';
                        document.getElementById('edit_link').value = data.data.link || '';

                        const brandForm = document.getElementById('brandFormEdit');

                        // Remove previous event handler if exists
                        if (editFormHandler) {
                            brandForm.removeEventListener('submit', editFormHandler);
                        }

                        editFormHandler = async function(e) {
                            e.preventDefault();
                            const formData = new FormData(brandForm);

                            // Laravel expects PUT, so add _method if needed
                            formData.append('_method', 'PUT');

                            try {
                                const updateResponse = await fetch(updateUrl, {
                                    method: 'POST',
                                    body: formData,
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value,
                                        'Accept': 'application/json'
                                    }
                                });

                                const updateData = await updateResponse.json();

                                if (updateData.success) {
                                    await Swal.fire({
                                        toast: true,
                                        position: 'top-end',
                                        icon: 'success',
                                        title: updateData.message,
                                        showConfirmButton: false,
                                        timer: 1000,
                                        timerProgressBar: true,
                                    });
                                    brandForm.reset();
                                    location.reload();
                                } else {
                                    await Swal.fire({
                                        icon: 'error',
                                        title: 'Error!',
                                        text: updateData.message || 'Failed to update',
                                        confirmButtonColor: '#d33',
                                        confirmButtonText: 'OK'
                                    });
                                }
                            } catch (error) {
                                await Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                    confirmButtonColor: '#d33',
                                    confirmButtonText: 'OK'
                                });
                            }
                        };

                        brandForm.addEventListener('submit', editFormHandler);
                    } else {
                        await Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: data.message || 'Failed to load data',
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        });
                    }
                } catch (error) {
                    await Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Failed to load data!',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });

        // Delete
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const url = this.getAttribute('data-url');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value,
                                'Accept': 'application/json',
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire(
                                    'Deleted!',
                                    data.message,
                                    'success'
                                ).then(() => {
                                    button.closest('tr').remove();
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    data.message,
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            Swal.fire(
                                'Error!',
                                'Something went wrong while deleting.',
                                'error'
                            );
                        });
                    }
                });
            });
        });

        // Cancel Edit Handler
        function onCancel() {
            document.getElementById('formEdit').classList.add('hidden');
            document.getElementById('formAdd').classList.remove('hidden');
        }

        function onCancel(){
            document.getElementById('formAdd').classList.remove('hidden');
            document.getElementById('formEdit').classList.add('hidden');
        }
    </script>
@endsection
