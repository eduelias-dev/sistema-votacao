<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Poll;
use App\Models\Option;

class PollView extends Component
{
    public Poll $poll;
    public $selectedOption;

    protected $listeners = ['pollUpdated' => '$refresh'];

    public function vote()
    {
        if (!$this->poll->isOpen()) {
            session()->flash('error', 'Votação encerrada.');
            return;
        }

        if ($this->selectedOption) {
            $this->poll->votes()->create([
                'option_id' => $this->selectedOption
            ]);

            session()->flash('message', 'Voto registrado com sucesso!');
        }
    }

    public function render()
    {
        return view('livewire.poll-view', [
            'options' => $this->poll->options()->withCount('votes')->get()
        ]);
    }
}