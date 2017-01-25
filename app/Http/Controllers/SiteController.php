<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class SiteController extends Controller
{
  public function testform(FormBuilder $formBuilder)
  {
    $form = $formBuilder->create('App\Forms\SongForm', [
           'method' => 'POST'
       ]);

       return view('testform.index', compact('form'));
  }
}
