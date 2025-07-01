@if ($paginator->hasPages())
    <div class="flex flex-col items-center gap-4 mt-4">
        <!-- Showing Info -->
        <div class="text-sm text-gray-600">
            Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} entries
        </div>

        <!-- Pagination Controls -->
        <div class="btn-group flex justify-center items-center gap-2">
            <!-- Previous Button -->
            @if ($paginator->onFirstPage())
                <button class="px-3 py-2 rounded-lg bg-gray-200 text-gray-400 cursor-not-allowed" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="2">
                        <path d="M15 6l-6 6l6 6"></path>
                    </svg>
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 rounded-lg bg-white border border-gray-300 text-gray-700 hover:bg-gray-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="2">
                        <path d="M15 6l-6 6l6 6"></path>
                    </svg>
                </a>
            @endif

            <!-- Page Numbers -->
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-1 text-gray-500">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <a href="{{ $url }}"
                           class="px-3 py-1 rounded-lg border {{ $page == $paginator->currentPage() ? 'bg-blue-500 text-white border-blue-500' : 'bg-white border-gray-300 text-gray-700 hover:bg-gray-100' }} transition-colors">
                            {{ $page }}
                        </a>
                    @endforeach
                @endif
            @endforeach

            <!-- Next Button -->
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 rounded-lg bg-white border border-gray-300 text-gray-700 hover:bg-gray-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="2">
                        <path d="M9 6l6 6l-6 6"></path>
                    </svg>
                </a>
            @else
                <button class="px-3 py-2 rounded-lg bg-gray-200 text-gray-400 cursor-not-allowed" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="2">
                        <path d="M9 6l6 6l-6 6"></path>
                    </svg>
                </button>
            @endif
        </div>
    </div>
@endif
