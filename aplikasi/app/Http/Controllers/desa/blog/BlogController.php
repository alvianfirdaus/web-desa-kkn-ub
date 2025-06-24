<?php

namespace App\Http\Controllers\desa\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\desa\blog\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('desa', 'user')->latest()->paginate(10);
        return view('halaman_desa.manajemen_data.manajemen_blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('halaman_desa.manajemen_data.manajemen_blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'judul' => 'required',
            'isi' => 'required',
            'kategori_blog' => 'required|in:berita,pengumuman,parawisata',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'tanggal.required' => 'Tanggal harus di isi.',
            'judul.required' => 'Judul harus di isi.',
            'isi.required' => 'Isi harus di isi.',
            'gambar.max' => 'Ukuran gambar maksimal adalah 2MB.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
        ]);

        try {
            $gambarPath = $request->hasFile('gambar') ? $request->file('gambar')->store('gambar_blog', 'public') : null;

            $user = auth()->user();

            Blog::create([
                'id_desa' => $user->id_desa,
                'id_user' => $user->id,
                'tanggal' => $request->tanggal,
                'judul' => $request->judul,
                'isi' => $request->isi,
                'kategori_blog' => $request->kategori_blog,
                'gambar' => $gambarPath,
            ]);

            return redirect()->back()->with('success', 'Data blog berhasil dibuat!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('halaman_desa.manajemen_data.manajemen_blog.update', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blogs = Blog::findOrFail($id);

        $request->validate([
            'tanggal' => 'required|date',
            'judul' => 'required',
            'isi' => 'required',
            'kategori_blog' => 'required|in:berita,pengumuman,parawisata',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'gambar.max' => 'Ukuran gambar maksimal adalah 2MB.',
            'judul.required' => 'Judul harus di isi.',
            'isi.required' => 'Isi harus di isi.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
        ]);

        try {
            if ($request->hasFile('gambar')) {
                if ($blogs->gambar) {
                    Storage::disk('public')->delete($blogs->gambar);
                }
                $gambarPath = $request->file('gambar')->store('gambar_blog', 'public');
            } else {
                $gambarPath = $blogs->gambar;
            }

            $data = [                
                'tanggal' => $request->tanggal,
                'judul' => $request->judul,
                'isi' => $request->isi,
                'kategori_blog' => $request->kategori_blog,
                'gambar' => $gambarPath,
            ];

            $blogs->update($data);

            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function show($id)
    {
        $blog = Blog::with('desa')->findOrFail($id);

        // Cek apakah pengguna yang login adalah admin atau petugas di desa yang sama
        if (Auth::user()->level !== 'admin' && Auth::user()->id_desa !== $blog->id_desa) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return view('halaman_desa.manajemen_data.manajemen_blog.show', compact('blog'));
    }


    public function destroy($id)
    {
        $blogs = Blog::findOrFail($id);

        // Hapus foto jika ada
        if ($blogs->gambar) {
            Storage::disk('public')->delete($blogs->gambar);
        }

        $blogs->delete();        
        return redirect()->route('blog.index')->with('success', 'Blog berhasil dihapus.');
    }
}
