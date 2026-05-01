<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleBackendController extends Controller
{
    // ================= SHOW TABLE =================
    public function index()
    {
        $data = Article::orderBy('id', 'asc')->paginate(10);
        return view("admin.article.index", compact("data"));
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        $validated = $request->validate([
            // English
            'title'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'content'     => 'nullable|string',
            'description' => 'nullable|string',

            // Khmer
            'title_kh'       => 'required|string|max:255',
            'subtitle_kh'    => 'nullable|string|max:255',
            'content_kh'     => 'nullable|string',
            'description_kh' => 'nullable|string',

            // Chinese
            'title_cn'       => 'required|string|max:255',
            'subtitle_cn'    => 'nullable|string|max:255',
            'content_cn'     => 'nullable|string',
            'description_cn' => 'nullable|string',

            // Photo
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp,svg,bmp,heic,heif,avif,tif,tiff|max:5120',
        ]);

        $slug = Str::slug($validated['title'], '-');

        // Handle photo
        $filename = null;

        if ($request->hasFile('photo')) {
            $filename = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/articles'), $filename);
        }

        Article::create([
            'photo' => $filename,

            // Slug
            'slug' => $slug,

            // English
            'title'       => $validated['title'],
            'subtitle'    => $validated['subtitle'],
            'content'     => $validated['content'],
            'description' => $validated['description'],

            // Khmer
            'title_kh'       => $validated['title_kh'],
            'subtitle_kh'    => $validated['subtitle_kh'],
            'content_kh'     => $validated['content_kh'],
            'description_kh' => $validated['description_kh'],

            // Chinese
            'title_cn'       => $validated['title_cn'],
            'subtitle_cn'    => $validated['subtitle_cn'],
            'content_cn'     => $validated['content_cn'],
            'description_cn' => $validated['description_cn'],
        ]);

        return back()->with('success', 'Article created successfully!');
    }


    // ================= FETCH (EDIT) =================
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return response()->json($article);
    }

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            // English
            'title'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'content'     => 'nullable|string',
            'description' => 'nullable|string',

            // Khmer
            'title_kh'       => 'required|string|max:255',
            'subtitle_kh'    => 'nullable|string|max:255',
            'content_kh'     => 'nullable|string',
            'description_kh' => 'nullable|string',

            // Chinese
            'title_cn'       => 'required|string|max:255',
            'subtitle_cn'    => 'nullable|string|max:255',
            'content_cn'     => 'nullable|string',
            'description_cn' => 'nullable|string',

            'photo' => 'nullable|image|max:5120',
        ]);

        $article = Article::findOrFail($id);

        // 🔥 generate slug
        $slug = Str::slug($validated['title'], '-');
        $article->slug = $slug;

        // English
        $article->title       = $validated['title'];
        $article->subtitle    = $validated['subtitle'];
        $article->content     = $validated['content'];
        $article->description = $validated['description'];

        // Khmer
        $article->title_kh       = $validated['title_kh'];
        $article->subtitle_kh    = $validated['subtitle_kh'];
        $article->content_kh     = $validated['content_kh'];
        $article->description_kh = $validated['description_kh'];

        // Chinese
        $article->title_cn       = $validated['title_cn'];
        $article->subtitle_cn    = $validated['subtitle_cn'];
        $article->content_cn     = $validated['content_cn'];
        $article->description_cn = $validated['description_cn'];

        // Image update
        if ($request->hasFile('photo')) {
            if ($article->photo && File::exists(public_path('uploads/articles/' . $article->photo))) {
                File::delete(public_path('uploads/articles/' . $article->photo));
            }

            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/articles'), $imageName);
            $article->photo = $imageName;
        }

        $article->save();

        return redirect()->back()->with('success', 'Article updated successfully.');
    }


    // ================= DELETE =================
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        if ($article->photo && file_exists(public_path('uploads/articles/' . $article->photo))) {
            unlink(public_path('uploads/articles/' . $article->photo));
        }

        $article->delete();

        return back()->with('success', 'Article deleted successfully!');
    }
}
