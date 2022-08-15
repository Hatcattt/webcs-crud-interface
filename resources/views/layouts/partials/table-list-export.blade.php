@section('content')
    <a href="{{ route('account-export')}}">
        <button class="outline">Account</button>
    </a>
    <a href="{{ route('acc-transaction-export')}}">
        <button class="outline">Acc Transaction</button>
    </a>
    <a href="{{ route('branch-export')}}">
        <button class="outline">Branch</button>
    </a>
    <a href="{{ route('business-export')}}">
        <button class="outline">Business</button>
    </a>
    <a href="{{ route('customer-export')}}">
        <button class="outline">Customer</button>
    </a>
    <a href="{{ route('department-export')}}">
        <button class="outline">Department</button>
    </a>
    <a href="{{ route('employee-export')}}">
        <button class="outline">Employee</button>
    </a>
    <a href="{{ route('individual-export')}}">
        <button class="outline">Individual</button>
    </a>
    <a href="{{ route('officer-export')}}">
        <button class="outline">Officer</button>
    </a>
    <a href="{{ route('product-export')}}">
        <button class="outline">Product</button>
    </a>
    <a href="{{ route('product-type-export')}}">
        <button class="outline">Product Type</button>
    </a>
@endsection
