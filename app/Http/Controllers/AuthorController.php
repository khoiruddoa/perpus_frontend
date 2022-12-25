<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function create()
    {


        return view(
            'authors.create'
        );
    }



    public function index()
    {

        $responseauthor = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/author"
        );
        $author = $responseauthor['data'];

        return view('authors.index', [
            'authors' => $author
        ]);
    }

    public function show($id)
    {

        $responseauthor = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/author/$id"
        );

        $author = $responseauthor['data'];

        return view('authors.show', [
            'author' => $author
        ]);
    }

    public function store(Request $request)
    {

        $payload = [

            "author_name" => $request->input("author_name"),
            "address" => $request->input("address"),
            "telephone" => $request->input("telephone"),
            "email" => $request->input("email"),
            "photo" => $request->file('photo'),
            "bio" => $request->input('bio')
        ];

        $file = ["photo" => $request->file("photo")];
        $responseStore = HttpClient::fetch(
            "post",
            "http://127.0.0.1:8000/api/author",
            $payload,
            $file

        );

        if ($responseStore['status'] == true) {
            return redirect(route('author'))->with('success', 'New author has been added');
        } else {
            return redirect(route('author'))->with('failed', 'failed to adding author');
        }
    }

    public function delete($id)
    {

        $responseDelete = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/author/delete/$id"
        );



        if ($responseDelete['success'] == true) {


            return redirect(route('author'))->with('success', 'New author has been delete');
        } else {
            return redirect(route('author'))->with('failed', 'failed to delete');
        }
    }
    public function edit($id)
    {


        $responseauthor = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/author/$id"
        );
        $author = $responseauthor['data'];

        return view('authors.edit', [
            'author' => $author

        ]);
    }

    public function update(Request $request, $id)
    {


        $files = ["photo" => $request->file("photo")];

        if ($request->file("photo")) {
            $payload = [


                "author_name" => $request->input("author_name"),
                "address" => $request->input("address"),
                "telephone" => $request->input("telephone"),
                "email" => $request->input("email"),
                "photo" => $request->file('photo'),
                "bio" => $request->input('bio')
            ];

            $responseStore = HttpClient::fetch(
                "post",
                "http://127.0.0.1:8000/api/author/$id",
                $payload,
                $files

            );
        } else {
            $payload = [


                "author_name" => $request->input("author_name"),
                "address" => $request->input("address"),
                "telephone" => $request->input("telephone"),
                "email" => $request->input("email"),

                "bio" => $request->input('bio')
            ];

            $responseStore = HttpClient::fetch(
                "post",
                "http://127.0.0.1:8000/api/author/$id",
                $payload
            );
        }


        if ($responseStore['status'] == true) {


            return redirect(route('author'))->with('success', 'author has been updated');
        } else {
            return redirect(route('author'))->with('failed', 'failed to update author');
        }
    }
}
