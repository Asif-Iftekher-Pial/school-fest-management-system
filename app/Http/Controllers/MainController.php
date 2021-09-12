<?php

namespace App\Http\Controllers;

use Auth;

use App\Album;

use App\Sponsor;
use App\Albumimage;
use App\SliderImage;
use App\Videogallery;
use Redirect,Response;
use App\Missionvission;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $slider_image = SliderImage::orderBy('sl_date', 'ASC')->get();
        return view('pages.index', compact('slider_image'));
    }

    public function mission()
    {
        $data=Missionvission::first();
    	return view('pages.about.mission',compact('data'));
    }
    public function conditions()
    {
    	return view('pages.about.conditions');
    }
    public function message()
    {
        $data=Missionvission::select('id','chair_message','chair_image')->first();
    	return view('pages.about.message',compact('data'));
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
