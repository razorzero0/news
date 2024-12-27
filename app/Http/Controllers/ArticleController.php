<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->get();
        // dd($digiflazz);


        return view('admin.article.article', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        // dd($digiflazz);


        return view('admin.article.add-article', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar wajib diisi
            'published_at' => 'nullable|date',
            'excerpt' => 'required|string|max:150', // Excerpt is now required
        ]);

        // Generate slug from title
        $slug = Str::slug($validatedData['title']);

        // Process image upload
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;
        $validatedData['image_path'] = $imagePath;

        // Add slug to validated data
        $validatedData['slug'] = $slug;

        // Simpan data artikel
        $stmt = Article::create($validatedData);


        if ($stmt) {
            return redirect()->route('article.index')->with('success', 'tambah Artikel Sukses');
        }

        return back()->with('error', 'tambah Artikel Gagal');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);
        $category = Category::all();

        if ($article) {
            return view('admin.article.edit-article', ['article' => $article, 'category' => $category]);
        } else {
            return back()->with('error', 'Artikel tidak ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);
        // Validasi data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'excerpt' => 'required|string|max:150',
        ]);



        // Jika ada gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($article->image_path && file_exists(public_path($article->image_path))) {
                unlink(public_path($article->image_path)); // Hapus file gambar lama
            }

            // Proses upload gambar
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
            $article->image_path = $imagePath;
        }

        // Simpan data artikel
        $article->title = $validatedData['title'];
        $article->content = $validatedData['content'];
        $article->category_id = $validatedData['category_id'];
        // Generate new slug based on title
        $article->slug = Str::slug($validatedData['title']);

        // Update excerpt
        $article->excerpt = $validatedData['excerpt'];


        // Simpan perubahan ke database
        if ($article->save()) {
            return redirect()->route('article.index')->with('success', 'Update Artikel Sukses');
        }

        return back()->with('error', 'Edit Artikel Gagal');
    }

    public function updatePublishedAt(string $id)
    {


        // Cari artikel berdasarkan ID
        $article = Article::find($id);

        if ($article) {
            // Update data artikel
            $article->published_at = now();
            $stmt = $article->save();

            if ($stmt) {
                return back()->with('success', 'Update Tanggal Publikasi Sukses');
            } else {
                return back()->with('error', 'Update Tanggal Publikasi Gagal');
            }
        } else {
            return back()->with('error', 'Artikel tidak ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);

        if ($article) {
            // Dapatkan nama file gambar
            $imageName = $article->image_path;
            $filePath = public_path($imageName);

            // Hapus file gambar jika file ada
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Hapus produk dari database
            $stmt = $article->delete();

            if ($stmt) {
                return back()->with('success', 'Hapus Produk Sukses');
            } else {
                return back()->with('error', 'Hapus Produk Gagal');
            }
        } else {
            return back()->with('error', 'Produk tidak ditemukan');
        }
    }
}
