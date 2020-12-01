<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class ImagesBlock extends Component
{
    public $images;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($images)
    {
        $this->images = $images;
        // $this->images->load('comments.likes.authorable', 'likes.authorable', 'comments.authorable');
    }

    public function imagesCount()
    {
        return $this->images->count();
    }

    public function imgSrc($image)
    {
       return Str::startsWith($image, 'http') ? $image : asset($image);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.images-block');
    }
}
