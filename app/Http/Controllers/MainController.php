<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect,Response;

use Auth;
use App\Sponsor;
use App\Album;
use App\Albumimage;
use App\SliderImage;
use App\Videogallery;

class MainController extends Controller
{
    public function index()
    {
        $slider_image = SliderImage::orderBy('sl_date', 'ASC')->get();
        return view('pages.index', compact('slider_image'));
    }

    public function mission()
    {
    	return view('pages.about.mission');
    }
    public function conditions()
    {
    	return view('pages.about.conditions');
    }
    public function message()
    {
    	return view('pages.about.message');
    }
    public function about()
    {
    	return view('pages.about.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }
    public function partner()
    {
        $pdata= Sponsor::where('status', '1')->get();
        return view('pages.partners', compact('pdata'));
    }
    public function process()
    {
        return view('pages.registration.process');
    }
    public function notice()
    {
        return view('pages.registration.notice');
    }

    public function stem2020()
    {
        return view('pages.stemFest');
    }

    public function photoGallery()
    {
        $albums = Album::all();
        return view('pages.photoGallery', compact('albums'));
    }

    public function videoGallery()
    {
        $data = Videogallery::orderBy('sl_date', 'ASC')->get();
        return view('pages.videoGallery', compact('data'));
    }

}
