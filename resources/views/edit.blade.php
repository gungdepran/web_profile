<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Postingan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto max-w-2xl px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-700 mb-6">Edit Postingan</h1>

        <div class="bg-white p-8 rounded-lg shadow-md">
            {{-- Form akan mengarah ke route 'admin.update' dengan method PUT --}}
            <form action="{{ route('admin.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                    <input type="text" name="judul" id="judul" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('judul', $blog->judul) }}" required>
                </div>

                <div class="mb-6">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>{{ old('deskripsi', $blog->deskripsi) }}</textarea>
                </div>
                
                <div class="mb-6">
                    <label for="gambar" class="block text-sm font-medium text-gray-700 mb-1">Ganti Gambar (Opsional)</label>
                    <input type="file" name="gambar" id="gambar" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100">
                    @if($blog->gambar)
                        <div class="mt-4">
                            <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                            <img src="{{ asset('storage/' . $blog->gambar) }}" alt="{{ $blog->judul }}" class="w-40 h-auto rounded-md">
                        </div>
                    @endif
                </div>

                <div class="flex items-center justify-end space-x-4">
                    <a href="{{ route('admin.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 text-sm font-semibold rounded-lg hover:bg-gray-300 transition-colors">Batal</a>
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-lg hover:bg-indigo-700 transition-colors">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>