<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Katagori:
            {{ $survey->name }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-breadcrumb :breadcrumbs="$breadcrumbs" />

            <div class="bg-white shadow sm:rounded-lg p-4">
                @livewire('category-widget', [
                        'surveyQuestionData' => $surveyQuestionData,
                        'category' => $category,
                        'attempt' => $attempt,
                        ])
            </div>

        </div>
    </div>
</x-user-layout>
