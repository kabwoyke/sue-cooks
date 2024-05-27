<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

use function Termwind\render;

class VideoController extends Controller
{
    public function new()
    {
        return view("videos.new");
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'duration' => 'required|integer',
            'price' => 'required|numeric',
            'thumbnail_url' => 'required|url',
            'video_url' => 'required|url',
        ]);

        $video = Video::create($validatedData);

        return response()->json($video, 201);
    }

    public function show($id)
    {
        $video =  Video::where('id',$id)->first();
        return response()->json($video);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'duration' => 'integer',
            'price' => 'numeric',
            'thumbnail_url' => 'url',
            'video_url' => 'url',
        ]);

        $video =  Video::where('id',$id)->first();
        $video->update($validatedData);

        return response()->json($video, 200);
    }

    public function destroy($id)
    {
        $video = Video::where('id',$id)->first();
        $video->delete();

        return response()->json(null, 204);
    }
}
