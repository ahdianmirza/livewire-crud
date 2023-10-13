<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;

class TodoList extends Component
{
    #[Rule('required|min:3|max:50')]
    public $name;

    public $search;

    public function create() {
        // validate
        $validated = $this->validateOnly('name');

        // create the todo
        Todo::create($validated);

        // clear the input
        $this->reset('name');

        // send flash message
        session()->flash('success', 'Created.');
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}