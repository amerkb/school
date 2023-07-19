<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Book;
use App\Models\SubjectsCategorie;
use App\Traits\GeneralTrait;
use App\Transformers\BookTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{ use AttachFilesTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('pages.book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = SubjectsCategorie::all();
        return view('pages.book.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $books = new Book();
            $books->title = $request->title;
            $books->file_name =  $request->file('file_name')->getClientOriginalName();
            $books->subject_category_id = $request->category;
            $books->save();
            $this->uploadbook($request,'file_name');
            toastr()->success(('Success'));
            return redirect()->route('book_index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $types = SubjectsCategorie::all();
        $book = Book::findorFail($id);
        return view('pages.book.edit',compact('book','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {

            $book = Book::findorFail($request->id);
            $book->title = $request->title;

            if($request->hasfile('file_name')){

                $this->deleteBook($book->file_name);

                $this->uploadbook($request,'file_name');

                $file_name_new = $request->file('file_name')->getClientOriginalName();
                $book->file_name = $book->file_name !== $file_name_new ? $file_name_new : $book->file_name;
            }

            $book->title = $request->title;
            $book->subject_category_id = $request->category;
            $book->save();
            toastr()->success(('Update'));
            return redirect()->route('book_index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $this->deleteBook($request->file_name);
            Book::destroy($request->id);
            toastr()->warning(('Delete'));
            return redirect()->route('book_index');

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function download($filename)
    {
        return response()->download(public_path('attachments/book/'.$filename));
    }
use GeneralTrait;
    public function get_book(Request $request)
    {
        try {

            if ($request->role == "student") {


                $books=Book::get();
                $booksTransfermer=[];
                foreach ($books as $index=> $book){
                    $booksTransfermer[$index] = fractal($book, new BookTransformer())->toArray();
                    $booksTransfermer[$index]= $booksTransfermer[$index]["data"];
                }
                return $this ->returnData("books" ,$booksTransfermer,"count_book",$book->count());


            }
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }

    }

}
