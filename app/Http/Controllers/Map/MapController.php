<?php

namespace App\Http\Controllers\Map;

use App\Http\Controllers\Controller;
use App\Models\Map;
use App\Models\MapsPhoto;
use Illuminate\Http\Request;
use App\Http\Requests\MapRequest;
use Storage;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('maps.index', [
            'maps' => Map::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maps.create', [
            'map' => []
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MapRequest $request)
    {
        $map = Map::create($request->all());
        if ($request->photos) {
            foreach ($request->photos as $photo) {
                $filename = $photo->store('public/photos');
                $filename = str_replace('public/', '', $filename);
                MapsPhoto::create([
                    'map_id' => $map->id,
                    'filename' => $filename
                ]);
            }
        }
        return redirect()->route('map.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function show(Map $map)
    {
        $photos = MapsPhoto::where('map_id', $map->id)->get();
        return view('maps.showMap', [
            'map' => $map,
            'photos' => $photos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function edit(Map $map)
    {
        return view('maps.edit', [
            'map' => $map
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function update(MapRequest $request, Map $map)
    {
        $map->update($request->except('slug'));
        return redirect()->route('map.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function destroy(Map $map)
    {
        $photos = MapsPhoto::where('map_id', $map->id)->get();
        foreach ($photos as $photo) {
            Storage::delete($photo->filename);
        }
        $map->delete();
        return redirect()->route('map.index');
    }
}
