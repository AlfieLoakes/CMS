<?php

namespace App\Http\Controllers;

use App\Site;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class SitesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sites = Site::where('owner_id', auth()->id())->get();
        return view('Sites/list', compact('sites'));
    }

    public function create()
    {
        return view('Sites.add');
    }

    public function show(site $site)
    {

        $this->authorize('view', $site);


        return view('Sites.show', compact('site'));
    }

    public function edit(site $site)
    {

        return view('Sites.edit', compact('site'));
    }

    public function update(site $site)
    {
        $validated = request()->validate([
            'head' => 'nullable',
            'body' => 'required'
        ]);

        $site->update($validated);

        return redirect('/sites');
    }

    public function destroy(site $site)
    {
        $site->delete();

        return redirect('/sites');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'domain' => 'required'
        ]);

        $attributes['owner_id'] = auth()->id();

        Site::create($attributes);

        return redirect('/admin/site');
    }
}
