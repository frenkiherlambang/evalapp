<div>

    <div class="px-4 py-5 sm:p-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900">
            {{ $currentQuestion['content'] }}
        </h3>
        <div class="my-2 max-w-xl">
            {{ $currentQuestion['content'] }}
        </div>
        <div class="relative -space-y-px rounded-md bg-white">
            <!-- Checked: "z-10 border-indigo-200 bg-indigo-50", Not Checked: "border-gray-200" -->
            @foreach ($currentQuestion['random_choices'] as $choice)
                <label @class([
                    'relative flex cursor-pointer flex-col border p-4 focus:outline-none md:grid md:grid-cols-3 md:pl-4 md:pr-6',
                    'rounded-tl-md rounded-tr-md' => $loop->first,
                    'rounded-bl-md rounded-br-md' => $loop->last,
                ])>
                    <span class="flex items-center">
                        <span class="mr-3 text-gray-400">
                            {{ \App\Models\Choice::find($choice['id'])->is_correct ? 'Benar' : 'Salah' }}
                        </span>
                        <input wire:model="answers.{{$choice['question_id']}}" type="radio" value="{{ $choice['id'] }}"
                            class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-600"
                            aria-labelledby="pricing-plans-0-label"
                            aria-describedby="pricing-plans-0-description-0 pricing-plans-0-description-1">
                        <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                        <span  class="ml-3 font-medium">
                            {{ $choice['content'] }}
                        </span>

                    </span>

                </label>
            @endforeach
        </div>
        <ol class="flex flex-wrap justify-center gap-1 text-xs mt-4 font-medium">
            <li>
                <a wire:click="previousQuestion"
                    class="inline-flex h-8 w-8 items-center justify-center rounded border border-gray-300 bg-white text-gray-900 rtl:rotate-180">
                    <span class="sr-only">Prev Page</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
            @foreach ($surveyQuestionData['random_questions'] as $question)

                <li>
                    <a  wire:click="changeQuestion({{ $loop->index }})" wire:key="{{ $loop->index }}"
                        @class([
                            'block h-8 w-8 rounded border-blue-600 bg-blue-600 text-center leading-8 text-white',
                            'block h-8 w-8 rounded border-gray-300 border bg-white text-center leading-8 text-slate-900' => $loop->index != $currentQuestionId,
                        ])
                        >
                        {{ $loop->index + 1 }}
                    </a>
                </li>


                @endforeach
                <li>
                    <a wire:click="nextQuestion"
                        class="inline-flex h-8 w-8 items-center justify-center rounded border border-gray-300 bg-white text-gray-900 rtl:rotate-180">
                        <span class="sr-only">Next Page</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
        </ol>
        <div class="relative -space-y-px rounded-md bg-white">
        </div>
    </div>
    {{-- @endforeach --}}

</div>
