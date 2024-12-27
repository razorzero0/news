<section class="py-8 ">

    <div class="container ">
        <h2 class="mb-4 text-xl font-bold text-gray-200"> Comments</h2>
        <div class="space-y-3">
            @foreach ($comments as $comment)
                <div class="p-4 rounded-lg shadow-lg bg-gradient-to-br from-slate-800 to-slate-950 shadow-slate-950">
                    <div class="flex items-center mb-2">
                        <img src="{{ asset('assets/img/guest.png') }}" alt="User Avatar"
                            class="w-10 h-10 mr-3 rounded-full">
                        <div>
                            <h3 class="text-sm text-gray-100 md:text-md">{{ $comment->user->name }}</h3>
                            <p class="text-xs text-gray-400">Posted on
                                {{ \Carbon\Carbon::parse($comment->created_at)->translatedFormat('d M, Y H:i') }}
                            </p>
                        </div>
                    </div>
                    <p class="font-mono text-gray-200">{{ $comment->comment }}</p>

                </div>
            @endforeach
        </div>


        <!-- Add Comment Form -->
        <form class="px-6 py-4 mt-8 rounded-lg shadow-lg bg-slate-800 shadow-slate-950"
            wire:submit.prevent="postComment">
            <h3 class="mb-2 text-lg font-semibold text-gray-200">Add a Comment</h3>

            <div class="mb-4">

                <textarea id="comment" name="comment" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-slate-200"
                    required placeholder="Write your comment here..." wire:model.defer="comment"></textarea>
            </div>
            <div class="flex justify-end">
                @if (auth()->check())
                    <button type="submit"
                        class="text-white bg-[#050708] hover:bg-[#050708]/70 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 w-36 justify-center"
                        wire:loading.attr="disabled">
                        <span wire:loading.remove class="w-full text-center"> Post Comment</span>
                        <div wire:loading class="text-center">
                            <svg aria-hidden="true"
                                class="inline w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                        </div>
                    </button>
                @else
                    <a href="{{ route('login') }}" wire:navigate type="submit"
                        class="text-white bg-[#050708] hover:bg-[#050708]/70 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 justify-center"
                        wire:loading.attr="disabled">
                        Login to Comment

                    </a>
                @endif

            </div>


        </form>
    </div>
</section>
