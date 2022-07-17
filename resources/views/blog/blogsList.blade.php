@extends('app')
@section('page-Css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <div class="container bg-light pt-3">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10 card-title">
                        <h3>Blogs List</h3>
                    </div>
                    <div class="col-md-2 card-toolbar">
                        <a href="{{route('blogs.create')}}" class="btn btn-primary">
                        <span class="svg-icon svg-icon-md svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"></rect>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"></rect>
                                </g>
                            </svg>
                        </span>New Blog</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <span class="fs-5">Select Date</span>
                    <input id="datepicker" data-provide="datepicker">
                    <button type="button" id="removeFilter" class="btn btn-danger pl-2">Remove Filter</button>
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogsData as $key => $blog)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$blog->title}}</td>
                                <td>{{$blog->description}}</td>
                                <td>
                                    @foreach ($blog->categories as $categories)
                                        <span class="badge text-bg-primary">
                                            {{$categories->category->name}}
                                        </span>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
@section('page-Js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#removeFilter').hide();
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const filterDate = urlParams.get('filterDate');
            if(filterDate){
                $('#datepicker').val(filterDate);
                $('#removeFilter').show();
            }
            $('#datepicker').datepicker({
                format: 'dd/mm/yyyy',
                endDate: Date(),
                todayHighlight: true,
            });
            $('#datepicker').on('changeDate', function() {
                window.location = "{{route('blogs.index', ['filterDate' => 'date'])}}".replace('date', $('#datepicker').datepicker('getFormattedDate'));
            });
            $('#removeFilter').on('click', function(){
                window.location = "{{route('blogs.index')}}";
            });
        });
    </script>
@endsection