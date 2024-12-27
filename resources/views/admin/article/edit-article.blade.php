@extends('admin.layouts.app')
@section('content')
    <div class="p-4 pt-20 sm:ml-64 md:pt-16">

        <!-- Breadcrumb -->
        <nav class="flex px-5 py-3 mb-2 text-gray-700 border border-gray-200 rounded-lg bg-gray-50" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href={{ route('dashboard') }}
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="text-sm font-medium text-gray-500 ms-1 md:ms-2">{{ Route::currentRouteName() }}</span>
                    </div>
                </li>
            </ol>
        </nav>
        <!-- End Breadcumb-->


        <!-- Main Content-->
        <div class="p-8 bg-white border-2 rounded-lg ">
            <div class="bg-white rounded ">
                <div class="text-center ">
                    <h4 class="text-2xl font-bold">Edit Artikel</h4>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="p-4 mb-1 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <span class="font-medium">{{ $error }}</span>
                        </div>
                    @endforeach
                @endif
                <hr class="h-px my-5 bg-gray-200 border-0">
                <form method="post" action="{{ route('article.update', $article['id']) }}"
                    class="max-w-xl pt-4 mx-auto sm:max-w-4xl" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                            Kategori</label>
                        <select id="selectCategory2"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="category_id">
                            <option>
                                Pilih Kategori
                            </option>
                            @foreach ($category as $c)
                                <option value="{{ $c['id'] }}" @if ($c['id'] == $article->category_id) selected @endif>
                                    {{ $c['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-2 mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
                        <input type="name" id="edit-product-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="title" required value="{{ $article['title'] }}" />
                    </div>
                    <div class="mb-5">
                        <label for="data"
                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Konten</label>
                        <textarea id="wsgi" name="content">{{ $article['content'] }}</textarea>
                    </div>
                    <div class="mb-5">
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Ringkasan /
                            Summary</label>
                        <textarea class="w-full" maxlength="150" name="excerpt">{{ $article['excerpt'] }}</textarea>
                    </div <div class="mb-5">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                    <img src="{{ asset($article->image_path) }}"
                        class="object-cover w-auto h-40 mb-2 border-2 rounded-md md:h-80" />
                    <div id="accordion-collapse" class="rounded-lg " data-accordion="collapse">
                        <h2 id="accordion-collapse-heading-2 ">
                            <button type="button"
                                class="flex items-center justify-between w-full h-5 gap-3 p-5 text-sm font-medium text-gray-500 border border-b-0 border-gray-300 rounded-lg cursor-pointer rtl:text-right bg-gray-50 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                                aria-controls="accordion-collapse-body-2">
                                <span>Ingin ganti gambar?</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">

                                <input id="image"
                                    class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="small_size" type="file" name="image">
                            </div>
                        </div>
                    </div>

            </div>


            <div class="my-3 mt-10 ms-0 sm:ms-12 ">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 text-center">Simpan
                    Artikel</button>
            </div>
            </form>


        </div>

    </div>
    </div>
@endsection
@push('wsgi')
    <script src="https://cdn.tiny.cloud/1/y86wfduvullpzpqktwbd90lzz04o8wx9p3vis3euu5u23xzn/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#wsgi',
            // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code '
        });
    </script>
@endpush
