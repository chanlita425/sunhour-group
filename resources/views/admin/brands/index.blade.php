@extends('layouts.app')
@section('content')
    <div class="w-full mx-auto">
        <nav class="grid grid-cols-12">
            <form action="{{ route('brands.index') }}" method="GET" class="col-span-8 w-[54vh]">
                <label for="search" class="w-full flex items-center gap-2 bg-gray-100 rounded-full px-4 py-2">
                    <button type="submit">
                        <span>
                            <svg class="text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                                height="24" stroke-width="1.25">
                                <path d="M11 19a8 8 0 1 0 0 -16a8 8 0 0 0 0 16z"></path>
                                <path d="M21 21l-4.35 -4.35"></path>
                            </svg>
                        </span>
                    </button>
                    <input name="search" value="{{ request('search') }}" type="text" placeholder="Search Brand..."
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
                            <a class="flex items-center gap-2">
                                <p class="font-bold">Brands</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-span-8 flex items-center justify-end space-x-5">
                    <!-- Per Page Form -->
                    <form action="{{ route('brands.index') }}" method="GET" id="perPage">
                        <label for="perPage">
                            Showing
                            <select name="perPage" id="perPage" class="select select-sm select-bordered bg-blue-300/30"
                                onchange="this.form.submit()">
                                <option value="10" {{ request('perPage') == '10' ? 'selected' : '' }}>10</option>
                                <option value="20" {{ request('perPage') == '20' ? 'selected' : '' }}>20</option>
                                <option value="50" {{ request('perPage') == '50' ? 'selected' : '' }}>50</option>
                            </select>
                        </label>
                        <!-- Preserve other query parameters -->
                        @foreach (request()->except(['perPage', 'page']) as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach
                    </form>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-12 space-x-5 mt-5">
            <div
                class="bg-white rounded-lg col-span-8 xl:col-span-9 h-[75vh] xl:h-[85vh] overflow-auto">
                <table class="table">
                    <thead>
                        <tr class="text-gray-500 border-gray-200">
                            <th>#</th>
                            <th>Brand Name</th>
                            <th></th>
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
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="border-gray-200 border-b">
                                    <th>
                                        {{ $item->auto_number }}
                                    </th>
                                    <td class="flex items-center gap-2">
                                        <div
                                            class="[&>svg]:currentColor [&>svg]:[fill:currentColor] [&>svg]:w-full [&>svg]:h-full">
                                            {!! str_replace('fill="currentColor"', 'fill="currentColor" style="fill: currentColor;"', $item->logoSvg) !!}
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="inline-flex items-center gap-2 float-end">
                                        <a data-tip="Go to Products" href="{{ route('products.index', $item->uuid) }}"
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
                                        </a>
                                        <button data-tip="Edit" data-id="{{ $item->uuid }}"
                                            data-url="{{ route('brands.edit', $item->uuid) }}"
                                            data-update-url="{{ route('brands.update', $item->uuid) }}"
                                            class="edit-btn tooltip tooltip-top bg-green-50 text-green-500 px-2 py-1 rounded-md hover:bg-green-500 hover:text-white transition-all duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                width="24" height="24" stroke-width="1.25">
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                </path>
                                                <path d="M16 5l3 3"></path>
                                            </svg>
                                        </button>
                                        <button data-id="{{ $item->uuid }}"
                                            data-url="{{ route('brands.destroy', $item->uuid) }}" data-tip="Delete"
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
                            @endforeach
                        </tbody>
                    @endif
                </table>
                {{-- Pagination Of laravel --}}
                <div class="m-3">
                    {{ $data->links('pagination::daisyui') }}
                </div>
            </div>

            <div id="formAdd" class="col-span-4 xl:col-span-3 w-full pr-5 h-[75vh] xl:h-[85vh] overflow-y-auto">
                <form action="{{ route('brands.store') }}" method="POST" class="w-full bg-white rounded-lg p-5"
                    id="brandForm">
                    @csrf
                    <div x-data="{
                        name: '',
                        logoSvg: '',
                        isFormValid() {
                            return this.name.trim() !== '' &&
                                this.logoSvg.trim() !== '';
                        }
                    }" class="space-y-4">
                        <!-- Brand Name -->
                        <div class="form-group w-full space-y-2">
                            <label for="name" class="text-gray-500 text-[12px]">Brand Name</label>
                            <input type="text" name="name" x-model="name"
                                class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                                placeholder="Enter Brand Name">
                        </div>

                        <!-- Description -->
                        <div class="form-group w-full space-y-2 overflow-hidden">
                            <label for="add_brand_description" class="text-gray-500 text-[12px]">Description</label>
                            <textarea name="description" id="add_brand_description" rows="4"
                                class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                                placeholder="Enter description (optional)"></textarea>
                        </div>

                        <!-- Logo SVG Path -->
                        <div class="form-group w-full space-y-2">
                            <label for="logoSvg" class="text-gray-500 text-[12px]">Logo SVG Path</label>
                            <textarea name="logoSvg" x-model="logoSvg"
                                class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                                placeholder="Enter SVG path (e.g., <path d='M10 20...'>)" rows="4"></textarea>
                            <p class="text-gray-400 text-[10px]">Enter valid SVG path data</p>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" :disabled="!isFormValid()"
                            class="text-[14px] bg-blue-500 text-white px-4 py-1 rounded-sm mt-2 hover:bg-blue-600 disabled:bg-gray-400 disabled:cursor-not-allowed">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
            <div id="formEdit" class="hidden col-span-4 xl:col-span-3 w-full pr-5 h-[75vh] xl:h-[85vh] overflow-y-auto">
                <form method="POST" class="w-full bg-white rounded-lg p-5" id="brandFormEdit">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <!-- Brand Name -->
                        <div class="form-group w-full space-y-2">
                            <label for="name" class="text-gray-500 text-[12px]">Brand Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                                placeholder="Enter Brand Name">
                        </div>

                        <!-- Description -->
                        <div class="form-group w-full space-y-2 overflow-hidden">
                            <label for="edit_brand_description" class="text-gray-500 text-[12px]">Description</label>
                            <textarea name="description" id="edit_brand_description" rows="4"
                                class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                                placeholder="Enter description (optional)"></textarea>
                        </div>

                        <!-- Logo SVG Path -->
                        <div class="form-group w-full space-y-2">
                            <label for="logoSvg" class="text-gray-500 text-[12px]">Logo SVG Path</label>
                            <textarea name="logoSvg" id="logoSvg"
                                class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                                placeholder="Enter SVG path (e.g., <path d='M10 20...'>)" rows="4"></textarea>
                            <p class="text-gray-400 text-[10px]">Enter valid SVG path data</p>
                        </div>

                        <button type="submit"
                            class="text-[14px] bg-blue-500 text-white px-4 py-1 rounded-sm mt-2 hover:bg-blue-600 disabled:bg-gray-400 disabled:cursor-not-allowed">
                            Update
                        </button>
                        <button type="button" onclick="onCancel()"
                            class="text-[14px] bg-red-500 text-white px-4 py-1 rounded-sm mt-2 hover:bg-red-600 disabled:bg-red-400 disabled:cursor-not-allowed">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        let addBrandEditorInstance = null;
        let editBrandEditorInstance = null;

        ClassicEditor.create(document.querySelector('#add_brand_description'))
            .then(editor => { addBrandEditorInstance = editor; })
            .catch(error => { console.error(error); });

        ClassicEditor.create(document.querySelector('#edit_brand_description'))
            .then(editor => { editBrandEditorInstance = editor; })
            .catch(error => { console.error(error); });

        {{-- Store --}}
        document.getElementById('brandForm').addEventListener('submit', function(e) {
            e.preventDefault();

            if (addBrandEditorInstance) {
                document.getElementById('add_brand_description').value = addBrandEditorInstance.getData();
            }

            let formData = new FormData(this);

            fetch("{{ route('brands.store') }}", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: data.message
                        }).then((toast) => {
                            if (toast) {
                                // Optionally reset the form or redirect
                                document.getElementById('brandForm').reset();
                                // You could also refresh the page or update the table here
                                location.reload();
                            }
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
        // edit
        let handleSubmit; // Keep reference outside

        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', async function () {
                const url = this.getAttribute('data-url');
                const updateUrl = this.getAttribute('data-update-url');
                const id = this.getAttribute('data-id');

                const formAdd = document.getElementById('formAdd');
                const formEdit = document.getElementById('formEdit');
                const brandForm = document.getElementById('brandFormEdit');

                // Toggle visibility
                formAdd.classList.add('hidden');
                formEdit.classList.remove('hidden');

                try {
                    const response = await fetch(url, {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        }
                    });

                    const data = await response.json();

                    if (data.success) {
                        document.getElementById('name').value = data.data.name || '';
                        document.getElementById('logoSvg').value = data.data.logoSvg || '';
                        if (editBrandEditorInstance) {
                            editBrandEditorInstance.setData(data.data.description || '');
                        } else {
                            document.getElementById('edit_brand_description').value = data.data.description || '';
                        }

                        // Remove previous listener if it exists
                        if (handleSubmit) {
                            brandForm.removeEventListener('submit', handleSubmit);
                        }

                        // Define submit handler
                        handleSubmit = async function (e) {
                            e.preventDefault();
                            if (editBrandEditorInstance) {
                                document.getElementById('edit_brand_description').value = editBrandEditorInstance.getData();
                            }
                            const formData = new FormData(brandForm);
                            try {
                                const updateResponse = await fetch(updateUrl, {
                                    method: 'POST',
                                    body: formData,
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Accept': 'application/json'
                                    }
                                });

                                const updateData = await updateResponse.json();

                                if (updateData.success) {
                                    await Swal.fire({
                                        toast: true,
                                        icon: 'success',
                                        title: updateData.message,
                                        timer: 1500,
                                        position: 'top-end',
                                        showConfirmButton: false,
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

                        // Add new listener
                        brandForm.addEventListener('submit', handleSubmit);
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

        //  Delete
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
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
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

        function onCancel() {
            document.getElementById('formAdd').classList.remove('hidden');
            document.getElementById('formEdit').classList.add('hidden');
        }
    </script>
@endsection
