@extends('layouts.app-master')

@section('title', "Employees")
@section('title_small', "La liste de tous les employés présents dans votre organisation.")

@section('content')

    @if ($message = Session::get('error'))
        <div><p style="color: red">{{ $message }}</p></div>
    @endif

    @if ($message = Session::get('success'))
        <div><p style="color: green">{{ $message }}</p></div>
    @endif
    @if (Auth::user()->role === 'admin')
        <a title="Create new one" role="button" href="{{ route('employee.create') }}">CREATE</a>
    @endif
    <figure>
        <table>
            <thead>
                <tr>
                    <th scope="col"><strong>N°</strong></th>
                    <th scope="col"><strong>End Date</strong></th>
                    <th scope="col"><strong>First Name</strong></th>
                    <th scope="col"><strong>Last Name</strong></th>
                    <th scope="col"><strong>Start Name</strong></th>
                    <th scope="col"><strong>Title</strong></th>
                    <th scope="col"><strong>Assigned Branch</strong></th>
                    <th scope="col"><strong>Department</strong></th>
                    <th scope="col"><strong>Superior</strong></th>
                    <th><strong>Actions</strong></th>
                </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->emp_id }}</td>
                    <td>{{ $employee->end_date }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->start_date }}</td>
                    <td>{{ $employee->title }}</td>
                    <td>{{ $employee->branch->name }}</td>
                    <td>{{ $employee->department->name }}</td>
                        @if($employee->superior_emp_id == null || $employee->superior_emp_id == $employee->emp_id)
                            <td>None</td>
                        @else
                            <td>{{ $employee->employee->full_name }}</td>
                        @endif
                    <td>
                        <form action="{{ route('employee.destroy', $employee) }}" method="POST" class="no-mrg">
                            <div class="action-grid">
                                <div style="padding-right: 5px;">
                                    <a type="button" title="Show" href="{{ route('employee.show', $employee) }}" class="fa-solid fa-eye fa-2xl"></a>
                                </div>

                                @if(Auth::user()->role === 'admin')
                                    <div>
                                        <a title="Edit" href="{{ route('employee.edit', $employee) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
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

    {{ $employees->links() }}
    <div style="text-align: center">
        <a href="#" class="fa-solid fa-circle-arrow-up fa-2xl" title="Go top page"></a>
    </div>
@endsection
