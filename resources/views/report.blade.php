@extends(backpack_view('blank'))
@section('content')

<h1 class="text-center">This Is Report Page</h1>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Number</th>
    </tr>
    @foreach($data as $d)
    <tr>
        <td>{{$d->id}}</td>
        <td>{{$d->name}}</td>
        <td>{{$d->email}}</td>
        <td>{{$d->number}}</td>
    </tr>
    @endforeach
</table>
@endsection