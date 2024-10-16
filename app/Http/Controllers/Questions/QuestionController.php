<?php

namespace App\Http\Controllers\Questions;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\QuestionRepositoryInterface;

class QuestionController extends Controller
{
    protected $Question;
   public function __construct(QuestionRepositoryInterface $Question ) {
    $this->Question = $Question;
   }
    public function index()
    {
        return $this->Question->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Question->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Question->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->Question->edit($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->Question->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
