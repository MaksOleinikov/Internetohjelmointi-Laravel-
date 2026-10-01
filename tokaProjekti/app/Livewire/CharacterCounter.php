<?php

namespace App\Livewire;

use Livewire\Component;

class CharacterCounter extends Component
{
    public $text = '';
    public $maxLength = 500;


    public function getCharacterCountProperty()
    {
        return strlen($this->text);
    }

    public function getRemainingProperty()
    {
        return $this->maxLength - $this->characterCount;
    }

    public function getIsOverLimitProperty()
    {
        return $this->characterCount > $this->maxLength;
    }

    public function render()
    {
        return view('livewire.character-counter');
    }
}
