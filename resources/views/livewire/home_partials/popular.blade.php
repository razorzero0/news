<div class="sm:col-span-6 lg:col-span-6">
    <div class="flex mb-5 text-sm border-b border-slate-600">
        <div class="flex items-center pb-2 pr-2 uppercase ">
            <a href="#" class="inline-block font-bold text-md"> <span class="text-slate-100">POPULAR
                    POST</span>
            </a>
        </div>
    </div>
    <div class="flex flex-col gap-5 sm:gap-4 ">
        @foreach ($popular as $fl)
            <div class="flex items-start h-28">
                <a href="#" class="mr-3 ">
                    <img src="{{ asset($fl->image_path) }}" alt="Image description"
                        class="object-cover rounded-md max-w-28 h-28" loading="lazy" />
                </a>
                <div class="flex flex-col justify-between min-h-full text-sm">
                    <a href="{{ route('category-find', $fl->category->name) }}" class="text-xs text-indigo-500"
                        wire:navigate>
                        {{ $fl->category->name }}
                    </a>
                    <a href="{{ route('news', $fl->slug) }}"
                        class="font-medium leading-4 text-gray-200 text-md md:text-lg hover:text-indigo-600"
                        wire:navigate>
                        {{ $fl['title'] }}
                    </a>
                    <div class="text-xs md:text-sm text-slate-400">
                        <small>by AlgooraNews -
                            {{ \Carbon\Carbon::parse($fl->published_at)->translatedFormat('d M, Y') }}
                        </small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
