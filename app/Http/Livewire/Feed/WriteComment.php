<?php

namespace App\Http\Livewire\Feed;

use Livewire\Component;

class WriteComment extends Component
{
    public $feedItem;
    public $comment;
    public $text;

    public function mount()
    {
        $this->text = $this->getText();
    }

    protected function getText()
    {
        if (isSet($this->comment)){
           return $this->comment->text;
        }
    }

    public function saveComment()
    {
        if (isSet($this->comment)){
            $this->comment->text = $this->text;
            $this->comment->save();
            $this->emitUp('commentSaved');
        } else {
            $this->comment = $this->feedItem->comments()->create(['text' => $this->text]);
            auth()->user()->comments()->save($this->comment);
            $this->text = '';
            $this->comment = null;
            $this->emitUp('commentAdded');
        }
    }

    public function cancelEdit()
    {
        $this->emitUp('cancelEdit');
    }

    public function render()
    {
        return view('livewire.feed.write-comment');
    }
}
