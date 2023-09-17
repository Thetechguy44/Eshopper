<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use App\Mail\ContactMail;
use Mail;

class FrontendController extends Controller
{
    
    public function index()
    {
        return view('frontend.index', [
            'products' => Products::orderBy('created_at', 'desc')->paginate(10),
            'categorys' => Category::orderBy('created_at', 'desc')->paginate(6)
        ]);
    }

    
    public function shop()
    {
        return view('frontend.shop', [
            'products' => Products::orderBy('created_at', 'desc')->paginate(10),
            'categorys' => Category::all()
        ]);
    }

   
    public function show(string $id)
    {
        $product = Products::where('Product_Id', '=', $id)->first();
        $latestProducts = Products::orderBy('created_at', 'desc')->paginate(5);
        return view('frontend.detail', compact('product', 'latestProducts'));
    }

    
    public function checkout()
    {
        return view('frontend.checkout');
    }


    public function contact()
    {
        return view('frontend.contact');
    }

    public function sendMail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];
        Mail::to('Yahaya128173908@gmail.com')->send(new ContactMail($details));
        return redirect()->back()->with('Success', 'Your message has been sent successfully!');
    }

 
    public function destroy(string $id)
    {
        //
    }
}
