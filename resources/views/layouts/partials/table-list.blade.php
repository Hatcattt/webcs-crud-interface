@section('content')
    <div class="grid">
        <details>
            <summary class="summary-table"><span class="fa-solid fa-file-invoice-dollar"></span> Accounts Gestion</summary>
            <a href="{{ route('account.index')}}">
                <button>Account</button>
            </a>
            <a href="{{ route('acc-transaction.index')}}">
                <button>Account Transaction</button>
            </a>
        </details>
        <details>
            <summary class="summary-table"><span class="fa-solid fa-house-user"></span> Internal Management</summary>
            <a href="{{ route('branch.index')}}">
                <button>Branch</button>
            </a>
            <a href="{{ route('department.index')}}">
                <button>Department</button>
            </a>
            <a href="{{ route('employee.index')}}">
                <button>Employee</button>
            </a>
        </details>
        <details>
            <summary class="summary-table"><span class="fa-solid fa-hammer"></span> Product Gestion</summary>
            <a href="{{ route('product.index')}}">
                <button>Product</button>
            </a>
            <a href="{{ route('product-type.index')}}">
                <button>Product Type</button>
            </a>
        </details>
        <details>
            <summary class="summary-table"><span class="fa-solid fa-people-arrows"></span> Customers Gestion</summary>
            <a href="{{ route('customer.index')}}">
                <button>All</button>
            </a>
            <a href="{{ route('business.index')}}">
                <button>Business</button>
            </a>
            <a href="{{ route('individual.index')}}">
                <button>Individual</button>
            </a>
            <a href="{{ route('officer.index')}}">
                <button>Officer</button>
            </a>
        </details>
    </div>
@endsection
