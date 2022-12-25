<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;

use Illuminate\Http\Request;

class BookController extends Controller
{

    public function create()
    {

        $responsecategory = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/category"
        );
        $category = $responsecategory['data'];

        $responseauthor = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/author"
        );
        $author = $responseauthor['data'];

        return view(
            'books.create',
            [
                'categories' => $category,
                'authors' => $author
            ]
        );
    }



    public function index()
    {

        $responseBook = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/book"
        );
        $book = $responseBook['data'];

        return view('books.index', [
            'books' => $book
        ]);
    }

    public function show($id)
    {

        $responseBook = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/book/$id"
        );

        $book = $responseBook['data'];

        return view('books.show', [
            'book' => $book
        ]);
    }

    public function store(Request $request)
    {

        $payload = [
            "id_category" => $request->input("id_category"),
            "id_author" => $request->input("id_author"),
            "photo" => $request->file('photo'),
            "title" => $request->input("title"),
            "publisher" => $request->input("publisher"),
            "publish_year" => $request->input("publish_year"),
        ];
        $file = ["photo" => $request->file("photo")];
        $responseStore = HttpClient::fetch(
            "post",
            "http://127.0.0.1:8000/api/book",
            $payload,
            $file

        );


        if ($responseStore['status'] == true) {


            return redirect(route('book'))->with('success', 'New book has been added');
        } else {
            return redirect(route('book'))->with('failed', 'failed to adding book');
        }
    }

    public function delete($id)
    {

        $responseDelete = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/book/delete/$id"
        );



        if ($responseDelete['success'] == true) {


            return redirect(route('book'))->with('success', 'New book has been delete');
        } else {
            return redirect(route('book'))->with('failed', 'failed to delete');
        }
    }
    public function edit($id)
    {
        $responsecategory = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/category"
        );
        $category = $responsecategory['data'];

        $responseauthor = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/author"
        );
        $author = $responseauthor['data'];

        $responseBook = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/book/$id"
        );
        $book = $responseBook['data'];

        return view('books.edit', [
            'book' => $book,
            'authors' => $author,
            'categories' => $category

        ]);
    }

    public function update(Request $request, $id)
    {


        $files = ["photo" => $request->file("photo")];

        if ($request->file("photo")) {
            $payload = [
                "id_category" => $request->input("id_category"),
                "id_author" => $request->input("id_author"),
                "photo" => $request->file('photo'),
                "title" => $request->input("title"),
                "publisher" => $request->input("publisher"),
                "publish_year" => $request->input("publish_year"),
            ];

            $responseStore = HttpClient::fetch(
                "post",
                "http://127.0.0.1:8000/api/book/$id",
                $payload,
                $files

            );
        } else {
            $payload = [
                "id_category" => $request->input("id_category"),
                "id_author" => $request->input("id_author"),
                "title" => $request->input("title"),
                "publisher" => $request->input("publisher"),
                "publish_year" => $request->input("publish_year"),
            ];

            $responseStore = HttpClient::fetch(
                "post",
                "http://127.0.0.1:8000/api/book/$id",
                $payload
            );
        }




        if ($responseStore['status'] == true) {


            return redirect(route('book'))->with('success', 'book has been updated');
        } else {
            return redirect(route('book'))->with('failed', 'failed to update book');
        }
    }
}
