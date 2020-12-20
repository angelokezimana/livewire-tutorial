<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Collaborator;
use Illuminate\Validation\Rule;

class Collaborators extends Component
{
    public $collaborator_id;
    public $full_name;
    public $username;
    public $email;
    public $position_held;

    public $updateMode = false;

    protected $rules;

    public function hydrate()
    {
        $this->rules = [
            'full_name' => ['required', 'min:6', 'max:100'],
            'username' => ['required', 'min:4', 'max:50', Rule::unique('collaborators')->ignore($this->collaborator_id)],
            'email' => ['nullable', 'email', Rule::unique('collaborators')->ignore($this->collaborator_id)],
            'position_held' => ['nullable'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit(Collaborator $collaborator)
    {
        $this->updateMode = true;
        $this->resetValidation();

        $this->collaborator_id = $collaborator->id;
        $this->full_name = $collaborator->full_name;
        $this->username = $collaborator->username;
        $this->email = $collaborator->email;
        $this->position_held = $collaborator->position_held;
    }

    public function submit()
    {
        $this->validate();

        $collaborator = $this->updateMode
            ? (Collaborator::find($this->collaborator_id))
            : (new Collaborator());

        $collaborator->full_name = $this->full_name;
        $collaborator->username = $this->username;
        $collaborator->email = $this->email;
        $collaborator->position_held = $this->position_held;

        $collaborator->save();

        if ($this->updateMode) {
            session()->flash('message', 'Collaborator successfully updated.');
        } else {
            session()->flash('message', 'Collaborator successfully created.');
        }

        $this->clear();
    }

    public function delete(Collaborator $collaborator)
    {
        $collaborator->delete();
        session()->flash('message', 'Collaborator deleted successfully.');

        $this->clear();
    }

    public function render()
    {
        return view('livewire.collaborators', [
            'collaborators' => Collaborator::all()
        ]);
    }

    public function clear()
    {
        $this->collaborator_id = '';
        $this->full_name = '';
        $this->username = '';
        $this->email = '';
        $this->position_held = '';

        $this->updateMode = false;
        $this->resetValidation();
    }
}
