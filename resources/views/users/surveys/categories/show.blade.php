<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $survey->name }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-breadcrumb :breadcrumbs="$breadcrumbs" />


            <div class="bg-white shadow sm:rounded-lg p-4">
                @foreach ($questions as $question)
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-base font-semibold leading-6 text-gray-900">{{ $question->id }}</h3>
                        <div class="my-2 max-w-xl">
                            <p>{{ $question->content }}</p>
                        </div>
                        <div class="relative -space-y-px rounded-md bg-white">
                            <!-- Checked: "z-10 border-indigo-200 bg-indigo-50", Not Checked: "border-gray-200" -->
                            @foreach($question->choices()->inRandomOrder()->get() as $choice)
                            <label
                            @class([
                                'relative flex cursor-pointer flex-col border p-4 focus:outline-none md:grid md:grid-cols-3 md:pl-4 md:pr-6', 
                                'rounded-tl-md rounded-tr-md' => $loop->first,
                                'rounded-bl-md rounded-br-md' => $loop->last,
                                ])>
                                <span class="flex items-center">
                                    <input type="radio" name="pricing-plan" value="Startup"
                                        class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-600"
                                        aria-labelledby="pricing-plans-0-label"
                                        aria-describedby="pricing-plans-0-description-0 pricing-plans-0-description-1">
                                    <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                    <span id="pricing-plans-0-label" class="ml-3 font-medium">
                                        {{ $choice->content }}
                                    </span>
                                </span>
                            </label>
                            @endforeach

                        </div>

                    </div>
                @endforeach
                {{ $questions->links('pagination::tailwind') }}
            </div>







        </div>
    </div>
</x-user-layout>
