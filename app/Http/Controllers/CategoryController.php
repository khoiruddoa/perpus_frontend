<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;


class CategoryController extends Controller
{

    public function create()
    {


        return view(
            'categories.create'
        );
    }

    public function index()
    {

        $responsecategory = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/category"
        );
        $category = $responsecategory['data'];

        return view('categories.index', [
            'categories' => $category
        ]);
    }

    public function show($id)
    {

        $responsecategory = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/category/$id"
        );

        $category = $responsecategory['data'];

        return view('categories.show', [
            'category' => $category
        ]);
    }




    public function store(Request $request)
    {

        $payload = [

            "category_name" => $request->input("category_name"),
            "address" => $request->input("description")
        ];


        $responseStore = HttpClient::fetch(
            "post",
            "http://127.0.0.1:8000/api/category",
            $payload

        );

        if ($responseStore['status'] == true) {
            return redirect(route('category'))->with('success', 'New category has been added');
        } else {
            return redirect(route('category'))->with('failed', 'failed to adding category');
        }
    }

    public function delete($id)
    {

        $responseDelete = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/category/delete/$id"
        );


        if ($responseDelete['success'] == true) {


            return redirect(route('category'))->with('success', 'New category has been delete');
        } else {
            return redirect(route('category'))->with('failed', 'failed to delete');
        }
    }
    public function edit($id)
    {


        $responsecategory = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/category/$id"
        );
        $category = $responsecategory['data'];

        return view('categories.edit', [
            'category' => $category

        ]);
    }

    public function update(Request $request, $id)
    {
        $payload = [
            "category_name" => $request->input("category_name"),
            "description" => $request->input("description"),

        ];

        $responseStore = HttpClient::fetch(
            "post",
            "http://127.0.0.1:8000/api/category/$id",
            $payload
        );


        if ($responseStore['status'] == true) {


            return redirect(route('category'))->with('success', 'category has been updated');
        } else {
            return redirect(route('category'))->with('failed', 'failed to update category');
        }
    }
}
