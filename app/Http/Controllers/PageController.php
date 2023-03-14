<?php

namespace App\Http\Controllers;

use App\Models\PageCategory;
use App\Models\Pages;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function list()
    {
        $pages = Pages::orderBy('updated_at', 'desc')->paginate(10);
        $pages->load('categories');
        $data = compact('pages');
        return view('pages.allPages')->with($data);
    }

    public function addPage(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'status' => 'required',
                'category' => 'required'
            ]);

            $pages = new Pages();
            $pages->title = str_replace(' ', '-', $request['title']);
            $pages->content = $request['content'];
            $pages->status = $request['status'];
            if (!empty($request['other_category'])) {
                $category = new PageCategory();
                $category->name = str_replace(' ', '-', $request['other_category']);
                $category->save();

                $newCategory = PageCategory::where('name', str_replace(' ', '-', $request['other_category']))->first();

                $pages->category_id = $newCategory->id;
            } else {
                $pages->category_id = $request['category'];
            }
            $pages->timestamps = Carbon::now();
            $pages->save();

            return redirect()->route('view-pages');
        } else {
            $page = Pages::get();
            $pageCategories = PageCategory::get();
            $data = compact('pageCategories');
            return view('pages.addPage')->with($data);
        }
    }

    public function viewPage($category, $page)
    {
        $categories = PageCategory::get();
        $categories->load('pages');
        $currentPage = Pages::where('title', $page)->first();
        if ($currentPage) {
            $data = compact('currentPage', 'categories');
            return view('websiteInfo.user_guide')->with($data);
        } else {
            return redirect()->route('not-found');
        }
    }

    public function editPage($id)
    {
        $page = Pages::where('id', $id)->first();
        $categories = PageCategory::get();
        $data = compact('page', 'categories');
        return view('pages.editPage')->with($data);
    }

    public function updatePage($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
            'category' => 'required',
        ]);

        $page = Pages::where('id', $id)->first();
        $page->title = str_replace(' ', '-', $request['title']);
        $page->content = $request['content'];
        $page->status = $request['status'];
        if (!empty($request['other_category'])) {
            $category = new PageCategory();
            $category->name = str_replace(' ', '-', $request['other_category']);
            $category->save();

            $newCategory = PageCategory::where('name', str_replace(' ', '-', $request['other_category']))->first();

            $page->category_id = $newCategory->id;
        } else {
            $page->category_id = $request['category'];
        }
        $page->timestamps = Carbon::now();
        $page->save();

        return redirect()->route('view-pages');
    }

    public function deletePage($id)
    {
        $page = Pages::where('id', $id)->delete();
        return redirect()->route('view-pages');
    }

    public function notFound()
    {
        return view('notFound');
    }
}
