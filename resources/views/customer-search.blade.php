@extends('template')
@section('content')
    <center>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ url('customer-journey') }}" method="GET">
                        @csrf
                       <label for="">SEARCH CUSTOMERS
                       </label>
                        <select class="form-control  Select mt-2 " name="cid" onchange="this.form.submit()">
                            <option value="" class="text-center">Search by name/mobile</option>
                            @foreach ($data as $row)
                                <option value="{{ $row->id }}">{{ $row->name }} - {{ $row->mobile }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </center>
@endsection('content')
