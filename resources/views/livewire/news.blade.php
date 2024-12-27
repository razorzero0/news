<div class="relative p-4 mt-20 md:mt-24">
    <div class="max-w-3xl mx-auto">
        @include('livewire.news_partials.news-content')
        <hr class="my-5 border-gray-600 ">
        @include('livewire.news_partials.news-latest-post')
        @include('livewire.news_partials.news-comments')
    </div>
</div>

@push('scripts')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@endpush
@script
    <script>
        $wire.on('alert', (event) => {
            Toastify({
                text: event[0]['message'],
                duration: 3000,
                gravity: "bottom", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "black",
                },
                onClick: function() {} // Callback after click
            }).showToast();
        });
    </script>
@endscript
