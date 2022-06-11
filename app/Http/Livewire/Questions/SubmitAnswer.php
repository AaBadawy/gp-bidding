<?php

namespace App\Http\Livewire\Questions;

use App\Entities\Question;
use Livewire\Component;

class SubmitAnswer extends Component
{
    public Question $question;

    public string $answer = '';


    protected function rules():array
    {
        return [
            "answer" => ["required","string"],
        ];
    }

    public function render()
    {
        return view('livewire.questions.submit-answer');
    }

    public function submitAnswer()
    {
        $this->validate();

        $this->question
            ->update(['answer' => $this->answer,'answered_at' => now()]);
    }
}
