<?php

namespace App\Http\Controllers;

use App\Subtemplate;
use App\Site;
use Illuminate\Http\Request;

class SubtemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Site $site)
    {
        $this->authorize('view', $site);
        $subtemplate = Subtemplate::where('site_id', $site->id)->get();

        return view('subtemplate.list', compact('subtemplate','site'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Site $site)
    {
        $new_template = Subtemplate::create(['site_id' => $site->id, 'name' => 'New Sub-Template']);

        return redirect('/admin/site/'.$site->id.'/subtemplate/'.$new_template->id.'/edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subtemplate  $subtemplate
     * @return \Illuminate\Http\Response
     */
    public function show(Subtemplate $subtemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subtemplate  $subtemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site, Subtemplate $subtemplate)
    {
        $this->authorize('view', $site);

        $subtemplate = Subtemplate::where('site_id', $site->id)->where('id', $subtemplate->id)->first();


        return view('subtemplate.edit', compact('subtemplate','site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subtemplate  $subtemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site,  Subtemplate $subtemplate)
    {
        //§
        $validated = request()->validate([
            'head' => 'nullable',
            'name' => 'required',
            'status' => 'required',
            'body' => 'nullable',
            'css' => 'nullable'
        ]);

        $subtemplate->update($validated);

        return redirect('/admin/site/'.$site->id.'/subtemplate/'.$subtemplate->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subtemplate  $subtemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site, Subtemplate $subtemplate)
    {
        $subtemplate->delete();

        return redirect('/admin/site/'.$site->id.'/subtemplate/');
    }
}
