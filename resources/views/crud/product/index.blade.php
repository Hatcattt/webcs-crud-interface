@extends('layouts.app-master')

@section('title', "Product")
@section('title_small', "Voici le contenu de la table.")

@section('content')

    @if ($message = Session::get('error'))
        <div><p style="color: red">{{ $message }}</p></div>
    @endif

    @if ($message = Session::get('success'))
        <div><p style="color: green">{{ $message }}</p></div>
    @endif
    @if (Auth::user()->role === 'admin')
        <a title="Create new one" role="button" href="{{ route('product.create') }}">CREATE</a>
    @endif
    <figure>
        <table>
            <thead>
            @include('layouts.partials.columns-name')

            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->product_cd }}</td>
                    <td>{{ $product->date_offered }}</td>
                    <td>{{ $product->date_retired }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->product_type_cd }}</td>

                    <td>
                        <form action="{{ route('product.destroy', $product) }}" method="POST" id="del">
                                <a type="button" title="Show" href="{{ route('product.show', $product) }}" class="fa-solid fa-eye fa-2xl"></a>

                            @if(Auth::user()->role === 'admin')
                                <a title="Edit" href="{{ route('product.edit', $product) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
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
