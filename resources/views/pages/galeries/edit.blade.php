@extends('templates.main')

@section('title')
    {{ 'Edit Cabor' }}
@endsection


@section('main')
    <main id="main" class="main">
        <section>
            <div class="app-content page-body">
                <div class="container">

                    <!--Page header-->
                    <div class="page-header">
                        <div class="page-leftheader">
                            <h4 class="page-title">Edit Galeries</h4>
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
                                <li class="breadcrumb-item"><a href="/galeries">List Galeries</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Galeries</li>
                            </ol>
                        </div>
                    </div>
                    <!--End Page header-->

                    <!-- Row -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Galeries</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('galeries.update', ['id' => $edit->id]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="">
                                            <div class="form-group">
                                                <label for="title" class="form-label">Title :</label>
                                                <input type="text" name="title" value="{{ $edit->title }}"
                                                    class="form-control" id="title" placeholder="title">
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="form-label">Status :</label>
                                                <select type="text" name="status" id="status" class="form-control">
                                                    <option label="Pilih Salah Satu"></option>
                                                    <option value="pending" {{($edit->status == 'Pending') ? "selected":"";}}>Pending</option>
                                                    <option value="publish" {{($edit->status == 'Publish') ? "selected":"";}}>Publish</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="form-label">Deskripsi :</label>
                                                <textarea class="form-control mb-4" placeholder="Deskripsi" name="description" rows="3">{{ $edit->description }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="album_id" class="form-label">Category :</label>
                                                <select type="text" name="album_id" class="form-control"
                                                    placeholder="album_id" id="album_id">
                                                    <option label="Pilih Salah Satu"></option>
                                                    @foreach ($album as $albums)
                                                        <option value="{{ $albums->id }}"
                                                            {{ $albums->id == $edit->album_id ? 'selected' : '' }}>
                                                            {{ $albums->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="author_id" class="form-label">Author :</label>
                                                <select type="text" name="author_id" class="form-control"
                                                    placeholder="author_id" id="author_id">
                                                    <option label="Pilih Salah Satu"></option>
                                                    @foreach ($author as $authors)
                                                        <option value="{{ $authors->id }}"
                                                            {{ $authors->id == $edit->author_id ? 'selected' : '' }}>
                                                            {{ $authors->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="image" class="form-label">Image :</label>
                                                <input type="file"
                                                    data-default-file="{{ asset('uploads/' . $edit->image) }}"
                                                    name="image" class="dropify" data-height="300" />
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2 mb-0">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End Row -->

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
