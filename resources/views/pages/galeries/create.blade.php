@extends('templates.main')

@section('title')
    {{'Add Galeries'}}
@endsection

@section('head')
<link href="{{ asset('/assets/plugins/wysiwyag/richtext.css')}}" rel="stylesheet" />
@endsection

@section('main')
<main id="main" class="main">
<section>
    <div class="app-content page-body">
        <div class="container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Add Cabor</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="/contingents">List Cabor</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Cabor</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add New Galeries</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('galeries.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="title" class="form-label">Title :</label>
                                        <input type="text" name="title" class="form-control" id="Title" placeholder="title">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="status" class="form-label">Status :</label>
                                        <select type="text" name="status" id="status" class="form-control">
                                            <option label="Pilih Salah Satu"></option>
                                            <option value="pending">Pending</option>
                                            <option value="publish">Publish</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="form-label">Deskripsi :</label>
                                        <textarea class="form-control mb-4" placeholder="Deskripsi" name="description" rows="3"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="album_id" class="form-label">Category :</label>
                                        <select type="text" name="album_id" class="form-control" placeholder="Category" id="album_id">
                                            <option label="Pilih Salah Satu"></option>
                                            @foreach ($albums as $album)
                                            
                                            <option value="{{$album->id}}">{{$album->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="author_id" class="form-label">Cabor :</label>
                                        <select type="text" name="author_id" class="form-control" placeholder="author_id" id="author_id">
                                            <option label="Pilih Salah Satu"></option>
                                            @foreach ($authors as $author)
                                            
                                            <option value="{{$author->id}}">{{$author->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="form-label">Upload Images :</label>
                                        <input type="file" name="image" class="dropify" data-height="250" data-width="200"/>
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
  $(document).ready(function(){
$('.dropify').dropify();

$('.dropify-clear').click(function(e){
  e.preventDefault();
  alert('Remove Hit');
  
});
});
</script>

<script src="{{asset ('/assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>
<script src="{{asset ('/assets/js/form-editor.js')}}"></script>
@endsection