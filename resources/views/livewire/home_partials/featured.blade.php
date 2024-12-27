<div>

    <div class="h-56 overflow-hidden text-center rounded-t-lg">
        <img src="{{ asset($featured->image_path) }}" alt="Woman holding a mug"
            class="object-cover w-full h-full rounded-t-lg lazyload" loading="lazy" />
    </div>


    <div class="flex flex-col justify-between p-4 mt-3 leading-normal rounded-b lg:rounded-b-none lg:rounded-r">
        <div class="">
            <a href={{ route('category-find', $featured->category->name) }}
                class="flex items-center mb-3 text-xs font-medium text-indigo-400 uppercase transition duration-500 ease-in-out hover:text-indigo-600"
                wire:navigate>
                {{ $featured->category->name }}
            </a>
            <a href={{ route('news', $featured->slug) }}
                class="mb-2 text-lg font-bold text-gray-100 transition duration-500 ease-in-out hover:text-indigo-500"
                wire:navigate>
                {{ $featured->title }} </a>

        </div>
        <div class="text-slate-400">
            <small>by AlgooraNews -
                {{ \Carbon\Carbon::parse($featured->published_at)->translatedFormat('d M, Y') }}
            </small>
        </div>
    </div>


</div>
