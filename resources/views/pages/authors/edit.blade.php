@extends('templates.main')

@section('title')
    {{ 'Edit Galeries' }}
@endsection

@section('main')
    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-10">

                    <div class="pagetitle">
                        <h1>Edit Galery</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item"><a href="/authors">Galeries</a></li>
                                <li class="breadcrumb-item active">{{ $edit->name }}</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Galeries</h5>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- General Form Elements -->
                            <form action="{{ route('authors.update', ['id' => $edit->id]) }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{ $edit->name }}"
                                            class="form-control" placeholder="Name">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="address" value="{{ $edit->address }}"
                                            class="form-control" placeholder="address">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                    <div class="col-sm-10">
                                        <input type="file" data-default-file="/uploads/{{ $edit->image }}"
                                            name="image" class="dropify" data-height="300" />
                                        {{-- <img src="/image/{{ $galery->image }}" width="300px"> --}}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Submit Button</label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit Form</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.dropify').dropify();

            $('.dropify-clear').click(function(e) {
                e.preventDefault();
                alert('Remove Hit');

            });
        });
    </script>
@endsection
