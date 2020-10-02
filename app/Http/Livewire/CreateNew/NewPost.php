<?php

namespace App\Http\Livewire\CreateNew;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class NewPost extends Component
{
    use WithFileUploads;

    public $post;
    public $photo;
    public $link;
    public $text;
    public $create= '';

    protected $listeners = ['createNewPost' => 'createPost'];

    // public function mount()
    // {
    //     $this->post = $this->createPost();
    // }

    public function createPost()
    {
            $this->create = 'post';
            $this->post = User::find(auth()->user()->id)->posts()->create();
    }

    public function savePost()
    {
        $this->post->text = $this->text;
        $this->post->save();
        $this->post->feed()->create(['authorable_id' => auth()->user()->id, 'authorable_type' => User::class]);
        $this->create = 0;
        $this->emitUp('postCreated');
    }


    public function savePhoto()
    {
        $this->validate([
            'photo' => 'image|max:2048', // 2MB Max
        ]);
        $this->link = $this->photo->store('summernote');
        $img = Image::make($this->link);
        if ($img->width() > 1024){
            $img->resize(1024, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save();
        }
        $this->emit('photoSaved', $this->link);
    }

    public function deletePhoto($name)
    {
        Storage::delete($name);
    }

    public function render()
    {
        return view('livewire.create-new.new-post');
    }
}
