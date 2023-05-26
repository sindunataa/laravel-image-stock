@extends('templates.main')
@section('title')
    {{ 'Create Authors' }}
@endsection
@section('main')
    <main id="main" class="main">

        <div class="pagetitle mt-2">
            <h1>Create Authors</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/galery">Authors</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('authors.index') }}"> Back</a>
            </div>
        </div>

        <section class="section profile mt-3">
            <form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <h6 class="card-title text-center">Upload Image</h6>
                            <div class="card-body flex-column align-items-center">
                                <div class="social-links">
                                    <input type="file" name="image" class="dropify" data-height="500" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body pt-3">

                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#form">Create
                                            Galery</button>
                                    </li>
                                </ul>

                                <div class="tab-content pt-2">
                                    <div class="tab-pane fade show active profile-edit pt-3" id="form">

                                        <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-lg-3 col-form-label">Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="name">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea class="form-control" name="address" placeholder="address" style="height: 100px"></textarea>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
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
