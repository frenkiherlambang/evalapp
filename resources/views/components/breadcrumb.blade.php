<div>
    <nav class="flex pb-4" aria-label="Breadcrumb">
        <ol role="list" class="flex space-x-4 rounded-md bg-white px-6 shadow">
            @foreach ($breadcrumbs as $breadcrumb)
                <li class="flex">
                    <div class="flex items-center">
                        <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none"
                            fill="currentColor" aria-hidden="true">
                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                        </svg>
                        @if ($loop->last)
                            <p class="ml-4 text-sm font-medium text-gray-400">
                                @if (str_contains($breadcrumb['url'], 'category'))
                                    Kategori:
                                @endif
                                {{ $breadcrumb['name'] }}
                            </p>
                        @else
                            <a href="{{ $breadcrumb['url'] }}"
                                class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-900">
                                @if (str_contains($breadcrumb['url'], 'category'))
                                    Kategori:
                                @endif
                                {{ $breadcrumb['name'] }}
                            </a>
                        @endif
                    </div>
                </li>
            @endforeach
        </ol>
    </nav>
</div>
