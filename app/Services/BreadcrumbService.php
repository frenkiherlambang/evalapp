<?php
namespace App\Services;

use App\Models\Survey;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

class BreadcrumbService
{
    public function generateBreadcrumbs()
    {
        // get the current route name
        $routeName = Route::currentRouteName();
        // dd($routeName);
        switch ($routeName) {
            case 'users.dashboard':
                return [
                    [
                        'name' => 'Dashboard',
                        'url' => route('users.dashboard'),
                    ],
                ];
                break;
            case 'users.surveys.show':
                return $this->surveysShow();
                break;
            case 'users.surveys.categories.show':
                return $this->surveysCategoriesShow();
                break;
            default:
                return [];
                break;
        }
        
    }

    private function surveysShow()
    {

        // get the current route parameters
        $surveyId = request()->route('id');
        $survey = Survey::where('id', $surveyId)->first();
        return [
            [
                'name' => 'Dashboard',
                'url' => route('users.dashboard'),
            ],
            [
                'name' => $survey->name,
                'url' => route('users.surveys.show', $survey->id),
            ],
        ];
    }

    private function surveysCategoriesShow()
    {
        $surveyId = request()->route('survey_id');
        $categoryId = request()->route('category_id');
        $survey = Survey::where('id', $surveyId)->first();
        $category = Category::where('id', $categoryId)->first();
        return [
            [
                'name' => 'Dashboard',
                'url' => route('users.dashboard'),
            ],
            [
                'name' => $survey->name,
                'url' => route('users.surveys.show', $survey->id),
            ],
            [
                'name' => $category->name,
                'url' => route('users.surveys.categories.show', [$survey->id, $category->id]),
            ],
        ];
    }
}