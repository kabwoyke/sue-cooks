<?php

namespace App\Livewire;

use App\Models\Video;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class UploadVideo extends Component
{
    use WithFileUploads;

    public $video;
    public $title;
    public $description;
    public $price;
    public $duration;
    public $thumbnail;

    public function save()
    {
        $this->validate([
            'title' => 'required|string',
            'video' => 'required|mimes:mp4|max:10240',
            'thumbnail' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:10240',
            'description' => 'required|string',
            'price' => 'required|integer',
            'duration' => 'required|string',
        ]);
        $thumbnail_file_name = Carbon::now()->format('YmdHis') . '-' . $this->thumbnail->getClientOriginalName();
        $video_file_name = Carbon::now()->format('YmdHis') . '-' . $this->video->getClientOriginalName();

        $thumbnail_path = $this->thumbnail->storeAs('public/thumbnail', $thumbnail_file_name);
        $video_path = $this->video->storeAs('public/video', $video_file_name);
        $all_data = [
            'title' =>$this->title,
            'duration' => $this->duration,
            'description' =>$this->description,
            'price' =>$this->price,
            'video_url' =>$video_path,
            'thumbnail_url' =>$thumbnail_path,
        ];
        $video = Video::create($all_data);

        return redirect("/");

    }

    public function render()
    {
        return view('livewire.upload-video');
    }
}
