<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class FirebaseController extends Controller
{
    public function __construct(Database $database)
    {
        // now we have databse conections 
        $this->database = $database;
        $this->ref_tablename = "contacts";
    }

    public function index()
    {
        $reference = $this->database->getReference($this->ref_tablename)->getValue();
        return view('firebase.contact.index', compact('reference'));
    }

    public function addContact()
    {
        return view('firebase.contact.add_contact');
    }

    public function addContactCommit(Request $request)
    {

        $postData = [
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "phone" => $request->phone,
            "email" => $request->email,
        ];

        $postRef = $this->database->getReference($this->ref_tablename)->push($postData);
        if ($postRef) {
            return redirect('contacts')->with('status', 'Contact Added Successfully');
        } else {
            return redirect('contacts')->with('status', 'Contact Not Added');
        }
    }

    public function editContact($id)
    {
        $key = $id;
        $editData = $this->database->getReference($this->ref_tablename)->getChild($key)->getValue();
        if ($editData) {
            return view('firebase.contact.edit', compact('editData', 'key'));
        } else {
            return redirect('contacts')->with('status', 'Record Not Found');
        }
        return view('firebase.contact.edit');
    }

    public function updateDataCommit(Request $request, $id)
    {
        $key = $id;
        $updateData = [
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "phone" => $request->phone,
            "email" => $request->email,
        ];
        $res_update = $this->database->getReference($this->ref_tablename . '/' . $key)->update($updateData);
        if ($res_update) {
            return redirect('contacts')->with('status', 'Data updated Successfully');
        } else {
            return redirect('contacts')->with('status', 'Data Not Updated');
        }
    }

    public function DeleteData($id)
    {
        $key = $id;
        $res_delete = $this->database->getReference($this->ref_tablename . '/' . $key)->remove();
        if ($res_delete) {
            return redirect('contacts')->with('status', 'Data Deleted Successfully');
        } else {
            return redirect('contacts')->with('status', 'Data Not Deleted');
        }
    }
}
