@if($errors->any())
    <div>
        <ul class="bloc-error">
            @foreach($errors->all() as $error)
                <li class="msg-error">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{--@if(Session::get('success', false))--}}
{{--    <?php $data = Session::get('success'); ?>--}}
{{--    @if (is_array($data))--}}
{{--        @foreach ($data as $msg)--}}
{{--            <div>--}}
{{--                {{ $msg }}--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    @else--}}
{{--        <div>--}}
{{--            {{ $data }}--}}
{{--        </div>--}}
{{--    @endif--}}
{{--@endif--}}
