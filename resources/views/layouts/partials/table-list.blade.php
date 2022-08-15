@section('content')
    <a href="{{ route('account.index')}}">
        <button>Account</button>
    </a>
    <a href="{{ route('acc-transaction.index')}}">
        <button>Acc Transaction</button>
    </a>
    <a href="{{ route('branch.index')}}">
        <button>Branch</button>
    </a>
    <a href="{{ route('business.index')}}">
        <button>Business</button>
    </a>
    <a href="{{ route('customer.index')}}">
        <button>Customer</button>
    </a>
    <a href="{{ route('department.index')}}">
        <button>Department</button>
    </a>
    <a href="{{ route('employee.index')}}">
        <button>Employee</button>
    </a>
    <a href="{{ route('individual.index')}}">
        <button>Individual</button>
    </a>
    <a href="{{ route('officer.index')}}">
        <button>Officer</button>
    </a>
    <a href="{{ route('product.index')}}">
        <button>Product</button>
    </a>
    <a href="{{ route('product-type.index')}}">
        <button>Product Type</button>
    </a>
@endsection
