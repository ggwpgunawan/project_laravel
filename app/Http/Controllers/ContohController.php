<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContohController extends Controller
{
    public function index()
    {
        // untuk menampilkan semua data
    }

    public function create()
    {
        // untuk membuat data baru dan menampilkan form create
    }

    public function store(Request $request)
    {
        // untuk mengambil data dari form create
        // lalu menyimpan di db
    }

    public function show($id)
    {
        // untuk menampilkan detail
    }

    public function edit($id)
    {
        // untuk menampilkan data yg akan diedit
        // dan menampilkan form edit
    }

    public function update(Request $request, $id)
    {
        // untuk mengambil data dari form edit
        // lalu mengupdate di db
    }

    public function destroy($id)
    {
        // untuk menghapus data
    }
}
