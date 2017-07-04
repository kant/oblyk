<?php

namespace App\Http\Controllers;

use App\Crag;
use Illuminate\Http\Request;

class CragController extends Controller
{
    function cragPage($crag_id, $crag_title){

        $crag = Crag::where('id', $crag_id)
            ->with('rock')
            ->with('orientation')
            ->with('season')
            ->withCount('routes')
            ->withCount('links')
            ->withCount('photos')
            ->with('photos')
            ->with('gapGrade')
            ->with('descriptions.user')
            ->first();

        $data = [
            'crag' => $crag,
            'meta_title' => $crag['label'],
            'meta_description' => 'description de ' . $crag['label']
        ];

        return view('pages.crag.crag', $data);
    }
}
