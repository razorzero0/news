<div class="relative max-w-screen-xl p-5 mx-auto mt-24 md:mt-20 sm:p-10 md:p-16">


    <div class="grid grid-cols-1 gap-10 sm:grid-cols-12">


        <div class="sm:col-span-6 lg:col-span-6">
            <div class="flex mb-5 text-sm border-b border-slate-600">
                <div class="flex items-center pb-2 pr-2 uppercase ">
                    <a href="#" class="inline-block font-bold text-md"> <span class="text-slate-100">FEATURED
                            POST</span>
                    </a>
                </div>
            </div>
            <div class="bg-gray-800 rounded-lg ">
                <livewire:home.featured lazy />
            </div>
        </div>


        @include('livewire.home_partials.popular')

    </div>


    @include('livewire.home_partials.otherPost')



</div>
