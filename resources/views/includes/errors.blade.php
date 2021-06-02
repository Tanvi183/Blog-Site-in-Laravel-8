@if ($errors->any())
    <div class="alert alert-danger mt-3 mb-3">
        @if ($errors->count() == 1)
            {{ $errors->first() }}
        @else
            <ul>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </ul>
        @endif
    </div>
@endif
