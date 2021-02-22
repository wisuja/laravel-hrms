<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScoreCategoryRequest;
use App\Models\Log;
use App\Models\ScoreCategory;
use Illuminate\Http\Request;

class ScoreCategoriesController extends Controller
{
    private $scoreCategories;

    public function __construct()
    {
        $this->middleware('auth');

        $this->scoreCategories = resolve(ScoreCategory::class);    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scoreCategories = $this->scoreCategories->paginate();
        return view('pages.score-categories', compact('scoreCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.score-categories_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScoreCategoryRequest $request)
    {
        ScoreCategory::create([
            'name' => $request->input('name')
        ]);

        Log::create([
            'description' => auth()->user()->employee->name . " created a score category named '" . $request->input('name') . "'"
        ]);

        return redirect()->route('score-categories')->with('status', 'Successfully created a score category.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScoreCategory  $scoreCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ScoreCategory $scoreCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScoreCategory  $scoreCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ScoreCategory $scoreCategory)
    {
        return view('pages.score-categories_edit', compact('scoreCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScoreCategory  $scoreCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScoreCategory $scoreCategory)
    {
        ScoreCategory::whereId($scoreCategory->id)
            ->update([
            'name' => $request->input('name')
        ]);

        Log::create([
            'description' => auth()->user()->employee->name . " updated a score category named '" . $scoreCategory->name . "' to '" . $request->input('name') . "'"
        ]);

        return redirect()->route('score-categories')->with('status', 'Successfully updated score category.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScoreCategory  $scoreCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScoreCategory $scoreCategory)
    {
        ScoreCategory::whereId($scoreCategory->id)->delete();

        Log::create([
            'description' => auth()->user()->employee->name . " deleted a score category named '" . $scoreCategory->name . "'"
        ]);

        return redirect()->route('score-categories')->with('status', 'Successfully deleted score category.');
    }

    public function print ()
    {
        $scoreCategories = $this->scoreCategories->all();
        return view('pages.score-categories_print', compact('scoreCategories'));
    }
}
