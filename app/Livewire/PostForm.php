<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\Tag;

class PostForm extends Component
{
    public $title;
    public $content;
    public $tags;
    public $post;

    public $selectedTags = [];

    protected $rules = [
        'title' => 'required|min:6',
        'content' => 'required|min:10',
        'selectedTags' => 'array',
    ];

    public function mount($post = null)
    {


        if ($post) {
            $this->post = $post;
            $this->title = $this->post->title;
            $this->content = $this->post->content;
            $this->selectedTags = $this->post->tags->pluck('id')->toArray();
        }
    }

    public function save()
    {
        $this->validate();

        $isNew = !$this->post;

        if($isNew) {
            $this->post = new Post();
            $this->post->user_id = auth()->id();
        }

        $this->post->title = $this->title;
        $this->post->content = $this->content;
        $this->post->slug = Str::slug($this->title);
        $this->post->is_published = true;
        $this->post->published_at = now();
        $this->post->save();

        $this->post->tags()->sync($this->selectedTags);

        session()->flash('message', $isNew ? 'Post created.' : 'Post updated.');

        return redirect()->route('posts.show', $this->post);
    }
    public function render()
    {
        $allTags = Tag::all();
        return view('livewire.post-form', ['allTags' => $allTags]);
    }
}
