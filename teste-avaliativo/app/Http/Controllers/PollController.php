<?php

namespace App\Http\Controllers;
use App\Models\Poll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'options' => 'required|array|min:3', // Validação do mínimo de 3 opções
        'options.*' => 'required|string|distinct',
    ]);

    $poll = Poll::create($request->only('title', 'start_date', 'end_date'));

    foreach ($request->options as $optionText) {
        $poll->options()->create(['description' => $optionText]);
    }

    return redirect()->route('polls.index')->with('success', 'Enquete criada!');
}

    public function index()
    {
        $polls = \App\Models\Poll::withCount('votes')->latest()->get();
        return view('polls.index', compact('polls'));
    }

    public function vote(Request $request, Poll $poll)
    {
        if (!$poll->isOpen()) {
            return back()->with('error', 'Esta enquete não está ativa para votação.');
        }

        $request->validate([
            'option_id' => 'required|exists:options,id'
        ]);

        // Cria o voto
        $poll->votes()->create([
            'option_id' => $request->option_id
        ]);

        return back()->with('success', 'Voto registrado com sucesso!');
    }

    public function show(Poll $poll) {
        return view('polls.show', compact('poll'));
    }

    public function create()
    {
        return view('polls.create');
    }

    public function edit(Poll $poll)
    {
        return view('polls.edit', compact('poll'));
    }
    
    public function update(Request $request, Poll $poll)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after:start_date',
        ]);

        $poll->update($request->only('title', 'start_date', 'end_date'));

        return redirect()->route('polls.index')->with('success', 'Enquete atualizada com sucesso!');
    }

    public function destroy(Poll $poll)
    {
        try {
            $poll->options()->delete();
            
            $poll->votes()->delete();

            $poll->delete();

            return redirect()->route('polls.index')->with('success', 'Enquete eliminada permanentemente.');
        } catch (\Exception $e) {
            return redirect()->route('polls.index')->with('error', 'Erro ao eliminar a enquete.');
        }
    }

}
