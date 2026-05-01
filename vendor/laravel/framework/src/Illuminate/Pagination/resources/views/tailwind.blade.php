{{-- @if ($data->hasPages())
    <div class="flex flex-col items-center gap-4 mt-4">
        <!-- Mobile View -->
        <div class="flex justify-between w-full sm:hidden">
            <div>
                @if ($data->onFirstPage())
                    <button class="btn btn-sm btn-disabled" disabled>
                        {!! __('pagination.previous') !!}
                    </button>
                @else
                    <a href="{{ $data->previousPageUrl() }}" class="btn btn-sm btn-primary">
                        {!! __('pagination.previous') !!}
                    </a>
                @endif
            </div>

            <div>
                @if ($data->hasMorePages())
                    <a href="{{ $data->nextPageUrl() }}" class="btn btn-sm btn-primary">
                        {!! __('pagination.next') !!}
                    </a>
                @else
                    <button class="btn btn-sm btn-disabled" disabled>
                        {!! __('pagination.next') !!}
                    </button>
                @endif
            </div>
        </div>

        <!-- Desktop View -->
        <div class="hidden sm:flex sm:flex-col sm:items-center sm:gap-4 w-full">
            <!-- Results Info -->
            <div class="text-sm text-base-content/70">
                {!! __('Showing') !!}
                @if ($data->firstItem())
                    <span class="font-medium">{{ $data->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $data->lastItem() }}</span>
                @else
                    {{ $data->count() }}
                @endif
                {!! __('of') !!}
                <span class="font-medium">{{ $data->total() }}</span>
                {!! __('results') !!}
            </div>

            <!-- Pagination Buttons -->
            <div class="btn-group">
                <!-- Previous Button -->
                @if ($data->onFirstPage())
                    <button class="btn btn-sm btn-disabled" disabled>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                @else
                    <a href="{{ $data->previousPageUrl() }}" class="btn btn-sm">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif

                <!-- Pagination Numbers -->
                @foreach ($data->links()->elements as $element)
                    @if (is_string($element))
                        <button class="btn btn-sm btn-disabled" disabled>{{ $element }}</button>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $data->currentPage())
                                <button class="btn btn-sm btn-active" disabled>{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="btn btn-sm">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                <!-- Next Button -->
                @if ($data->hasMorePages())
                    <a href="{{ $data->nextPageUrl() }}" class="btn btn-sm">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @else
                    <button class="btn btn-sm btn-disabled" disabled>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                @endif
            </div>
        </div>
    </div>
@endif --}}
