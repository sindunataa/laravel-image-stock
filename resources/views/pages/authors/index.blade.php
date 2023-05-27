@extends('templates.main')

@section('title')
    {{ 'Authors' }}
@endsection
@section('head')
    <!-- Data table css -->
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection
@section('js')
    <!-- Data tables -->
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.js') }}"></script>
@endsection
@section('main')
    <main id="main" class="main">
        <section>
            <div class="app-content page-body">
                <div class="container">

                    <!--Page header-->
                    <div class="page-header">
                        <div class="page-leftheader">
                            <h4 class="page-title">List Authors</h4>
                        </div>
                        <div class="page-rightheader ml-auto d-lg-flex d-none">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon"
                                            xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                            width="24">
                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                            <path
                                                d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z" />
                                            <path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3" />
                                        </svg><span class="breadcrumb-icon"> Home</span></a></li>
                                <li class="breadcrumb-item"><a href="/articles">List Authors</a></li>
                            </ol>
                        </div>
                    </div>
                    <!--End Page header-->

                    <!-- Row -->
                    <div class="row">

                        <div class="col-md-12 col-lg-12">

                            <div class="card">
                                <div class="card-header">
                                    <div class="col mb-4 mt-4">
                                        <a href="{{ route('authors.create') }}" class="btn btn-primary"><i
                                                class="fe fe-plus"></i> Add Authors</a>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped text-nowrap mb-0" id="example1">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($authors as $author)
                                                    <tr class="text-center">
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $author->name }}</td>
                                                        <td>{{ $author->address }}</td>
                                                        <td> <img src="{{ asset('uploads/' . $author->image) }}"
                                                                alt="" width="250"> </td>
                                                        <td>
                                                            <form action="{{ route('authors.destroy', $author->id) }}"
                                                                method="POST">

                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('authors.edit', $author->id) }}">Edit</a>

                                                                @csrf
                                                                @method('DELETE')

                                                                <button onclick="return confirm('Are you sure?')"
                                                                    type="submit"
                                                                    class="btn btn-sm btn-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
            </div>



            {{-- {!! $contingents->links() !!} --}}
        </section>

    </main>
@endsection
