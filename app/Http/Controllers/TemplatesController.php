<?php

namespace App\Http\Controllers;

use App\Site;
use App\Template;
use Illuminate\Http\Request;

class TemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Site $site)
    {
        $this->authorize('view', $site);
        $templates = Template::where('site_id', $site->id)->get();

        return view('templates.list', compact('templates','site'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Site $site)
    {
        $new_template = Template::create(['site_id' => $site->id, 'name' => 'New Template']);

        return redirect('/admin/site/'.$site->id.'/template/'.$new_template->id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site, Template $template)
    {
        $this->authorize('view', $site);

        $template = Template::where('site_id', $site->id)->where('id', $template->id)->first();


        return view('templates.edit', compact('template','site'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site, Template $template)
    {

        $validated = request()->validate([
            'head' => 'nullable',
            'name' => 'required',
            'status' => 'required',
            'body' => 'nullable',
            'css' => 'nullable'
        ]);

        $template->update($validated);

        return redirect('/admin/site/'.$site->id.'/template/'.$template->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site, Template $template)
    {

        $template->delete();

        return redirect('/admin/site/'.$site->id.'/template/');
    }
}
