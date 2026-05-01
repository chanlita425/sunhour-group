@extends('layouts.app')



@section('content')

    <div class="w-full mx-auto">



        {{-- Header & Add New Button (No change needed) --}}

        <div class="mt-5 flex justify-between items-center">

            <div class="breadcrumbs text-sm">

                <ul>

                    <li>

                        <a class="flex items-center gap-2">

                            <p class="font-bold">Article</p>

                        </a>

                    </li>

                </ul>

            </div>



            {{-- Add New Button --}}

            <button onclick="openAddModal()"

                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-all">

                + Add New

            </button>

        </div>



        {{-- Table --}}

        <div class="mt-4">

            <div class="bg-white rounded-lg h-[75vh] xl:h-[85vh] overflow-auto shadow">

                <table class="table w-full">

                    <thead>

                        <tr class="text-gray-500 border-gray-200">

                            <th>Photo</th>

                            <th>Title</th>

                            <th>Sub Title</th>

                            <th>Content</th>

                            <th>Description</th>

                            <th class="text-end">Action</th>

                        </tr>

                    </thead>



                    <tbody>

                        @foreach ($data as $item)

                            <tr class="border-b">

                                <td>

                                    <img src="{{ $item->photo ? asset('uploads/articles/' . $item->photo) : '' }}"

                                        class="w-16 h-16 rounded object-cover">

                                </td>

                                <td>{{ $item->title }}</td>

                                <td>{{ $item->subtitle }}</td>



                                {{-- FIX: Content was not being stripped/limited --}}

                                <td>{!! Str::limit(strip_tags($item->content), 50) !!}</td>



                                {{-- Description: Already stripped and limited --}}

                                <td>{!! Str::limit(strip_tags($item->description), 50) !!}</td>



                                <td class="flex gap-2 justify-end items-center">

                                    {{-- Edit Button --}}

                                    <button data-id="{{ $item->id }}" data-update-url="{{ route('article.update', $item->id) }}"

                                        data-edit-url="{{ route('article.edit', $item->id) }}"

                                        class="edit-btn tooltip tooltip-top

                                                                                            p-2 rounded-full

                                                                                            bg-blue-50 text-blue-600

                                                                                            hover:bg-blue-600 hover:text-white

                                                                                            transition-all duration-300 shadow-sm" data-tip="Edit">



                                        {{-- SVG Icon --}}

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"

                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16"

                                            height="16" stroke-width="2">

                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>

                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">

                                            </path>

                                            <path d="M16 5l3 3"></path>

                                        </svg>

                                    </button>



                                    {{-- Delete Button (Wrap SVG inside the actual button) --}}

                                    <form action="{{ route('article.destroy', $item->id) }}" method="POST"

                                        onsubmit="return confirm('Delete this article?')">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"

                                            class="delete-btn tooltip tooltip-top

                                                                                            p-2 rounded-full

                                                                                            bg-red-50 text-red-600

                                                                                            hover:bg-red-600 hover:text-white

                                                                                            transition-all duration-300 shadow-sm"

                                            data-tip="Delete">



                                            {{-- SVG Icon --}}

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

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>



                </table>



                <div class="m-3">

                    {{-- Pagination (No change) --}}

                    {{-- {{ $data->links('pagination::daisyui') }} --}}

                </div>

            </div>

        </div>



    </div>



    {{-- ====================== ADD NEW MODAL ====================== --}}

    <div id="addModal" class="fixed inset-0 hidden bg-black bg-opacity-50 z-[999] p-4 overflow-auto">

        <div class="bg-white max-w-3xl mx-auto mt-10 p-6 rounded-lg shadow-xl relative">



            <button onclick="closeAddModal()"

                class="absolute top-3 right-3 px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">

                ✕

            </button>



            <h2 class="text-xl font-bold mb-4">Add New Article</h2>



            <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">

                @csrf



                {{-- Photo --}}

                <div class="mb-4">

                    <label class="block font-medium">Photo</label>

                    <input type="file" name="photo" class="w-full border p-2 rounded" onchange="previewAddImage(this)">

                    <img id="addPreview" class="w-28 h-28 mt-2 rounded hidden object-cover" />

                </div>



                <!-- ENGLISH -->

                <h3 class="font-bold text-lg mt-4 mb-2 text-blue-700">English</h3>



                <div class="mb-4">

                    <label class="block font-medium">Title (EN)</label>

                    <input type="text" name="title" class="w-full border p-2 rounded" required>

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Subtitle (EN)</label>

                    <input type="text" name="subtitle" class="w-full border p-2 rounded">

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Content (EN)</label>

                    <textarea name="content" class="w-full border p-2 rounded h-24"></textarea>

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Description (EN)</label>

                    <textarea name="description" id="des_en" class="w-full border p-2 rounded"></textarea>

                </div>



                <!-- KHMER -->

                <h3 class="font-bold text-lg mt-4 mb-2 text-green-700">Khmer</h3>



                <div class="mb-4">

                    <label class="block font-medium">Title (KH)</label>

                    <input type="text" name="title_kh" class="w-full border p-2 rounded">

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Subtitle (KH)</label>

                    <input type="text" name="subtitle_kh" class="w-full border p-2 rounded">

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Content (KH)</label>

                    <textarea name="content_kh" class="w-full border p-2 rounded h-24"></textarea>

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Description (KH)</label>

                    <textarea name="description_kh" id="des_kh" class="w-full border p-2 rounded"></textarea>

                </div>



                <!-- CHINESE -->

                <h3 class="font-bold text-lg mt-4 mb-2 text-red-700">Chinese</h3>



                <div class="mb-4">

                    <label class="block font-medium">Title (CN)</label>

                    <input type="text" name="title_cn" class="w-full border p-2 rounded">

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Subtitle (CN)</label>

                    <input type="text" name="subtitle_cn" class="w-full border p-2 rounded">

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Content (CN)</label>

                    <textarea name="content_cn" class="w-full border p-2 rounded h-24"></textarea>

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Description (CN)</label>

                    <textarea name="description_cn" id="des_cn" class="w-full border p-2 rounded"></textarea>

                </div>



                <button type="submit"

                    class="bg-blue-600 text-white px-4 py-2 mt-3 rounded hover:bg-blue-700 transition-all">

                    Save Article

                </button>



            </form>



        </div>

    </div>

    {{-- ====================== EDIT ARTICLE MODAL ====================== --}}

    <div id="editModal" class="fixed inset-0 hidden bg-black bg-opacity-50 z-[999] p-4 overflow-auto">

        <div class="bg-white max-w-3xl mx-auto mt-10 p-6 rounded-lg shadow-xl relative">



            <button onclick="closeEditModal()"

                class="absolute top-3 right-3 px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">

                ✕

            </button>



            <h2 class="text-xl font-bold mb-4">Edit Article</h2>



            <form id="editForm" method="POST" enctype="multipart/form-data">

                @csrf

                @method('PUT')



                {{-- Photo --}}

                <div class="mb-4">

                    <label class="block font-medium">Photo</label>

                    <img id="editPreview" class="w-28 h-28 mb-2 rounded object-cover" />

                    <input type="file" name="photo" class="w-full border p-2 rounded" onchange="previewEditImage(this)">

                </div>



                {{-- ---------------- ENGLISH ---------------- --}}

                <hr class="my-4">

                <h3 class="font-bold text-lg text-blue-700">English</h3>



                <div class="mb-4">

                    <label class="block font-medium">Title (EN)</label>

                    <input type="text" id="edit_title" name="title" class="w-full border p-2 rounded" required>

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Sub Title (EN)</label>

                    <input type="text" id="edit_subtitle" name="subtitle" class="w-full border p-2 rounded">

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Content (EN)</label>

                    <textarea id="edit_content" name="content" class="w-full border p-2 rounded h-24"></textarea>

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Description (EN)</label>

                    <textarea id="edit_description" name="description" class="w-full border p-2 rounded"></textarea>

                </div>



                {{-- ---------------- KHMER ---------------- --}}

                <hr class="my-4">

                <h3 class="font-bold text-lg text-green-700">Khmer</h3>



                <div class="mb-4">

                    <label class="block font-medium">Title (KH)</label>

                    <input type="text" id="edit_title_kh" name="title_kh" class="w-full border p-2 rounded">

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Sub Title (KH)</label>

                    <input type="text" id="edit_subtitle_kh" name="subtitle_kh" class="w-full border p-2 rounded">

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Content (KH)</label>

                    <textarea id="edit_content_kh" name="content_kh" class="w-full border p-2 rounded h-24"></textarea>

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Description (KH)</label>

                    <textarea id="edit_description_kh" name="description_kh" class="w-full border p-2 rounded"></textarea>

                </div>



                {{-- ---------------- CHINESE ---------------- --}}

                <hr class="my-4">

                <h3 class="font-bold text-lg text-red-700">Chinese</h3>



                <div class="mb-4">

                    <label class="block font-medium">Title (CN)</label>

                    <input type="text" id="edit_title_cn" name="title_cn" class="w-full border p-2 rounded">

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Sub Title (CN)</label>

                    <input type="text" id="edit_subtitle_cn" name="subtitle_cn" class="w-full border p-2 rounded">

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Content (CN)</label>

                    <textarea id="edit_content_cn" name="content_cn" class="w-full border p-2 rounded h-24"></textarea>

                </div>



                <div class="mb-4">

                    <label class="block font-medium">Description (CN)</label>

                    <textarea id="edit_description_cn" name="description_cn" class="w-full border p-2 rounded"></textarea>

                </div>



                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition-all">

                    Update Article

                </button>



            </form>



        </div>

    </div>



    {{-- ====================== JS ====================== --}}

    <script>

        function openAddModal() {

            document.getElementById("addModal").classList.remove("hidden");

        }

        function closeAddModal() {

            document.getElementById("addModal").classList.add("hidden");

        }

    </script>

    <script>

        // ================== IMAGE PREVIEW =====================

        function previewAddImage(input) {

            const preview = document.getElementById("addPreview");

            preview.src = URL.createObjectURL(input.files[0]);

            preview.classList.remove("hidden");

        }



        function previewEditImage(input) {

            const preview = document.getElementById("editPreview");

            preview.src = URL.createObjectURL(input.files[0]);

        }



        // ================== EDIT BUTTON =====================

        const editButtons = document.querySelectorAll('.edit-btn');



        editButtons.forEach(btn => {

            btn.addEventListener('click', function () {



                const editUrl = this.dataset.editUrl;

                const updateUrl = this.dataset.updateUrl;



                document.getElementById("editForm").action = updateUrl;



                document.getElementById("editModal").classList.remove("hidden");



                fetch(editUrl)

                    .then(res => res.json())

                    .then(data => {



                        // English

                        document.getElementById("edit_title").value = data.title;

                        document.getElementById("edit_subtitle").value = data.subtitle;

                        document.getElementById("edit_content").value = data.content;

                        CKEDITOR.instances.edit_description.setData(data.description);



                        // Khmer

                        document.getElementById("edit_title_kh").value = data.title_kh;

                        document.getElementById("edit_subtitle_kh").value = data.subtitle_kh;

                        document.getElementById("edit_content_kh").value = data.content_kh;

                        CKEDITOR.instances.edit_description_kh.setData(data.description_kh);



                        // Chinese (FIXED)

                        document.getElementById("edit_title_cn").value = data.title_cn;

                        document.getElementById("edit_subtitle_cn").value = data.subtitle_cn;

                        document.getElementById("edit_content_cn").value = data.content_cn;

                        CKEDITOR.instances.edit_description_cn.setData(data.description_cn);



                        // Photo preview (FIXED)

                        const img = document.getElementById("editPreview");

                        img.src = data.photo ? `/uploads/articles/${data.photo}` : "";

                        img.classList.remove("hidden");

                    });



            });

        });





        function closeEditModal() {

            document.getElementById("editModal").classList.add("hidden");

        }



    </script>

    {{-- Js For Comfirm Delete --}}

    <script>

        document.querySelectorAll('.delete-btn').forEach(btn => {

            btn.addEventListener('click', function () {



                const form = this.closest('.delete-form');



                Swal.fire({

                    title: "Are you sure?",

                    text: "This article will be deleted permanently!",

                    icon: "warning",

                    showCancelButton: true,

                    confirmButtonColor: "#d33",

                    cancelButtonColor: "#3085d6",

                    confirmButtonText: "Yes, delete!",

                }).then((result) => {

                    if (result.isConfirmed) {

                        form.submit();

                    }

                });



            });

        });

    </script>



    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <script>

        CKEDITOR.replace('des_en');        // English description

        CKEDITOR.replace('des_kh');     // Khmer description

        CKEDITOR.replace('des_cn');     // Chinese description



        CKEDITOR.replace('edit_description');

        CKEDITOR.replace('edit_description_kh');

        CKEDITOR.replace('edit_description_cn');  

    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))

        <script>

            Swal.fire({

                icon: 'success',

                title: "{{ session('success') }}",

                showConfirmButton: false,

                timer: 2000,

                toast: true,

                position: 'top-end'

            });

        </script>

    @endif



    @if (session('error'))

        <script>

            Swal.fire({

                icon: 'error',

                title: "{{ session('error') }}",

                showConfirmButton: false,

                timer: 2000,

                toast: true,

                position: 'top-end'

            });

        </script>

    @endif



@endsection