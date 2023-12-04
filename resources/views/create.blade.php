@extends(backpack_view('blank'))
@section('content')
<h4 class="text-center">This is Our Form</h4>
<a href="{{url('admin/demo')}}" class="d-print-none font-sm"><span><i class="la la-angle-double-left">Back To All <span>Demo</span></i></span></a>
<form method="post" action="{{route('demo.store')}}">
    @csrf
    <div class="form-group">
        <label class="form-label" for="name">Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label" for="email">Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label class="form-label" for="number">Number</label>
        <input type="number" name="number" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-info">Submit</button>
    </div>
</form>
@endsection