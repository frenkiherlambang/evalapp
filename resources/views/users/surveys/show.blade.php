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
                    <a class="hover:border-indigo-500  transition-all border-transparent border-2 rounded-lg"
                        href="{{ route('users.surveys.categories.show', ['survey_id' => $survey->id, 'category_id' => $category->id]) }}">
                        <li
                            class="flex border-2 hover:border-2 border-transparent   bg-white rounded-t-lg shadow px-4 items-center justify-between gap-x-6 gap-y-4 py-2 ">
                            <div class="flex space-x-2 items-center">
                                <div
                                    class="rounded-full flex items-center justify-center w-8 h-8 min-w-fit bg-indigo-500">
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



                                    </dt>
                                    <dd class="text-sm leading-6 flex gap-4 justify-center items-center text-gray-900">
                                        <div class="flex items-center gap-1">
                                            {{ $category->userAnswers($survey->id)->sum('is_correct') }}
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 stroke-gray-500"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M7 12l5 5l10 -10"></path>
                                                <path d="M2 12l5 5m5 -5l5 -5"></path>
                                            </svg>

                                        </div>
                                        <div class="flex items-center gap-1">
                                            {{ $category->userAnswers($survey->id)->count() }}
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 stroke-gray-500"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M9 11l3 3l8 -8"></path>
                                                <path
                                                    d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            {{ $category->questions->count() }}
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 stroke-gray-500"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M19.875 6.27c.7 .398 1.13 1.143 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z">
                                                </path>
                                                <path d="M12 16v.01"></path>
                                                <path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483">
                                                </path>
                                            </svg>
                                        </div>
                                    </dd>
                                </div>
                            </dl>

                        </li>
                        @if ($category->categoryFeedbacks()->where('user_id', auth()->user()->id)->first())
                            <div class=" rounded-b-lg shadow py-2 px-4 text-xs  w-full" @style([
                                'background-color:' .
                                $category->categoryFeedbacks()->where('user_id', auth()->user()->id)->first()->color .
                                '',
                                'color:' .
                                $category->categoryFeedbacks()->where('user_id', auth()->user()->id)->first()->fontColor .
                                '',
                            ])>
                                {{ $category->categoryFeedbacks()->where('user_id', auth()->user()->id)->first()->text }}
                            </div>
                        @endif

                    </a>
                @endforeach
            </ul>
        </div>
    </div>
</x-user-layout>
