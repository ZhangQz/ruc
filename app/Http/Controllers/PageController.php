<?php
namespace App\Http\Controllers;

class PageController extends Controller
{
    public function index() {
    	return view('index');
    }

    /* Método redundante...
        public function home() {
        	return view('index');
        }
    */

    public function credito() {
    	return view('pages.creditos');
    }
}
