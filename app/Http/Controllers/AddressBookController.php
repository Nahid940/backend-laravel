<?php

namespace App\Http\Controllers;

use App\Models\AddressBook;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function PHPUnit\Runner\validate;
use Illuminate\Support\Facades\Auth;

class AddressBookController extends Controller
{
    //

    public function index()
    {
        $addresses=AddressBook::where('created_by',Auth::user()->id)->orderBy('id','desc')->get();
        return response()->json($addresses,200);
    }

    public function search(Request $request)
    {
        $addresses=AddressBook::where('created_by',Auth::user()->id)
        ->where('name','LIKE','%'.$request->searchKey.'%')
        ->orWhere('phone','LIKE','%'.$request->searchKey.'%')
        ->orderBy('id','desc')->get();
        return response()->json($addresses,200);
    }

    public function show($id)
    {
        $address=AddressBook::where('created_by',Auth::user()->id)->find($id);
        return response()->json($address,200);
    }

    public function create(Request $request)
    {
        $validator = \Validator::make($request->all(), 
            [
                "name"=>'required|max:45',
                "phone"=>'required|max:15|unique:address_books',
                "email"=>'required|max:35|unique:address_books',
                "gender"=>'required',
                "age"=>'nullable|numeric',
                "wehsite"=>'max:80'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        
        $request->request->add(['created_by' => Auth::user()->id]);
        AddressBook::create($request->all());

        return response()->json(["message"=>"Data saved successfully!!"],200);
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), 
            [
                "name"=>'required|max:45',
                "phone"=>['required','max:15','unique:address_books,phone,'.$id],
                "email"=>['required','max:35','unique:address_books,email,'.$id],
                "age"=>'nullable|numeric',
                "wehsite"=>'max:80'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        
        $article = AddressBook::where('created_by',Auth::user()->id)->findOrFail($id);
        $article->update($request->all());
        return response()->json(["message"=>"Data updated successfully!!"],201);
    }


    public function delete($id)
    {
        $address=AddressBook::where('created_by',Auth::user()->id)->findOrFail($id);
        $address->delete();
        return response()->json(['message'=>'Data deleted successfully!!'],204);
    }
}
