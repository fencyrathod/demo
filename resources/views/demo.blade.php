@extends(backpack_view('blank'))
@section('content')
<h3 class="text-center">This Is Demo Page</h3>
<a class="text-center" href="{{ backpack_url('create') }}"><button class="btn btn-info" id="btn"><i class="la la-plus"></i>Add New Customer</button></a>
@endsection
