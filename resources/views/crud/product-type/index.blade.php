@extends('layouts.app-master')

@section('title', "Product Type")
@section('title_small', "Voici le contenu de la table.")

@section('content')

    @if ($message = Session::get('error'))
        <div><p style="color: red">{{ $message }}</p></div>
    @endif

    @if ($message = Session::get('success'))
        <div><p style="color: green">{{ $message }}</p></div>
    @endif
    @if (Auth::user()->role === 'admin')
        <a title="Create new one" role="button" href="{{ route('product-type.create') }}">CREATE</a>
    @endif
    <figure>
        <table>
            <thead>
            @include('layouts.partials.columns-name')

            </thead>
            <tbody>
            @foreach($product_types as $product_type)
                <tr>
                    <td>{{ $product_type->product_type_cd }}</td>
                    <td>{{ $product_type->name }}</td>

                    <td>
                        <form action="{{ route('product-type.destroy', $product_type) }}" method="POST" id="del">
                                <a type="button" title="Show" href="{{ route('product-type.show', $product_type) }}" class="fa-solid fa-eye fa-2xl"></a>

                            @if(Auth::user()->role === 'admin')
                                <a title="Edit" href="{{ route('product-type.edit', $product_type) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
                                @csrf
                                @method('DELETE')
                                <button title="Delete" type="submit" class="fa fa-fw fa-trash fa-2xl outline"></button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </figure>
@endsection
