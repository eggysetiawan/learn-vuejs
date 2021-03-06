<?php

namespace App\Http\Controllers\Api;

use App\Models\Note;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Models\Subject;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::with('subject')->latest()->get();
        return NoteResource::collection($notes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        sleep(1);
        request()->validate([
            'title' => 'required',
            'subject' => 'required|integer',
            'description' => 'required',
        ]);

        $subject = Subject::findOrFail(request('subject'));

        $note = Note::create([
            'subject_id' => $subject->id,
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'description' => request('description'),
        ]);

        return response()->json([
            'message' => 'Note was created',
            'note' => $note,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return NoteResource::make($note);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Note $note)
    {
        sleep(1);
        request()->validate([
            'title' => 'required',
            'subject' => 'required|integer',
            'description' => 'required',
        ]);

        $subject = Subject::findOrFail(request('subject'));

        $note->update([
            'subject_id' => $subject->id,
            'title' => request('title'),
            'description' => request('description'),
        ]);

        return response()->json([
            'message' => 'Note was updated',
            'note' => $note,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return response()->json([
            'message' => 'Note was deleted.',
        ], 200);
    }
}
