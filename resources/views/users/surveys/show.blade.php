<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $survey->name }}
        </h2>

    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8 px-4">
           <x-breadcrumb :breadcrumbs="$breadcrumbs" />



            <div class="overflow-hidden bg-white shadow sm:rounded-md">
                <ul role="list" class="divide-y divide-gray-200">
                    <ul role="list" class="divide-y divide-gray-100 px-4">
                        @foreach ($survey->categories as $category)
                            <li class="flex flex-wrap items-center justify-between gap-x-6 gap-y-4 py-5 sm:flex-nowrap">
                                <div>
                                    <p class="font-semibold text-lg leading-6 text-gray-900">
                                        <a href="{{ route('users.surveys.categories.show', ['survey_id' => $survey->id, 'category_id' => $category->id]) }}"
                                            class="hover:underline"> {{ $category->name }}</a>
                                    </p>

                                </div>
                                <dl class="flex w-full flex-none justify-between gap-x-8 sm:w-auto">

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
                        @endforeach

                    </ul>

                    <!-- More items... -->
                </ul>
            </div>










        </div>
    </div>
</x-user-layout>
