@extends('layouts.app')
@section('content')
    <div class="w-full mx-auto">
        <nav class="grid grid-cols-12">
            <form action="{{ route('deep-cleans.index',[$singleData->products->brands->uuid,$singleData->products->uuid,$singleData->uuid]) }}" method="GET" class="col-span-8 w-[54vh]">
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
                    <input name="search" value="{{ request('search') }}" type="text" placeholder="Search..."
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
                            <a href="{{ route('brands.index', [$singleData->products->brands->uuid,$singleData->products->uuid]) }}" class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
                                     stroke-width="1.25">
                                    <path d="M5 12l14 0"></path>
                                    <path path d="M5 12l4 4"></path>
                                    <path d="M5 12l4 -4"></path>
                                </svg>
                                <p>Brands</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products.index', [$singleData->products->brands->uuid,$singleData->products->uuid]) }}">Products</a>
                        </li>
                        <li>
                            <a href="{{ route('models.index', [$singleData->products->brands->uuid,$singleData->products->uuid]) }}">Models</a>
                        </li>
                        <li>Add Deep Cleaning Lists</li>
                    </ul>
                </div>
                <div class="col-span-8 flex items-center justify-end space-x-5">
                    <form action="{{ route('deep-cleans.index',[$singleData->products->brands->uuid,$singleData->products->uuid,$singleData->uuid]) }}" method="GET" id="perPage">
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
                    <th>Deep Clean</th>
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
                    @foreach($dc as $item)
                        @if($item->model_id == $singleData->uuid)
                            <tr class="hover:bg-gray-100 border-gray-200 border-b">
                                <th>
                                    {{ $item->auto_number }}
                                </th>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <iframe width="200" height="100" src="{{$item->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        <p>{{$item->name}}</p>
                                    </div>
                                </td>
                                <td class="inline-flex items-center gap-2 float-end">
                                    <button data-tip="Edit"
                                            data-id="{{ $item->uuid }}"
                                            data-url="{{ route('deep-cleans.edit', [$singleData->products->brands->uuid,$singleData->products->uuid,$singleData->uuid,$item->uuid]) }}"
                                            data-update-url="{{ route('deep-cleans.update', [$singleData->products->brands->uuid,$singleData->products->uuid,$singleData->uuid,$item->uuid]) }}"
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
                                    <button data-id="{{ $item->uuid }}"
                                            data-url="{{ route('deep-cleans.destroy', [$singleData->products->brands->uuid,$singleData->products->uuid,$singleData->uuid,$item->uuid]) }}"
                                            data-tip="Delete"
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
                        @endif
                    @endforeach
                    </tbody>
                @endif
            </table>
            {{-- Pagination Of laravel --}}
            <div class="m-3">
                {{ $dc->links('pagination::daisyui') }}
            </div>
        </div>

        {{-- form to add new brand --}}
        <div id="formAdd" class="col-span-4 xl:col-span-3 w-full pr-5">
            <form action="{{ route('deep-cleans.store', [$singleData->products->brands->uuid,$singleData->products->uuid,$singleData->uuid]) }}" method="POST" class="w-full bg-white rounded-lg p-5" id="brandFormAdd">
                @csrf
                <div x-data="{
                    name: '',
                    video: '',
                    isFormValid() {
                        return this.name.trim() !== '' && this.video.trim() !== '';
                    }
                }"
                     class="space-y-4">
                    <input type="hidden" name="model_id"  value="{{$singleData->uuid}}"
                           class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                           placeholder="Enter Deep Clean">
                    <!-- deep Clean Input -->
                    <div class="form-group w-full space-y-2">
                        <label for="name" class="text-gray-500 text-[12px]">Deep Clean</label>
                        <input type="text" name="name"  x-model="name"
                               class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                               placeholder="Enter Deep Clean">
                    </div>
                    <!-- Link Input -->
                    <div class="form-group w-full space-y-2">
                        <label for="link" class="text-gray-500 text-[12px]">Link</label>
                        <label class="inline-flex items-center gap-2 w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="1.25">
                                <path d="M9 15l6 -6"></path>
                                <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464"></path>
                                <path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463"></path>
                            </svg>
                            <input type="url" name="video" x-model="video"
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
                <div
                    class="space-y-4">
                    <input type="hidden" name="model_id"  id="model_id"
                           class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                           placeholder="Enter Deep Clean">
                    <!-- deep Clean Input -->
                    <div class="form-group w-full space-y-2">
                        <label for="name" class="text-gray-500 text-[12px]">Deep Clean</label>
                        <input type="text" name="name"  id="name"
                               class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                               placeholder="Enter Deep Clean">
                    </div>
                    <!-- Link Input -->
                    <div class="form-group w-full space-y-2">
                        <label for="link" class="text-gray-500 text-[12px]">Link</label>
                        <label class="inline-flex items-center gap-2 w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="1.25">
                                <path d="M9 15l6 -6"></path>
                                <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464"></path>
                                <path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463"></path>
                            </svg>
                            <input type="url" name="video" id="video"
                                   class="w-full outline-none bg-transparent"
                                   placeholder="https://placehold.co/100x100">
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="text-[14px] bg-blue-500 text-white px-4 py-1 rounded-sm mt-2 hover:bg-blue-600 disabled:bg-gray-400 disabled:cursor-not-allowed"
                    >
                        Update
                    </button>
                    <button
                        type="button"
                        onclick="onCancel()"
                        class="text-[14px] bg-red-500 text-white px-4 py-1 rounded-sm mt-2 hover:bg-red-600 disabled:bg-red-400 disabled:cursor-not-allowed"
                    >
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>

    <!-- Add this script at the bottom of your content section -->
    <script>
        {{--Store--}}
        document.getElementById('brandFormAdd').addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch("{{ route('deep-cleans.store',[$singleData->products->brands->uuid,$singleData->products->uuid,$singleData->uuid]) }}", {
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
                            timer: 500,
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
                                document.getElementById('brandFormAdd').reset();
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
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', async function() {
                const url = this.getAttribute('data-url'); // e.g., /admin/brands/{uuid}/edit
                const updateUrl = this.getAttribute('data-update-url'); // e.g., /admin/brands/update/{uuid}
                const id = this.getAttribute('data-id');

                const formAdd = document.getElementById('formAdd');
                const formEdit = document.getElementById('formEdit');

                // Toggle form visibility
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
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        }
                    });

                    const data = await response.json();

                    if (data.success) {
                        // Populate form fields
                        document.getElementById('model_id').value = data.data.model_id || '';
                        document.getElementById('name').value = data.data.name || '';
                        document.getElementById('video').value = data.data.video || '';

                        const brandForm = document.getElementById('brandFormEdit');

                        // Remove previous listeners and add new submit handler
                        const handleSubmit = async function(e) {
                            e.preventDefault();
                            const formData = new FormData(this);

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
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 500,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.onmouseenter = Swal.stopTimer;
                                            toast.onmouseleave = Swal.resumeTimer;
                                        }
                                    });

                                    await Toast.fire({
                                        icon: 'success',
                                        title: updateData.message
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

                        // Remove existing listeners and add new one
                        brandForm.removeEventListener('submit', handleSubmit);
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
                    console.log(result)
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

        function onCancel(){
            document.getElementById('formAdd').classList.remove('hidden');
            document.getElementById('formEdit').classList.add('hidden');
        }
    </script>
@endsection
