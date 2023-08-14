<?php

namespace App\Http\Controllers\User;

use App\Models\Survey;
use App\Models\Attempt;
use App\Models\Category;
use App\Services\BreadcrumbService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class SurveyController extends Controller
{
    /**
     * Display the user dashboard.
     */
    public function index($id, BreadcrumbService $breadcrumbService): View
    {
        $attempt = Attempt::where('user_id', auth()->id())->where('survey_id', $id)->latest()->first();
        $breadcrumbs = $breadcrumbService->generateBreadcrumbs();
        return view('users.surveys.show', [
            'survey' => Survey::where('id', $id)->first(),
            'breadcrumbs' => $breadcrumbs,
            'attempt' => $attempt,
        ]);
    }

    public function submitAttempt($id): RedirectResponse
    {
        $attempt = Attempt::where('user_id', auth()->id())->where('survey_id', $id)->latest()->first();
        $attempt->submitted_at = now();
        $attempt->save();
        return redirect()->route('users.surveys.show', [
            'id' => $id,
        ]);
    }

    public function categoryShow($survey_id, $category_id, BreadcrumbService $breadcrumbService): View
    {
        $attempt = Attempt::where('user_id', auth()->id())->where('survey_id', $survey_id)->latest()->first();
        $surveyQuestionData = $attempt->survey_data;
        $breadcrumbs = $breadcrumbService->generateBreadcrumbs();
        return view('users.surveys.categories.show', [
            'survey' => Survey::where('id', $survey_id)->first(),
            'attempt' => $attempt,
            'category' => Category::where('id', $category_id)->first(),
            'breadcrumbs' => $breadcrumbs,
            'surveyQuestionData' => $surveyQuestionData[$category_id - 1],
        ]);
    }

    public function takeSurvey($id): RedirectResponse
    {
        // check if user has already attempted this survey
        $attempt = Attempt::where('user_id', auth()->id())->where('survey_id', $id)->first();
        if ($attempt) {
            return redirect()->route('users.surveys.show', [
                'id' => $id,
            ]);
        } else {
            $surveyData = Category::where('survey_id', $id)->with([
                'randomQuestions:id,category_id,content',
                'randomQuestions.randomChoices:id,question_id,content'
            ])->select(['id', 'name', 'survey_id'])->get()->toArray();
            $attempt = new Attempt();
            $attempt->user_id = auth()->id();
            $attempt->survey_id = $id;
            $attempt->survey_data = $surveyData;
            $attempt->save();
        }
        return redirect()->route('users.surveys.show', [
            'id' => $id
        ]);
    }
}
