<?php

namespace App\Livewire;

use App\Models\Feedback;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FeedbackForm extends Component
{
    #[Validate('required|min:2|max:80')]
    public $name = '';

    #[Validate('nullable|email|max:120')]
    public $email = '';

    #[Validate('required|in:sivusto,majoitus,ajankohtaista')]
    public $category = 'sivusto';

    #[Validate('required|min:10|max:2000')]
    public $message = '';

    public $sent = false;

    public function save()
    {
        $data = $this->validate();
        Feedback::create($data);

        $this->reset(['name', 'email', 'message']);
        $this->category = 'sivusto';
        $this->sent = true;
    }

    public function render()
    {
        return view('livewire.feedback-form');
    }
}