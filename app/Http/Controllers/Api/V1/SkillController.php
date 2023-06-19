<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Http\Resources\V1\SkillCollection;
use App\Http\Resources\V1\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new SkillCollection(Skill::paginate(1));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillRequest $request)
    {
        Skill::create($request->validated());
        return response()->json("Skill Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillRequest $request, Skill $skill)
    {
        $skill->update($request->validated());
        return response()->json("Skill Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json("Skill Deleted");
    }
}
