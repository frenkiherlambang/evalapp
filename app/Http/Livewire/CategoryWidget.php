<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryWidget extends Component
{
    public $surveyQuestionData = [];
    public $questions = [];
    public $currentQuestion;
    public $currentQuestionId = 0;

    protected $queryString = [
        'currentQuestionId' => ['except' => 0],
    ];
    

    public function mount($surveyQuestionData)
    {
        $this->surveyQuestionData = $surveyQuestionData;
    }
    public function render()
    {
        $this->currentQuestion = $this->surveyQuestionData['random_questions'][$this->currentQuestionId];
        return view('livewire.category-widget', [
            'surveyQuestionData' => $this->surveyQuestionData,
            'currentQuestion' => $this->currentQuestion,
        ]);
    }
}
