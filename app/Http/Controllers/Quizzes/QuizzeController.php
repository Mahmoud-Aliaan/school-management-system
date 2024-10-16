<?php

namespace App\Http\Controllers\Quizzes;

use App\Models\Quizze;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\QuizzeRepositoryInterface;

class QuizzeController extends Controller
{
   protected $quizze;
   public function __construct(QuizzeRepositoryInterface $quizze ) {
    $this->quizze = $quizze;
   }
    public function index()
    {
      return $this->quizze->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->quizze->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->quizze->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quizze $quizze)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        return $this->quizze->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->quizze->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request $request)
    {
        return $this->quizze->destroy($request);
    }
}
