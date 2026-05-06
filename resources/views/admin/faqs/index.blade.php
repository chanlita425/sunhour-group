@extends('layouts.app')
@section('content')
<div class="w-full mx-auto overflow-hidden">

    {{-- Breadcrumb --}}
    <div class="mt-5 mb-3">
        <div class="breadcrumbs text-sm">
            <ul><li><p class="font-bold">Frequently Asked Questions</p></li></ul>
        </div>
    </div>

    {{-- Filter Bar --}}
    <form method="GET" action="{{ route('faqs.index') }}" class="flex flex-wrap items-end gap-3 mb-4 bg-white rounded-lg p-3">
        <div class="flex flex-col gap-1">
            <label class="text-gray-500 text-[11px]">Filter by Brand</label>
            <select name="filter_brand" id="filter_brand"
                class="bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all min-w-[150px]">
                <option value="">— All Brands —</option>
                @foreach($brands as $b)
                    <option value="{{ $b->uuid }}" {{ request('filter_brand') == $b->uuid ? 'selected' : '' }}>{{ $b->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col gap-1">
            <label class="text-gray-500 text-[11px]">Filter by Display</label>
            <select name="filter_type"
                class="bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all min-w-[150px]">
                <option value="">— All Types —</option>
                <option value="brand" {{ request('filter_type') == 'brand' ? 'selected' : '' }}>Brand Page</option>
                <option value="model" {{ request('filter_type') == 'model' ? 'selected' : '' }}>Model Page</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-1.5 rounded-sm text-[12px] hover:bg-blue-600 transition-all">
            Apply
        </button>
        @if(request('filter_brand') || request('filter_type'))
            <a href="{{ route('faqs.index') }}" class="bg-gray-200 text-gray-600 px-4 py-1.5 rounded-sm text-[12px] hover:bg-gray-300 transition-all">
                Clear
            </a>
        @endif
    </form>

    {{-- Main Grid --}}
    <div class="grid grid-cols-12 gap-x-5">

        {{-- Table --}}
        <div class="col-span-8 xl:col-span-9 flex flex-col min-w-0" style="height:72vh">
            <div class="flex-1 overflow-auto min-h-0 bg-white rounded-lg">
            <table class="table text-[12px] w-full table-fixed">
                <thead>
                    <tr class="text-gray-500 border-gray-200">
                        <th class="w-8">#</th>
                        <th class="w-24">Brand</th>
                        <th class="w-28">Shows On</th>
                        <th class="w-auto">Question (English)</th>
                        <th class="w-auto">Answer</th>
                        <th class="w-16 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-400">
                                <div class="inline-flex items-center gap-2">
                                    <p>No FAQs found.</p>
                                    <span class="loading loading-dots loading-xs"></span>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach ($data as $item)
                            <tr class="border-b hover:bg-gray-50">
                                <td>{{ $loop->iteration }}</td>

                                <td class="whitespace-nowrap">{{ $brands->firstWhere('uuid', $item->brand_id)?->name ?? '—' }}</td>

                                <td>
                                    @if($item->display_level === 'model')
                                        <span class="inline-flex items-center gap-1 bg-blue-100 text-blue-700 text-[10px] px-2 py-0.5 rounded-full font-medium whitespace-nowrap">
                                            {{-- model icon --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="7" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                                            Model Page
                                        </span>
                                        <span class="block text-gray-400 text-[10px] mt-0.5">{{ $products->firstWhere('uuid', $item->product_id)?->name ?? '—' }}</span>
                                    @else
                                        <span class="inline-flex items-center gap-1 bg-orange-100 text-orange-700 text-[10px] px-2 py-0.5 rounded-full font-medium whitespace-nowrap">
                                            {{-- brand icon --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                            Brand Page
                                        </span>
                                    @endif
                                </td>

                                <td class="truncate overflow-hidden max-w-0">{{ $item->q_english }}</td>
                                <td class="truncate overflow-hidden max-w-0 text-gray-500">{{ $item->a_english }}</td>

                                <td class="text-end">
                                    <div class="inline-flex gap-1">
                                        <button data-url="{{ route('faqs.show', $item->id) }}"
                                            data-update-url="{{ route('faqs.update', $item->id) }}"
                                            data-id="{{ $item->id }}"
                                            class="edit-btn tooltip tooltip-top bg-green-100 text-green-600 p-1.5 rounded-full hover:bg-green-600 hover:text-white transition-all"
                                            data-tip="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="14" height="14" stroke-width="2">
                                                <path d="M7 7h-1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1"></path>
                                                <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97l-8.415 8.385v3h3l8.385-8.415z"></path>
                                                <path d="M16 5l3 3"></path>
                                            </svg>
                                        </button>
                                        <button data-url="{{ route('faqs.destroy', $item->id) }}"
                                            class="delete-btn tooltip tooltip-top bg-red-100 text-red-600 p-1.5 rounded-full hover:bg-red-600 hover:text-white transition-all"
                                            data-tip="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="14" height="14" stroke-width="2">
                                                <path d="M4 7l16 0"></path>
                                                <path d="M10 11l0 6"></path>
                                                <path d="M14 11l0 6"></path>
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12"></path>
                                                <path d="M9 7v-3a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="m-3">{{ $data->links('pagination::daisyui') }}</div>
            </div>{{-- /scroll --}}
        </div>

        {{-- ── ADD FORM ── --}}
        <div id="formAdd" class="col-span-4 xl:col-span-3 w-full pr-5 flex flex-col" style="height:72vh">
            <h1 class="font-bold text-[13px] mb-2 shrink-0">Add FAQ</h1>
            <form id="faqAddForm" class="flex flex-col flex-1 bg-white rounded-lg overflow-hidden min-h-0">
                @csrf

                {{-- Scrollable area --}}
                <div class="flex-1 overflow-y-auto p-3 space-y-3 min-h-0">

                    {{-- Display type toggle --}}
                    <div class="space-y-1">
                        <label class="text-gray-500 text-[11px]">Show FAQ On <span class="text-red-500">*</span></label>
                        <div class="flex rounded-sm overflow-hidden border border-gray-200 text-[11px]">
                            <label class="flex-1 text-center cursor-pointer">
                                <input type="radio" name="display_type" value="brand" class="sr-only" checked onchange="onAddTypeChange()">
                                <span id="add_tab_brand" class="block py-1.5 bg-blue-500 text-white font-medium transition-all">Brand Page</span>
                            </label>
                            <label class="flex-1 text-center cursor-pointer">
                                <input type="radio" name="display_type" value="model" class="sr-only" onchange="onAddTypeChange()">
                                <span id="add_tab_model" class="block py-1.5 bg-gray-100 text-gray-500 font-medium transition-all">Model Page</span>
                            </label>
                        </div>
                        {{-- hint --}}
                        <p id="add_type_hint" class="text-[10px] text-blue-600 bg-blue-50 rounded px-2 py-1">
                            FAQ will appear on the <strong>Brand</strong> page. Only Brand selection needed.
                        </p>
                    </div>

                    {{-- Brand --}}
                    <div class="space-y-1">
                        <label class="text-gray-500 text-[11px]">Brand <span class="text-red-500">*</span></label>
                        <select name="brand_id" id="add_brand" onchange="onAddBrandChange()"
                            class="w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all">
                            <option value="">— Select Brand —</option>
                            @foreach($brands as $b)
                                <option value="{{ $b->uuid }}">{{ $b->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Product (Model Page only) --}}
                    <div id="add_product_wrap" class="space-y-1 hidden">
                        <label class="text-gray-500 text-[11px]">Product <span class="text-red-500">*</span></label>
                        <select name="product_id" id="add_product_id"
                            class="w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all">
                            <option value="">— Select Brand first —</option>
                        </select>
                    </div>

                    <hr class="border-gray-100">

                    <p class="text-[11px] font-semibold text-gray-600">Q&A — English</p>
                    <div class="space-y-1">
                        <label class="text-gray-500 text-[11px]">Question <span class="text-red-500">*</span></label>
                        <textarea name="q_english" style="height:48px;overflow-y:auto;resize:none"
                            class="w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all"
                            placeholder="Enter question"></textarea>
                    </div>
                    <div class="space-y-1">
                        <label class="text-gray-500 text-[11px]">Answer <span class="text-red-500">*</span></label>
                        <textarea name="a_english" style="height:48px;overflow-y:auto;resize:none"
                            class="w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all"
                            placeholder="Enter answer"></textarea>
                    </div>

                    <p class="text-[11px] font-semibold text-gray-600">Q&A — Khmer</p>
                    <div class="space-y-1">
                        <label class="text-gray-500 text-[11px]">Question</label>
                        <textarea name="q_khmer" style="height:48px;overflow-y:auto;resize:none"
                            class="w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all"
                            placeholder="Enter question"></textarea>
                    </div>
                    <div class="space-y-1">
                        <label class="text-gray-500 text-[11px]">Answer</label>
                        <textarea name="a_khmer" style="height:48px;overflow-y:auto;resize:none"
                            class="w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all"
                            placeholder="Enter answer"></textarea>
                    </div>

                    <p class="text-[11px] font-semibold text-gray-600">Q&A — Chinese</p>
                    <div class="space-y-1">
                        <label class="text-gray-500 text-[11px]">Question</label>
                        <textarea name="q_china" style="height:48px;overflow-y:auto;resize:none"
                            class="w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all"
                            placeholder="Enter question"></textarea>
                    </div>
                    <div class="space-y-1">
                        <label class="text-gray-500 text-[11px]">Answer</label>
                        <textarea name="a_china" style="height:48px;overflow-y:auto;resize:none"
                            class="w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all"
                            placeholder="Enter answer"></textarea>
                    </div>

                </div>
                {{-- Submit pinned --}}
                <div class="shrink-0 p-3 pt-2 border-t border-gray-100 bg-white">
                    <button type="submit" class="w-full bg-blue-500 text-white py-1.5 rounded-sm text-[13px] hover:bg-blue-600 transition-all">
                        Submit
                    </button>
                </div>
            </form>
        </div>

        {{-- ── EDIT FORM ── --}}
        <div id="formEdit" class="hidden col-span-4 xl:col-span-3 w-full pr-5 flex flex-col" style="height:72vh">
            <h1 class="font-bold text-[13px] mb-2 shrink-0">Edit FAQ</h1>
            <form id="faqEditForm" class="flex flex-col flex-1 bg-white rounded-lg overflow-hidden min-h-0">
                @csrf
                @method('PUT')

                {{-- Scrollable area --}}
                <div class="flex-1 overflow-y-auto p-3 space-y-3 min-h-0">

                    {{-- Display type toggle --}}
                    <div class="space-y-1">
                        <label class="text-gray-500 text-[11px]">Show FAQ On <span class="text-red-500">*</span></label>
                        <div class="flex rounded-sm overflow-hidden border border-gray-200 text-[11px]">
                            <label class="flex-1 text-center cursor-pointer">
                                <input type="radio" name="display_type" value="brand" id="edit_type_brand" class="sr-only" onchange="onEditTypeChange()">
                                <span id="edit_tab_brand" class="block py-1.5 bg-blue-500 text-white font-medium transition-all">Brand Page</span>
                            </label>
                            <label class="flex-1 text-center cursor-pointer">
                                <input type="radio" name="display_type" value="model" id="edit_type_model" class="sr-only" onchange="onEditTypeChange()">
                                <span id="edit_tab_model" class="block py-1.5 bg-gray-100 text-gray-500 font-medium transition-all">Model Page</span>
                            </label>
                        </div>
                        <p id="edit_type_hint" class="text-[10px] text-blue-600 bg-blue-50 rounded px-2 py-1">
                            FAQ will appear on the <strong>Brand</strong> page. Only Brand selection needed.
                        </p>
                    </div>

                    {{-- Brand --}}
                    <div class="space-y-1">
                        <label class="text-gray-500 text-[11px]">Brand <span class="text-red-500">*</span></label>
                        <select name="brand_id" id="edit_brand" onchange="onEditBrandChange()"
                            class="w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all">
                            <option value="">— Select Brand —</option>
                            @foreach($brands as $b)
                                <option value="{{ $b->uuid }}">{{ $b->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Product (Model Page only) --}}
                    <div id="edit_product_wrap" class="space-y-1 hidden">
                        <label class="text-gray-500 text-[11px]">Product <span class="text-red-500">*</span></label>
                        <select name="product_id" id="edit_product_id"
                            class="w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all">
                            <option value="">— Select Brand first —</option>
                        </select>
                    </div>

                    <hr class="border-gray-100">

                    <p class="text-[11px] font-semibold text-gray-600">Q&A — English</p>
                    <div class="space-y-1">
                        <label class="text-gray-500 text-[11px]">Question <span class="text-red-500">*</span></label>
                        <textarea name="q_english" id="edit_q_english" style="height:48px;overflow-y:auto;resize:none"
                            class="w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all"></textarea>
                    </div>
                    <div class="space-y-1">
                        <label class="text-gray-500 text-[11px]">Answer <span class="text-red-500">*</span></label>
                        <textarea name="a_english" id="edit_a_english" style="height:48px;overflow-y:auto;resize:none"
                            class="w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all"></textarea>
                    </div>

                    <p class="text-[11px] font-semibold text-gray-600">Q&A — Khmer</p>
                    <div class="space-y-1">
                        <label class="text-gray-500 text-[11px]">Question</label>
                        <textarea name="q_khmer" id="edit_q_khmer" style="height:48px;overflow-y:auto;resize:none"
                            class="w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all"></textarea>
                    </div>
                    <div class="space-y-1">
                        <label class="text-gray-500 text-[11px]">Answer</label>
                        <textarea name="a_khmer" id="edit_a_khmer" style="height:48px;overflow-y:auto;resize:none"
                            class="w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all"></textarea>
                    </div>

                    <p class="text-[11px] font-semibold text-gray-600">Q&A — Chinese</p>
                    <div class="space-y-1">
                        <label class="text-gray-500 text-[11px]">Question</label>
                        <textarea name="q_china" id="edit_q_china" style="height:48px;overflow-y:auto;resize:none"
                            class="w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all"></textarea>
                    </div>
                    <div class="space-y-1">
                        <label class="text-gray-500 text-[11px]">Answer</label>
                        <textarea name="a_china" id="edit_a_china" style="height:48px;overflow-y:auto;resize:none"
                            class="w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] outline-none focus:bg-gray-200 transition-all"></textarea>
                    </div>

                </div>
                {{-- Buttons pinned --}}
                <div class="shrink-0 p-3 pt-2 border-t border-gray-100 bg-white flex gap-2">
                    <button type="submit" class="flex-1 bg-blue-500 text-white py-1.5 rounded-sm text-[13px] hover:bg-blue-600 transition-all">
                        Update
                    </button>
                    <button type="button" onclick="onCancel()" class="flex-1 bg-gray-200 text-gray-600 py-1.5 rounded-sm text-[13px] hover:bg-gray-300 transition-all">
                        Cancel
                    </button>
                </div>
            </form>
        </div>

    </div>{{-- /grid --}}
</div>

<script>
    const allProducts = @json($products);
    let handleEditSubmit = null;

    // ─── Populate products for a brand ─────────────────────────────────────────
    function populateProducts(prefix, brandId, savedProductId = '') {
        const sel = document.getElementById(prefix + '_product_id');
        sel.innerHTML = '<option value="">— Select Product —</option>';
        if (!brandId) return;
        allProducts.filter(p => p.brand_id === brandId).forEach(p => {
            const o = document.createElement('option');
            o.value = p.uuid; o.textContent = p.name;
            if (p.uuid === savedProductId) o.selected = true;
            sel.appendChild(o);
        });
    }

    // ─── Type toggle helpers ────────────────────────────────────────────────────
    function applyTypeUI(prefix, type) {
        const brandTab = document.getElementById(prefix + '_tab_brand');
        const modelTab = document.getElementById(prefix + '_tab_model');
        const prodWrap = document.getElementById(prefix + '_product_wrap');
        const hint     = document.getElementById(prefix + '_type_hint');

        if (type === 'model') {
            brandTab.className = 'block py-1.5 bg-gray-100 text-gray-500 font-medium transition-all';
            modelTab.className = 'block py-1.5 bg-blue-500 text-white font-medium transition-all';
            prodWrap.classList.remove('hidden');
            hint.className = 'text-[10px] text-blue-600 bg-blue-50 rounded px-2 py-1';
            hint.innerHTML = 'FAQ will appear on the <strong>Model</strong> page. Select Brand + Product.';
        } else {
            brandTab.className = 'block py-1.5 bg-blue-500 text-white font-medium transition-all';
            modelTab.className = 'block py-1.5 bg-gray-100 text-gray-500 font-medium transition-all';
            prodWrap.classList.add('hidden');
            // clear product when switching to brand mode
            const prodSel = document.getElementById(prefix + '_product_id');
            if (prodSel) prodSel.value = '';
            hint.className = 'text-[10px] text-blue-600 bg-blue-50 rounded px-2 py-1';
            hint.innerHTML = 'FAQ will appear on the <strong>Brand</strong> page. Only Brand selection needed.';
        }
    }

    function onAddTypeChange() {
        const type = document.querySelector('input[name="display_type"]:checked', document.getElementById('faqAddForm')).value;
        applyTypeUI('add', type);
    }

    function onEditTypeChange() {
        const type = document.querySelector('#faqEditForm input[name="display_type"]:checked').value;
        applyTypeUI('edit', type);
    }

    function getAddType() {
        const r = document.querySelector('#faqAddForm input[name="display_type"]:checked');
        return r ? r.value : 'brand';
    }

    function onAddBrandChange() {
        const brandId = document.getElementById('add_brand').value;
        populateProducts('add', brandId);
    }

    function onEditBrandChange() {
        const brandId = document.getElementById('edit_brand').value;
        populateProducts('edit', brandId);
    }

    // ─── Cancel ─────────────────────────────────────────────────────────────────
    function onCancel() {
        document.getElementById('formAdd').classList.remove('hidden');
        document.getElementById('formEdit').classList.add('hidden');
        if (handleEditSubmit) {
            document.getElementById('faqEditForm').removeEventListener('submit', handleEditSubmit);
            handleEditSubmit = null;
        }
    }

    // ─── Store ──────────────────────────────────────────────────────────────────
    document.getElementById('faqAddForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const brandId = document.getElementById('add_brand').value;
        if (!brandId) {
            Swal.fire({ icon: 'warning', title: 'Brand required', text: 'Please select a brand.', confirmButtonColor: '#3b82f6' });
            return;
        }
        const type = getAddType();
        if (type === 'model' && !document.getElementById('add_product_id').value) {
            Swal.fire({ icon: 'warning', title: 'Product required', text: 'Please select a product for Model Page FAQ.', confirmButtonColor: '#3b82f6' });
            return;
        }
        // For brand type, clear product_id before submit
        if (type === 'brand') document.getElementById('add_product_id').value = '';

        const formData = new FormData(this);
        fetch("{{ route('faqs.store') }}", {
            method: 'POST', body: formData,
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                // Reset form inputs and toggle back to default (Brand Page)
                document.getElementById('faqAddForm').reset();
                document.getElementById('add_product_wrap').classList.add('hidden');
                applyTypeUI('add', 'brand');
                // Check the brand radio again since reset() unchecks radios
                document.querySelector('#faqAddForm input[name="display_type"][value="brand"]').checked = true;

                Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false, timer: 1500, timerProgressBar: true })
                    .fire({ icon: 'success', title: data.message })
                    .then(() => location.reload());
            } else {
                Swal.fire({ icon: 'error', title: 'Error!', text: data.message || 'Failed to create FAQ.' });
            }
        })
        .catch(() => Swal.fire({ icon: 'error', title: 'Oops...', text: 'Something went wrong!' }));
    });

    // ─── Edit (load data) ────────────────────────────────────────────────────────
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', async function () {
            const url       = this.getAttribute('data-url');
            const updateUrl = this.getAttribute('data-update-url');

            document.getElementById('formAdd').classList.add('hidden');
            document.getElementById('formEdit').classList.remove('hidden');

            try {
                const result = await fetch(url, {
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
                }).then(r => r.json());

                if (result.success) {
                    const d = result.data;
                    const type = d.display_level === 'model' ? 'model' : 'brand';

                    // Set toggle
                    document.getElementById(type === 'model' ? 'edit_type_model' : 'edit_type_brand').checked = true;
                    applyTypeUI('edit', type);

                    // Set brand, then cascade products
                    document.getElementById('edit_brand').value = d.brand_id || '';
                    populateProducts('edit', d.brand_id || '', d.product_id || '');

                    // Q&A
                    document.getElementById('edit_q_english').value = d.q_english || '';
                    document.getElementById('edit_a_english').value = d.a_english || '';
                    document.getElementById('edit_q_khmer').value   = d.q_khmer   || '';
                    document.getElementById('edit_a_khmer').value   = d.a_khmer   || '';
                    document.getElementById('edit_q_china').value   = d.q_china   || '';
                    document.getElementById('edit_a_china').value   = d.a_china   || '';

                    const editForm = document.getElementById('faqEditForm');
                    if (handleEditSubmit) editForm.removeEventListener('submit', handleEditSubmit);

                    handleEditSubmit = async function (e) {
                        e.preventDefault();
                        const brandId = document.getElementById('edit_brand').value;
                        if (!brandId) {
                            Swal.fire({ icon: 'warning', title: 'Brand required', text: 'Please select a brand.', confirmButtonColor: '#3b82f6' });
                            return;
                        }
                        const editType = document.querySelector('#faqEditForm input[name="display_type"]:checked').value;
                        if (editType === 'model' && !document.getElementById('edit_product_id').value) {
                            Swal.fire({ icon: 'warning', title: 'Product required', text: 'Please select a product for Model Page FAQ.', confirmButtonColor: '#3b82f6' });
                            return;
                        }
                        if (editType === 'brand') document.getElementById('edit_product_id').value = '';

                        const formData = new FormData(editForm);
                        try {
                            const upData = await fetch(updateUrl, {
                                method: 'POST', body: formData,
                                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
                            }).then(r => r.json());

                            if (upData.success) {
                                await Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false, timer: 1500, timerProgressBar: true })
                                    .fire({ icon: 'success', title: upData.message });
                                location.reload();
                            } else {
                                Swal.fire({ icon: 'error', title: 'Error!', text: upData.message || 'Failed to update.' });
                            }
                        } catch {
                            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Something went wrong during update!' });
                        }
                    };
                    editForm.addEventListener('submit', handleEditSubmit);

                } else {
                    onCancel();
                    Swal.fire({ icon: 'error', title: 'Error!', text: result.message || 'Failed to load data.' });
                }
            } catch {
                onCancel();
                Swal.fire({ icon: 'error', title: 'Oops...', text: 'Failed to load data!' });
            }
        });
    });

    // ─── Delete ──────────────────────────────────────────────────────────────────
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            const url = this.getAttribute('data-url');
            Swal.fire({
                title: 'Are you sure?', text: "You won't be able to revert this!",
                icon: 'warning', showCancelButton: true,
                confirmButtonColor: '#d33', cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                if (result.isConfirmed) {
                    fetch(url, { method: 'DELETE', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' } })
                    .then(r => r.json())
                    .then(data => {
                        if (data.success) Swal.fire('Deleted!', data.message, 'success').then(() => location.reload());
                        else Swal.fire('Error!', data.message || 'Failed to delete.', 'error');
                    })
                    .catch(() => Swal.fire('Error!', 'Something went wrong while deleting.', 'error'));
                }
            });
        });
    });
</script>
@endsection
