@extends('layouts.app-master')

@section('title', "Product Types")
@section('title_small', "La liste de tous les types de produits.")

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
                <tr>
                    <th scope="col"><strong>Type</strong></th>
                    <th scope="col"><strong>Name</strong></th>
                    <th><strong>Actions</strong></th>
                </tr>
            </thead>
            <tbody>
            @foreach($product_types as $product_type)
                <tr>
                    <td>{{ $product_type->product_type_cd }}</td>
                    <td>{{ $product_type->name }}</td>

                    <td>
                        <form action="{{ route('product-type.destroy', $product_type) }}" method="POST" class="no-mrg">
                            <div class="action-grid">
                                <div style="padding-right: 5px;">
                                    <a type="button" title="Show" href="{{ route('product-type.show', $product_type) }}" class="fa-solid fa-eye fa-2xl"></a>
                                </div>

                                @if(Auth::user()->role === 'admin')
                                    <div>
                                        <a title="Edit" href="{{ route('product-type.edit', $product_type) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
                                    </div>
                                    @csrf
                                    @method('DELETE')

                                    <div>
                                        <button style="padding: 0;" title="Delete" type="submit" class="fa fa-fw fa-trash fa-2xl outline"></button>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </figure>

    {{ $product_types->links() }}
    <div style="text-align: center">
        <a href="#" class="fa-solid fa-circle-arrow-up fa-2xl" title="Go top page"></a>
    </div>
@endsection
