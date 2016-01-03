@if ($errors->count())
    <ul class="message-bag message-bag--error">
        @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif


