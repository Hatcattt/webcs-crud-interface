@if($errors->any())
    <div>
        <ul class="bloc-error">
            @foreach($errors->all() as $error)
                <li class="msg-error">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif