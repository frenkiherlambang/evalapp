<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $survey->name }}
        </h2>

    </x-slot>
    <div class="py-4 w-full max-w-7xl mx-auto ">
        <x-breadcrumb :breadcrumbs="$breadcrumbs" />
        <div class="rounded-lg px-4 py-2 bg-white shadow mb-4">
            <h2 class="font-bold">{{ $survey->name }}</h2>
            <p class="text-sm text-gray-600">{{ $survey->description }}</p>
            <p class="text-gray-600 text-sm rounded-full w-fit mt-4 border px-3 py-1">Percobaan ke:
                {{ auth()->user()->attempts->where('survey_id', $survey->id)->count() }}</p>
        </div>

        <div class="max-w-7xl flex w-full gap-4 mx-auto ">
            {{-- Survey Summary --}}
            <div class="flex flex-col w-1/2">


                <div class="font-bold mb-2">Categories</div>
                <ul role="list" class="  flex gap-y-3 flex-col">
                    @foreach ($survey->categories as $category)
                        <a class="hover:border-indigo-500  transition-all border-transparent border-2 rounded-lg"
                            href="{{ route('users.surveys.categories.show', ['survey_id' => $survey->id, 'category_id' => $category->id]) }}">
                            <li
                                class="flex border-2 hover:border-2 border-transparent   bg-white rounded-lg shadow px-4 items-center justify-between gap-x-6 gap-y-4 py-2 ">
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
                                        <dd
                                            class="text-sm leading-6 flex gap-4 justify-center items-center text-gray-900">
                                            <div class="flex items-center gap-1">
                                                {{ $category->userAnswers($survey->id)->where('attempt_id', $attempt->id)->sum('points') }}
                                                {{-- <svg width="24" height="24" class="w-4 h-4 stroke-gray-500" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="currentColor" d="m12 17l1.56-3.42L17 12l-3.44-1.56L12 7l-1.57 3.44L7 12l3.43 1.58L12 17M8.17 2.76A10.1 10.1 0 0 1 12 2c1.31 0 2.61.26 3.83.76c1.21.5 2.31 1.24 3.24 2.17c.93.93 1.67 2.03 2.17 3.24c.5 1.22.76 2.52.76 3.83c0 2.65-1.05 5.2-2.93 7.07A9.974 9.974 0 0 1 12 22a10.1 10.1 0 0 1-3.83-.76a9.975 9.975 0 0 1-3.24-2.17A9.974 9.974 0 0 1 2 12c0-2.65 1.05-5.2 2.93-7.07c.93-.93 2.03-1.67 3.24-2.17m-1.83 14.9C7.84 19.16 9.88 20 12 20s4.16-.84 5.66-2.34S20 14.12 20 12s-.84-4.16-2.34-5.66A8.008 8.008 0 0 0 12 4c-2.12 0-4.16.84-5.66 2.34A8.008 8.008 0 0 0 4 12c0 2.12.84 4.16 2.34 5.66Z"/>
                                                </svg> --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-4 h-4 stroke-gray-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
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
                            {{-- @if ($category->categoryFeedbacks()->where('user_id', auth()->user()->id)->first())
                                <div class=" rounded-b-lg shadow py-2 px-4 text-xs  w-full" @style([
                                    'background-color:' .
                                    $category->categoryFeedbacks()->where('user_id', auth()->user()->id)->first()->color .
                                    '',
                                    'color:' .
                                    $category->categoryFeedbacks()->where('user_id', auth()->user()->id)->first()->fontColor .
                                    '',
                                ])>
                                    {!! $category->categoryFeedbacks()->where('user_id', auth()->user()->id)->first()->text !!}
                                </div>
                            @endif --}}

                        </a>
                    @endforeach
                </ul>
            </div>
            <div class=" flex flex-col gap-2 w-1/2 text-gray-600">
                <div class="font-bold mb-2">Feedback</div>
                @if (!$attempt->submitted_at)
                    <div class="p-4 bg-white rounded-lg text-center py-8">

                        @if ($survey->questions->count() - $attempt->answers->count() > 0)
                            Anda harus menyelesaikan survey ini terlebih dahulu untuk melihat feedback

                            <button disabled
                                class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mt-4 disabled:bg-gray-500">
                                {{ $survey->questions->count() - $attempt->answers->count() }} Pertanyaan menunggu
                                jawabanmu
                            </button>
                        @else
                            <form action="{{ route('users.surveys.attempt.submit', $attempt->id) }}" method="POST">
                                @csrf
                                <button
                                    class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mt-4 disabled:bg-gray-500">
                                    Selesaikan Survey
                                </button>
                            </form>
                        @endif
                    </div>
                @else
                    @foreach ($survey->categories as $category)
                        <div class="bg-white shadow  p-4 rounded-lg gap-2">
                            Hasil Kategori:
                            {{ $category->name }}
                            @if ($category->categoryFeedbacks()->where('user_id', auth()->user()->id)->first())
                                <div class=" rounded-lg py-2 px-4 text-sm  w-full" @style([
                                    'background-color:' .
                                    $category->categoryFeedbacks()->where('user_id', auth()->user()->id)->first()->color .
                                    '',
                                    'color:' .
                                    $category->categoryFeedbacks()->where('user_id', auth()->user()->id)->first()->fontColor .
                                    '',
                                ])>
                                    {!! $category->categoryFeedbacks()->where('user_id', auth()->user()->id)->first()->text !!}
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </div>
</x-user-layout>
