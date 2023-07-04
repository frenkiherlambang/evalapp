<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">

        <div class="max-w-7xl px-2 mx-auto sm:px-6 lg:px-8">
            <x-breadcrumb :breadcrumbs="$breadcrumbs" />
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900"> --}}
            @foreach ($surveys as $survey)
                <div class="bg-white shadow  rounded-lg">
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
                            <div class="text-sm text-slate-400  flex space-x-1 items-center justify-center " title="Percobaan ke {{ $survey->userAttempts->count() }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                </svg>
                                <div class="text-sm">
                                   {{ $survey->userAttempts->count() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- </div>
            </div> --}}
        </div>
    </div>
</x-user-layout>
