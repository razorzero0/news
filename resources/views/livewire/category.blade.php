<div class="relative max-w-screen-xl p-5 mx-auto mt-24 md:mt-20 sm:p-10 md:p-16">

    <div class="">
        <div class="flex justify-between mb-5 text-sm border-b border-slate-700">
            <div class="flex items-center pb-2 pr-2 text-slate-100 ">

                <p href="#" class="inline-block text-lg font-bold">{{ $categoryName }}</i></p>
            </div>

        </div>


        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 md:grid-cols-3">

            @foreach ($articles as $article)
                <div class="flex flex-col overflow-hidden rounded shadow-lg bg-slate-800 shadow-slate-950">
                    <a href="#"></a>
                    <div class="relative"><a href="#">
                            <img class="object-cover w-full h-60" src="{{ asset($article->image_path) }}"
                                alt="Sunset in the mountains">
                            <div
                                class="absolute top-0 bottom-0 left-0 right-0 transition duration-300 bg-gray-900 opacity-25 hover:bg-transparent">
                            </div>
                        </a>
                        <a href={{ route('category-find', $article->category->name) }} wire:navigate>
                            <div
                                class="absolute top-0 right-0 px-4 py-2 mt-3 mr-3 text-xs text-white transition duration-500 ease-in-out bg-indigo-600 hover:bg-white hover:text-indigo-600">
                                {{ $article->category->name }}
                            </div>
                        </a>
                    </div>
                    <div class="px-6 py-4 mb-auto">
                        <a href={{ route('news', $article->slug) }}
                            class="inline-block mb-2 text-lg font-medium transition duration-500 ease-in-out hover:text-indigo-600 text-slate-200 "
                            wire:navigate>{{ $article->title }}</a>
                        <p class="py-2 text-xs text-slate-400">
                            {{ \Illuminate\Support\Str::limit($article->excerpt, 100, '...') }}
                        </p>
                    </div>
                    <div class="flex flex-row items-center justify-between px-6 py-3 bg-slate-900 text-slate-300">

                        <small class="text-xs font-light">by AlgooraNews -
                            {{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('d M, Y') }}
                        </small>


                        <span href="#" class="flex flex-row items-center py-1 mr-1 text-xs font-regular">
                            <svg class="h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                </path>
                            </svg>
                            <span class="ml-1">{{ $article->comments->count() }} Comments</span>
                        </span>
                    </div>
                </div>
            @endforeach




        </div>
    </div>
</div>
