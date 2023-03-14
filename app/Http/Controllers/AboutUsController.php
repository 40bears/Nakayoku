<?php

namespace App\Http\Controllers;

use App\Models\PageCategory;
use App\Models\Pages;

class AboutUsController extends Controller
{
    public function viewAboutUsPage()
    {
        return view('websiteInfo.about_us');
    }

    public function viewTermsAndConditions()
    {
        return view('websiteInfo.terms_and_conditions');
    }

    public function privacyPolicy()
    {
        return view('websiteInfo.privacy_policy');
    }

    public function userGuide()
    {
        $categories = PageCategory::get();
        $categories->load('pages');
        $data = compact('categories');
        return view('websiteInfo.user_guide_default')->with($data);
    }
}
