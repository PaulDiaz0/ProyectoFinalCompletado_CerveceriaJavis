@if (session()->has('mensaje'))

    <div class="alert {{ session('alert-type', 'alert-info') }}  alert-dismissible fade show" role="alert">
        {{ session('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

  @endif
