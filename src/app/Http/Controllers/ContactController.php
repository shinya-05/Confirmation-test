<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index',compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['category_id', 'first_name', 'last_name', 'gender','email', 'tell1', 'tell2', 'tell3', 'address', 'building', 'detail']);
        $category = Category::find($contact['category_id']);
        return view('confirm', compact('contact', 'category'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['category_id', 'first_name', 'last_name', 'gender','email', 'tell1', 'tell2', 'tell3', 'address', 'building', 'detail']);
        $contact['phone'] = $request->input('tell1') . '-' . $request->input('tell2') . '-' . $request->input('tell3');
        Contact::create($contact);
        return view('thanks');
    }
}
