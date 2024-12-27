<div class="p-4 pt-8 pb-12 mt-3 rounded-md shadow-lg sm:p-8 sm:pb-8 col-12 bg-slate-800 shadow-slate-950">
    <div class="flex mb-5 text-sm border-b border-slate-600">
        <div class="flex items-center pb-2 pr-2 uppercase ">
            <a href="#" class="inline-block font-bold text-md"> <span class="text-slate-100">Latest
                    POST</span>
            </a>
        </div>
    </div>
    <div class="flex flex-col gap-5 sm:gap-4 ">
        @foreach ($otherPost as $fl)
            <div class="flex items-start h-20 mb-3">
                <a href="#" class="inline-block mr-3">
                    <div class="w-20 h-20 bg-center bg-cover rounded"
                        style="background-image:url({{ asset($fl->image_path) }})">
                    </div>
                </a>
                <div class="flex flex-col justify-between min-h-full text-sm ">
                    <a href={{ route('category-find', $fl->category->name) }} class="text-xs text-indigo-500"
                        wire:navigate>{{ $fl->category->name }}</a>
                    <a href={{ route('news', $fl->slug) }} wire:navigate
                        class="text-sm leading-none text-gray-200 md:font-medium md:text-lg hover:text-indigo-600">{{ $fl['title'] }}</a>
                    <div class="text-slate-400">
                        <small>by AlgooraNews -
                            {{ \Carbon\Carbon::parse($fl->published_at)->translatedFormat('d M, Y') }}
                        </small>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

</div>
