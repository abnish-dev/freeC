<?php

namespace App\Http\Controllers;
use App\Advertise;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advertise::all();
        return view('admin/advertisement/list', compact('adverts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/advertisement/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $advert = new Advertise();
        $advert->title = $request->title;
        $advert->description = $request->description;
        $advert->save();

        
        return redirect()->route('advertise.index')->with('success','data stored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advert = Advertise::find($id);
        return view('admin/advertisement/edit', compact('advert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $advert = Advertise::find($id);
        $advert->title = $request->title;
        $advert->description = $request->description;
        $advert->save();

        return redirect()->route('advertise.index')->with('success','data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advert = Advertise::find($id);
        $advert->delete();
        return redirect()->route('advertise.index')->with('success','data deleted successfully');
    }
}
