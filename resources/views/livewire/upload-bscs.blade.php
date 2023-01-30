<div>
    <x-loading-indicator />
    <form wire:submit.prevent="save"  class="form" >
        <div class="p-3">
            <div class="card  mb-3">
                <h4 class="card-header bg-dark text-center">Facture</h4>
                <div class="card-body">
                    <div class="mb-3">
                        <input class="form-control" type="file" wire:model="files" multiple>
                        @error('files')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class=" form-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary fw-bold">Ajouter</button> 
                </div>
            </div>
        </div>

        <div wire:loading wire:target="files">Uploading...</div>

    </form>

    {{-- <input type="file" wire:change="storeFileNames" multiple>

    <script>
        function storeFileNames() {
            let fileInput = document.querySelector('input[type="file"]');
            let files = fileInput.files;
            let fileNames = [];
    
            for (let i = 0; i < files.length; i++) {
                fileNames.push(files[i].name);
            }
    
            window.livewire.emit('storeFileNames', fileNames);
        }
    </script> --}}

</div>


