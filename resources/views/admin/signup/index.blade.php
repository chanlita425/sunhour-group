@extends('layouts.app')

@section('content')

    <div class="w-full mx-auto">

        {{-- Header & Add New Button (No change needed) --}}
        <div class="mt-5 flex justify-between items-center">
            <div class="breadcrumbs text-sm">
                <ul>
                    <li>
                        <a class="flex items-center gap-2">
                            <p class="font-bold">User Submissions </p>
                        </a>
                    </li>
                </ul>
            </div>
            @if(session('success'))
                <div class="p-3 bg-green-100 text-green-800 mb-4">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        {{-- Table --}}
        <div class="mt-4">
            <div class="bg-white rounded-lg h-[75vh] xl:h-[85vh] overflow-auto shadow">
                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">#</th>
                            <th class="border p-2">Full Name</th>
                            <th class="border p-2">Phone</th>
                            <th class="border p-2">Email</th>
                            <th class="border p-2">Specialty</th>
                            <th class="border p-2">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td class="border p-2">{{ $item->id }}</td>
                                <td class="border p-2">{{ $item->full_name }}</td>
                                <td class="border p-2">{{ $item->phone }}</td>
                                <td class="border p-2">{{ $item->email }}</td>
                                <td class="border p-2">{{ $item->specialty }}</td>

                                <td class="border p-2 flex gap-2">
                                    <!-- Delete -->
                                    <form action="{{ route('signup.delete', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this record?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="tooltip tooltip-top
                                                                                                                        p-2 rounded-full
                                                                                                                        bg-red-50 text-red-600
                                                                                                                        hover:bg-red-600 hover:text-white
                                                                                                                        transition-all duration-300 shadow-sm">

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
                <div class="mt-4">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection