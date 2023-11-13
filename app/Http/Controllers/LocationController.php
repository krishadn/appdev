<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAPI()
    {
    $locations= Location::select('location','longtitude','latitude')->get();
    return response()->json($locations);
    }

    public function index()
    {
    $locations= Location::all();
    return Inertia::render('Locations/List',['locations'=>$locations]);
    }




    public function create()
    {
        return Inertia::render('Locations/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {   
        $locations = Location::all();
        $existing = false;

        foreach ($locations as $location){
            if(Request::get("location") === $location->location){
                $existing = true;
                break;
            }
        }

        if(!$existing){
            Location::create([
                "location"=> Request::get("location"),
            ]);
        }
        
        return to_route('locations')->with('success', 'New  created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

        $location= Location::find(Request::get("id"));
        return Inertia::render('Locations/Edit',['location'=>$location]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Location $location)
    {
        Request::validate([
            "location"=> 'required',
        ]);

        Location::where('id',$location->id)
        ->update([
            "location"=> Request::get("location"),
        ]);
        return to_route('locations')->with('success', 'location  Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        Location::destroy($location->id);
        return to_route('locations');
    }
}
