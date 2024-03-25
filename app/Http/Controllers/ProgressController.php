<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PregressRequest;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $progress = Progress::where('user_id', Auth::user()->id)->get();
            return response()->json(['message' => 'Progress', 'progress' => $progress], 201);
        } else {
            return response()->json(['message' => ' not Progress', 403]);

        }



    }
    public function store(PregressRequest $request)
    {
        $user = Auth::user();
        $request->validated();
        $progress = Progress::create([

            'user_id' => $user->id,
            'weight' => $request->weight,
            'measurements' => $request->measurements,
            'performance' => $request->performance,
            'status' => 'Non terminé',
        ]);

        return response()->json(['message' => 'Progress saved successfully', 'progress' => $progress], 201);
    }



    public function show(Progress $progress)
    {
    if (Auth::check()) {
        $progress = Progress::where('user_id', Auth::user()->id)->findOrFail($progress->id);

        return response()->json(['message' => 'Progress shown successfully', 'progress' => $progress], 200);
    } else {
        return response()->json(403);
    }



    }


    public function update(PregressRequest $request, Progress $progress)
    {

        if (Auth::check()) {
            $user = Auth::user();

            if ($progress->user_id === $user->id) {
               $request->validated();

                $progress->update([
                    'user_id' => $user->id,
                    'weight' => $request->weight,
                    'measurements' => $request->measurements,
                    'performance' => $request->performance,
                    // 'status' => 'Non terminé',
                ]);

                return response()->json(['message' => 'Progress updated successfully', 'progress' => $progress], 200);
            } else {
                return response()->json(['message' => 'Unauthorized to update progress'], 403);
            }
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }


}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Progress $progress)
    {
     if (Auth::check() && $progress->user_id === Auth::user()->id) {
        $progress->delete();

        return response()->json(['message' => 'Progress deleted successfully'], 200);
    } else {
        return response()->json(['message' => 'Unauthorized to delete progress'], 403);
    }
    }
}