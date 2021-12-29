<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirebaseController extends Controller
{

    public function index()
    {
        return view('firebase.contact.index');
    }

    public function addContact()
    {
        return view('firebase.contact.add_contact');
    }

    public function addContactCommit(Request $request)
    {
    }
}
