<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">

        <div class="max-w-7xl px-2 mx-auto sm:px-6 lg:px-8">
            <x-breadcrumb :breadcrumbs="$breadcrumbs" />
            <div class="flex gap-4 flex-wrap md:flex-nowrap">
                <div class="md:w-1/3 w-full">
                    <div class="bg-white flex flex-col gap-4  shadow px-4 py-5  rounded-lg">
                        <div class="flex gap-4">
                            <form id="changeAvatar" method="POST" action="{{ route('users.avatar.update') }}"
                                enctype="multipart/form-data">

                                <div class="flex flex-col items-center justify-center">
                                    <div class="relative group">

                                        <img id="avatar-preview"
                                            src=" {{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . auth()->user()->name }}"
                                            class="rounded-full w-16 h-16 mx-auto object-cover" alt="">
                                        <div
                                            class="bg-slate-700 bg-opacity-90 hidden group-hover:flex absolute justify-center rounded-b-full w-full h-1/2 left-1/2 -translate-x-1/2 bottom-0 mx-auto">

                                            <label for="choose-avatar" class="text-white text-xs">
                                                Ubah


                                                @csrf
                                                <input id="choose-avatar" type="file" name="avatar" class="hidden"
                                                    accept="image/*">


                                            </label>
                                        </div>

                                    </div>
                                    {{-- <button type="submit" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mt-1 text-slate-500"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                        <path d="M7 9l5 -5l5 5"></path>
                                        <path d="M12 4l0 12"></path>
                                    </svg>
                                </button> --}}
                                </div>

                            </form>
                            <div class="flex flex-col items-left justify-center">
                                <div class="font-bold">
                                    {{ auth()->user()->name }}
                                </div>
                                <p class="text-gray-500">
                                    {{ auth()->user()->email }}

                                </p>
                            </div>
                        </div>
                        @error('avatar')
                            <div class="text-red-500 text-xs">{{ $message }}</div>
                        @enderror
                        <div class="flex items-center justify-around mt-4">
                            <div class="text-center bg-gray-100 rounded-xl py-2 px-4">
                                <div class="font-bold text-3xl">{{ auth()->user()->attempts->count() }}</div>
                                <div>Survey</div>
                            </div>
                            <div class="text-center bg-gray-100 rounded-xl py-2 px-4">
                                <div class="font-bold text-3xl">{{ auth()->user()->answers->count() }}</div>
                                <div>Jawaban</div>
                            </div>
                            <div class="text-center bg-gray-100 rounded-xl py-2 px-4">
                                <div class="font-bold text-3xl">{{ auth()->user()->answers->sum('points') }}</div>
                                <div>Points</div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="md:w-2/3 w-full">
                    @foreach ($surveys as $survey)
                        <div class="bg-white shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-base font-semibold leading-6 text-gray-900">{{ $survey->name }}</h3>
                                <div class="mt-2 max-w-xl text-sm text-gray-500">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatibus
                                        corrupti atque repudiandae nam.</p>
                                </div>
                                <div class="flex items-center justify-left space-x-4 mt-5">
                                    <form method="POST" action="{{ route('users.surveys.show', $survey->id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                            @if ($survey->userAttempts->count() > 0)
                                                Lanjutkan survey
                                            @else
                                                Ambil survey
                                            @endif
                                        </button>
                                    </form>
                                    <div class="text-sm text-slate-400  flex gap-4 items-center justify-center "
                                        title="Percobaan ke {{ $survey->userAttempts->count() }}">
                                        <div class="flex items-center justify-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                            </svg>
                                            <div class="text-sm">
                                                {{ $survey->userAttempts->count() }}
                                            </div>

                                        </div>


                                    </div>
                                    <div class="w-full">
                                        <span id="ProgressLabel" class="sr-only">Progress</span>

                                        <span role="progressbar" aria-labelledby="ProgressLabel"
                                            aria-valuenow="50" class="block rounded-full bg-gray-200">
                                            <span
                                                class="block h-4 rounded-full bg-indigo-600 text-center text-[10px]/4"
                                                style="width: {{(auth()->user()->answers->where('survey_id', $survey->id)->count() /$survey->questions->count() *100)}}%">
                                                <span class="font-bold text-white"> {{ (auth()->user()->answers->where('survey_id', $survey->id)->count() /$survey->questions->count()) *100 }}% </span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
    @push('scripts')
        <script>
            const chooseFile = document.getElementById("choose-avatar");
            const imgPreview = document.getElementById("avatar-preview");
            chooseFile.addEventListener("change", function() {
                getImgData();
            });

            function getImgData() {
                const file = chooseFile.files[0];
                if (file) {
                    console.log(file)
                    const reader = new FileReader();
                    reader.onload = function() {
                        imgPreview.src = reader.result;
                        console.log(reader.result)
                    };
                    reader.readAsDataURL(file);
                    submitForm();
                }


            }

            function submitForm() {
                // add delay to show preview
                setTimeout(function() {
                    document.getElementById("changeAvatar").submit();
                }, 1000);
            }
        </script>
    @endpush
</x-user-layout>
