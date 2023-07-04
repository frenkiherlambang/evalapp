<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $survey->name }}
        </h2>

    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8 px-4">
            <x-breadcrumb :breadcrumbs="$breadcrumbs" />
            {{-- Survey Summary --}}
            <div class="rounded-lg px-4 py-2 bg-white shadow mb-4">
                <h2 class="font-bold">{{ $survey->name }}</h2>
                <p class="text-sm text-gray-500">{{ $survey->description }}</p>
            </div>
            <div class="font-bold mb-2">Categories</div>
            <ul role="list" class="  flex gap-y-3 flex-col">
                @foreach ($survey->categories as $category)
                    <a
                        href="{{ route('users.surveys.categories.show', ['survey_id' => $survey->id, 'category_id' => $category->id]) }}">
                        <li 
                            class="flex border-2 hover:border-2 border-transparent hover:border-indigo-500  bg-white rounded-lg shadow px-4 items-center justify-between gap-x-6 gap-y-4 py-2 ">
                            <div class="flex space-x-2 items-center">
                            <div class="rounded-full flex items-center justify-center w-8 h-8 min-w-fit bg-indigo-500">
                                <div class="text-white font-semibold text-sm">{{ $loop->index + 1 }}</div>
                            </div>
                            <div>
                                <p class="font-semibold text-lg leading-6 text-gray-900">
                                    {{ $category->name }}
                                </p>
                            </div>
                            </div>
                            <dl class="flex justify-between ">

                                <div class="flex gap-x-2.5">
                                    <dt>
                                        <span class="sr-only">Total Questions</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>


                                    </dt>
                                    <dd class="text-sm leading-6 text-gray-900">
                                        {{ $category->questions->count() }} Questions
                                    </dd>
                                </div>
                            </dl>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
</x-user-layout>
