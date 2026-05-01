@extends('layouts.app')
@section('content')
    <div class="w-full mx-auto">
        <div class="mt-5">
            <div class="grid grid-cols-12">
                <div class="breadcrumbs text-sm col-span-4">
                    <ul>
                        <li>
                            <a class="flex items-center gap-2">
                                <p class="font-blod">Frequently Asked Questions</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- View Data in Table --}}
        <div class="grid grid-cols-12 space-x-5 mt-5">
            <div class="bg-white rounded-lg col-span-8 xl:col-span-9 h-[75vh] xl:h-[85vh] overflow-auto">
                <table class="table">
                    <thead>
                        <tr class="text-gray-500 border-gray-200">
                            <th>#</th>
                            <th>Question (English)</th>
                            <th>Answer</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if($data->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500">
                                    <div class="inline-flex items-center gap-2">
                                        <p>No data found.</p>
                                        <span class="loading loading-dots loading-xs"></span>
                                    </div>
                                </td>
                            </tr>
                        @else
                            @foreach ($data as $item)
                                <tr class="border-b">
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $item->q_english }}</td>

                                    <td>{{ $item->a_english }}</td>

                                    <td class="flex gap-2 justify-end">
                                        {{-- Edit Button (unchanged logic, improved appearance) --}}
                                        <button data-url="{{ route('faqs.show', $item->id) }}"
                                            data-update-url="{{ route('faqs.update', $item->id) }}" data-id="{{ $item->id }}"
                                            class="edit-btn tooltip tooltip-top bg-green-100 text-green-600 p-2 rounded-full hover:bg-green-600 hover:text-white transition-all duration-300"
                                            data-tip="Edit">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16"
                                                height="16" stroke-width="2">
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                </path>
                                                <path d="M16 5l3 3"></path>
                                            </svg>
                                        </button>

                                        {{-- Delete Button (corrected icon and improved appearance) --}}
                                        <button data-url="{{ route('faqs.destroy', $item->id) }}"
                                            class="delete-btn tooltip tooltip-top bg-red-100 text-red-600 p-2 rounded-full hover:bg-red-600 hover:text-white transition-all duration-300"
                                            data-tip="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16"
                                                height="16" stroke-width="2">
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
                        @endif
                    </tbody>
                </table>

                <div class="m-3">
                    {{-- {{ $data->links('pagination::daisyui') }} --}}
                </div>
            </div>

            <div id="formAdd" class="col-span-4 xl:col-span-3 w-full pr-5 space-y-4">
                <h1 class="font-bold">Add FAQs</h1>
                <form action="" method="POST" class="w-full bg-white rounded-lg p-2" id="brandForm">
                    @csrf
                    <div class="space-y-4">
                        {{-- Q&A of English --}}
                        <!-- Brand Input -->
                        <h1>Q&A of English</h1>
                        <div class="form-group w-full space-y-2">
                            <label for="name" class="text-gray-500 text-[12px]">Question</label>
                            <input type="text" name="q_english" x-model="name"
                                class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                                placeholder="Enter Question">
                        </div>
                        <div class="form-group w-full space-y-2">
                            <label for="name" class="text-gray-500 text-[12px]">Answer</label>
                            <input type="text" name="a_english" x-model="name"
                                class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                                placeholder="Enter Answer">
                        </div>
                        {{-- Q&A of Khmer --}}
                        <!-- Brand Input -->
                        <h1>Q&A of khmer</h1>
                        <div class="form-group w-full space-y-2">
                            <label for="name" class="text-gray-500 text-[12px]">Question</label>
                            <input type="text" name="q_khmer" x-model="name"
                                class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                                placeholder="Enter Question">
                        </div>
                        <div class="form-group w-full space-y-2">
                            <label for="name" class="text-gray-500 text-[12px]">Answer</label>
                            <input type="text" name="a_khmer" x-model="name"
                                class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                                placeholder="Enter Answer">
                        </div>
                        {{-- Q&A of China --}}
                        <!-- Brand Input -->
                        <h1>Q&A of Chinese</h1>
                        <div class="form-group w-full space-y-2">
                            <label for="name" class="text-gray-500 text-[12px]">Question</label>
                            <input type="text" name="q_china" x-model="name"
                                class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                                placeholder="Enter Question">
                        </div>
                        <div class="form-group w-full space-y-2">
                            <label for="name" class="text-gray-500 text-[12px]">Answer</label>
                            <input type="text" name="a_china" x-model="name"
                                class="form-control w-full bg-gray-100 rounded-sm py-1 px-2 text-[12px] font-light outline-none focus:bg-gray-200 transition-all duration-300"
                                placeholder="Enter Answer">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" :disabled="!isFormValid()"
                            class="text-[14px] bg-blue-500 text-white px-4 py-1 rounded-sm mt-2 hover:bg-blue-600 disabled:bg-gray-400 disabled:cursor-not-allowed">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
            <div id="formEdit" class="hidden col-span-4 xl:col-span-3 w-full pr-5">
                <h1 class="font-bold">Edit FAQs</h1>
                <form method="POST" class="w-full bg-white rounded-lg p-5 space-y-4" id="brandFormEdit">
                    @csrf
                    @method('PUT')

                    <h1 class="font-bold">Q&A of English</h1>

                    <div class="form-group space-y-2">
                        <label>Question EN</label>
                        <input type="text" name="q_english" id="edit_q_english" class="form-control text-sm">
                    </div>

                    <div class="form-group space-y-2">
                        <label>Answer EN</label>
                        <input type="text" name="a_english" id="edit_a_english" class="form-control text-sm">
                    </div>

                    <h1 class="font-bold">Q&A of Khmer</h1>

                    <div class="form-group space-y-2">
                        <label>Question KH</label>
                        <input type="text" name="q_khmer" id="edit_q_khmer" class="form-control text-sm">
                    </div>

                    <div class="form-group space-y-2">
                        <label>Answer KH</label>
                        <input type="text" name="a_khmer" id="edit_a_khmer" class="form-control text-sm">
                    </div>

                    <h1 class="font-bold">Q&A of Chinese</h1>

                    <div class="form-group space-y-2">
                        <label>Question CN</label>
                        <input type="text" name="q_china" id="edit_q_china" class="form-control text-sm">
                    </div>

                    <div class="form-group space-y-2">
                        <label>Answer CN</label>
                        <input type="text" name="a_china" id="edit_a_china" class="form-control text-sm">
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded-sm">Update</button>
                    <button type="button" onclick="onCancel()"
                        class="bg-red-500 text-white px-4 py-1 rounded-sm">Cancel</button>

                </form>
            </div>

        </div>
    </div>

    // ... existing HTML and Blade structure ...

    <script>
        // Include this helper function outside the loops if it's not defined by a framework like Alpine.js
        function isFormValid() {
            // Simple placeholder for your form validation logic
            // You should implement actual validation here if needed
            return true;
        }

        function onCancel() {
            document.getElementById('formAdd').classList.remove('hidden');
            document.getElementById('formEdit').classList.add('hidden');
        }

        // Variable to hold the reference to the update submit handler
        let handleSubmit;

        // --- STORE OPERATION (Add New Data) ---
        document.getElementById('brandForm').addEventListener('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(this);
            const formElement = this; // Store reference to the form

            fetch("{{ route('faqs.store') }}", {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
                .then(response => {
                    if (!response.ok) {
                        // Handle server-side validation or other error responses
                        return response.json().then(err => { throw err; });
                    }
                    return response.json();
                })
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
                        }).then(() => {
                            // 1. Clear the form fields after successful submission
                            formElement.reset();

                            // 2. IMPORTANT: To show new data without a full reload,
                            //    you would insert a new row into the <tbody> here 
                            //    using the 'data.data' returned from the server.
                            //    Since I don't know the exact structure of 'data.data' 
                            //    (i.e., if it contains the ID and all fields), 
                            //    I'll keep a 'soft' reload for instant visual feedback 
                            //    until you implement DOM manipulation.
                            //    
                            //    ***If you truly want no reload, remove the line below 
                            //    and implement dynamic row insertion based on 'data.data'.***

                            // For a temporary fix to clear the form and show the result immediately:
                            location.reload();
                        });
                    } else {
                        // Handle server-side errors that don't throw an HTTP error
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: data.message || 'Failed to create FAQ.',
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    // Handle network errors or errors thrown from the response check
                    let errorMessage = 'Something went wrong!';
                    if (error.errors) {
                        // Example of handling Laravel validation errors
                        errorMessage = Object.values(error.errors).flat().join('\n');
                    } else if (error.message) {
                        errorMessage = error.message;
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: errorMessage,
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });
                });
        });

        // --- EDIT AND UPDATE OPERATION (Unchanged, but included for context) ---
        // ... (Your existing Edit and Update logic remains here) ...

        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', async function () {
                const url = this.getAttribute('data-url');
                const updateUrl = this.getAttribute('data-update-url');
                const formAdd = document.getElementById('formAdd');
                const formEdit = document.getElementById('formEdit');
                const brandFormEdit = document.getElementById('brandFormEdit');

                // Toggle visibility
                formAdd.classList.add('hidden');
                formEdit.classList.remove('hidden');

                try {
                    // 1. Fetch data for editing
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
                        document.getElementById('edit_q_english').value = data.data.q_english || '';
                        document.getElementById('edit_a_english').value = data.data.a_english || '';
                        document.getElementById('edit_q_khmer').value = data.data.q_khmer || '';
                        document.getElementById('edit_a_khmer').value = data.data.a_khmer || '';
                        document.getElementById('edit_q_china').value = data.data.q_china || '';
                        document.getElementById('edit_a_china').value = data.data.a_china || '';

                        // Remove previous listener if it exists
                        if (handleSubmit) {
                            brandFormEdit.removeEventListener('submit', handleSubmit);
                        }

                        // Define submit handler for update
                        handleSubmit = async function (e) {
                            e.preventDefault();
                            // FormData will include the hidden _method=PUT field from blade
                            const formData = new FormData(brandFormEdit);

                            try {
                                const updateResponse = await fetch(updateUrl, {
                                    method: 'POST', // Sent as POST, but Laravel treats it as PUT
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

                                    // Reload the page to show the updated data
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
                                console.error('Update fetch error:', error);
                                await Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong during update!',
                                    confirmButtonColor: '#d33',
                                    confirmButtonText: 'OK'
                                });
                            }
                        };

                        // Add new listener for update
                        brandFormEdit.addEventListener('submit', handleSubmit);
                    } else {
                        onCancel(); // Hide edit form if data not found
                        await Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: data.message || 'Failed to load data',
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        });
                    }
                } catch (error) {
                    console.error('Show fetch error:', error);
                    onCancel(); // Hide edit form on error
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

        // --- DELETE OPERATION (Unchanged, but included for context) ---
        // ... (Your existing Delete logic remains here) ...
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
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
                                        // Reload the page to update the table
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        data.message || 'Failed to delete.',
                                        'error'
                                    );
                                }
                            })
                            .catch(error => {
                                console.error('Delete fetch error:', error);
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

        // Redefine onCancel for clarity
        function onCancel() {
            document.getElementById('formAdd').classList.remove('hidden');
            document.getElementById('formEdit').classList.add('hidden');
            // Remove the temporary update listener when canceling the edit form
            const brandFormEdit = document.getElementById('brandFormEdit');
            if (handleSubmit) {
                brandFormEdit.removeEventListener('submit', handleSubmit);
                handleSubmit = null; // Clear reference
            }
        }
    </script>
@endsection