<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-breadcrumb :breadcrumbs="$breadcrumbs" />
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900"> --}}
                    @foreach ($surveys as $survey)
                       
                        <div class="bg-white shadow sm:rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-base font-semibold leading-6 text-gray-900">{{ $survey->name }}</h3>
                                <div class="mt-2 max-w-xl text-sm text-gray-500">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatibus
                                        corrupti atque repudiandae nam.</p>
                                </div>
                                <div class="mt-5">
                                    <a href="{{ route('users.surveys.show', $survey->id) }}" 
                                        class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                    Ambil survey
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                {{-- </div>
            </div> --}}
        </div>
    </div>
</x-user-layout>
