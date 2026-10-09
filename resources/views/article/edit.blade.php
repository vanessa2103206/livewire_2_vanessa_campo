<x-layout>
    <div class="container-fluid vh-100">
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <h1 class="display-5 text-center">Modifica il tuo articolo!</h1>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-6">
                @livewire('article-edit', compact('article'))
            </div>
        </div>
    </div>
</x-layout>
