@extends('layouts.app-master')

@section('title', "Products")
@section('title_small', "Tous les produits répertoriés dans votre organisation.")

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
                <tr>
                    <th scope="col"><strong>Short Name</strong></th>
                    <th scope="col"><strong>Offered Date</strong></th>
                    <th scope="col"><strong>Retired Date</strong></th>
                    <th scope="col"><strong>Name</strong></th>
                    <th scope="col"><strong>Type</strong></th>
                    <th><strong>Actions</strong></th>
                </tr>
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
                        <form action="{{ route('product.destroy', $product) }}" method="POST" class="no-mrg">
                            <div class="action-grid">
                                <div style="padding-right: 5px;">
                                    <a type="button" title="Show" href="{{ route('product.show', $product) }}" class="fa-solid fa-eye fa-2xl"></a>
                                </div>

                                @if(Auth::user()->role === 'admin')
                                    <div>
                                        <a title="Edit" href="{{ route('product.edit', $product) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
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

    {{ $products->links() }}
    <div style="text-align: center">
        <a href="#" class="fa-solid fa-circle-arrow-up fa-2xl" title="Go top page"></a>
    </div>
@endsection
