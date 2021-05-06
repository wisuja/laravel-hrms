<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\EmployeeScore;
use App\Models\ScoreCategory;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class PerformanceChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $scoreCategories = ScoreCategory::all();

        $labels = [];
        $scores = [];
        foreach($scoreCategories as $category) {
            array_push($labels, $category->name);

            $employeeScores = EmployeeScore::where('score_category_id', $category->id)->whereBetween('updated_at', [Carbon::today()->subMonth(), Carbon::tomorrow()])->get();

            if(empty($employeeScores)) {
                array_push($scores, 0);
            } else {
                $totalScore = $employeeScores->reduce(function ($total, $current) {
                    return $total + $current->score;
                }, 0);
    
                $avgScore = $totalScore / count($employeeScores);
                array_push($scores, $avgScore);
            }
        }

        return Chartisan::build()
            ->labels($labels)
            ->dataset('Score', $scores);
    }
}