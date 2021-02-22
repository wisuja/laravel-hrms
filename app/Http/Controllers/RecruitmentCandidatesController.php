<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecruitmentCandidateRequest;
use App\Models\Log;
use App\Models\Recruitment;
use App\Models\RecruitmentCandidate;
use Illuminate\Http\Request;

class RecruitmentCandidatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecruitmentCandidateRequest $request)
    {
        RecruitmentCandidate::create([
            'recruitment_id' => $request->input('recruitment_id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
            'address' => $request->input('address'),
            'photo' => $request->file('photo')->store('photos', 'public'),
            'cv' => $request->file('cv')->store('cvs', 'public')
        ]);

        $name = Recruitment::whereId($request->input('recruitment_id'))->first()->position->name;

        Log::create([
            'description' => $request->input('name') . " applied for position named '" . $name . "'"
        ]);

        return back()->with('status', 'Successfully apply for this job.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecruitmentCandidate  $recruitmentCandidate
     * @return \Illuminate\Http\Response
     */
    public function show(RecruitmentCandidate $recruitmentCandidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecruitmentCandidate  $recruitmentCandidate
     * @return \Illuminate\Http\Response
     */
    public function edit(RecruitmentCandidate $recruitmentCandidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecruitmentCandidate  $recruitmentCandidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecruitmentCandidate $recruitmentCandidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecruitmentCandidate  $recruitmentCandidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecruitmentCandidate $recruitmentCandidate)
    {
        //
    }
}
