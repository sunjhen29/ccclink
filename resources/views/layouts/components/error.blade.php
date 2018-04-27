@if ($errors->any())
    <div class="callout callout-danger">
        <h4>Attention!!</h4>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
