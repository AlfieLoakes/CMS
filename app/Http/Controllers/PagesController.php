<?php

namespace App\Http\Controllers;

use App\Page;
use App\Site;
use App\Subtemplate;
use App\Template;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(Site $site)
    {
        $this->authorize('view', $site);;


        $pages = Page::where('site_id', $site->id)->get();



        return view('pages.list', compact('pages', 'site'));
    }

    public function edit(Site $site, Page $page)
    {
        $this->authorize('view', $site);;

        $page = Page::where('site_id', $site->id)->where('id', $page->id)->first();

        $templates = Template::where('site_id', $site->id)->get();
        $subtemplates = Subtemplate::where('site_id', $site->id)->get();

        if ($page->subtemplate_id !== null) {
            $subtemplate = Subtemplate::where('id', $page->subtemplate_id)->first();

            // get input fields
            preg_match_all("/\[[^\]]*\]/", $subtemplate->body, $matches);
            //dd($matches);

            foreach ($matches[0] as $match) {
                $match = str_replace('[', '', $match);
                $match = str_replace(']', '', $match);
                $x = explode("=", $match);
                $inputs[$x[1]] = $x[0];
                //var_dump($inputs[$x[0]]);
            }


            preg_match_all("/\[[^\]]*\]/", $page->body, $pagematches);
            foreach ($pagematches[0] as $pagematch) {
                $pagematch = str_replace('[', '', $pagematch);
                $pagematch = str_replace(']', '', $pagematch);
                $x = explode("=", $pagematch);
                $values[$x[0]] = $x[1];
            }

            //dd($values);

            //$pagematches = str_replace('[', '', $pagematches);
            //$pagematches = str_replace(']', '', $pagematches);
            //dd($values);

            return view('pages.edit_subtemplate', compact('page','site', 'templates', 'subtemplates', 'subtemplate', 'inputs', 'values'));
        }

        return view('pages.edit', compact('page','site', 'templates', 'subtemplates'));
    }

    public function create()
    {
        return view('pages.create');
    }

    public function update(Site $site, Page $page)
    {
        $validated = request()->validate([
            'head' => 'nullable',
            'title' => 'required',
            'status' => 'nullable',
            'template_id' => 'nullable',
            'subtemplate_id' => 'nullable',
            'slug' => 'nullable',
            'body' => 'nullable',
            'css' => 'nullable',
            'templatedata' => 'nullable'
        ]);

        if (isset($validated['templatedata'])) {
            if ($validated['templatedata'] != '') {
                $validated['body'] = '';
                foreach ($validated['templatedata'] as $key => $value) {
                    $validated['body'] .= '[['.$key.'='. $value. ']]';
                }
            }
        }

        unset($validated['templatedata']);

       $page->update($validated);

        return redirect('/admin/site/'.$site->id.'/page/'.$page->id.'/edit');
    }

    public function home()
    {
        $page = Page::where('slug', '/')->where('status', 1)->first();
        if ($page->template_id !== null) {
            $template = Template::where('id', $page->template_id)->first();

            $body = str_replace('[center]',$page->body,$template->body);

            return view('frontend.layoutTemplate', compact('page', 'template', 'body'));
        } else {
            return view('frontend.layout', compact('page'));
        }

    }


    public function getPage($slug = null)
    {
        $page = Page::where('slug', $slug)->where('status', 1)->firstOrFail();

        if ($page->template_id !== null) {
            $template = Template::where('id', $page->template_id)->first();

            if ($page->subtemplate_id !== null) {
                $subtemplate = Subtemplate::where('id', $page->subtemplate_id)->first();
                $body = str_replace('[center]',$subtemplate->body,$template->body);


                preg_match_all("/\[[^\]]*\]/", $page->body, $pagematches);
                foreach ($pagematches[0] as $pagematch) {
                    $pagematch = str_replace('[', '', $pagematch);
                    $pagematch = str_replace(']', '', $pagematch);
                    $x = explode("=", $pagematch);
                    $values[$x[0]] = $x[1];
                }


                preg_match_all("/\[[^\]]*\]/", $subtemplate->body, $templatematches);
                foreach ($templatematches[0] as $templatematch) {
                    $templatematch = str_replace('[', '', $templatematch);
                    $templatematch = str_replace(']', '', $templatematch);
                    $x = explode("=", $templatematch);

//var_dump($x);
                    $body = str_replace('[['. $x[0] .'='. $x[1] .']]',$values[$x[1]],$body);

                    $templatesa[$x[0]] = $x[1];
                }






            } else {
                $body = str_replace('[center]',$page->body,$template->body);
            }


            //dd($body);
            return view('frontend.layoutTemplate', compact('page', 'template', 'body'));
        } else {
            return view('frontend.layout', compact('page'));
        }

        //$page = $page->firstOrFail();

    }

    public function destroy(Site $site, Page $page)
    {
        $page->delete();

        return redirect('/admin/site/'.$site->id.'/pages');
    }

    public function store(Site $site)
    {
        /*$attributes = request()->validate([
            'name' => 'required',
            'domain' => 'required'
        ]);

      */
        $attributes['owner_id'] = auth()->id();
        
        $new_page = Page::create(['site_id' => $site->id, 'title' => 'New Page']);

        return redirect('/admin/site/'.$site->id.'/page/'.$new_page->id.'/edit');
    }
}
