@extends('templates.main')

@section('title')
    {{'Edit Galeries'}}
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
                  <li class="breadcrumb-item"><a href="/galery">Galeries</a></li>
                  <li class="breadcrumb-item active">{{ $galery->name }}</li>
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
                <form action="{{ route('galery.update',['id'=> $galery->id]) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" value="{{ $galery->name }}" class="form-control" placeholder="Name">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                      <input type="text" name="slug" value="{{ $galery->slug }}" class="form-control" placeholder="Slug">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                      <select type="text" name="status" value="{{ $galery->status }}" class="form-control mb-2" placeholder="Status">
                        <option value="1">Publish</option>
                        <option value="2">Pending</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="content" placeholder="Detail" style="height: 100px">{{ $galery->content }}</textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                    <div class="col-sm-10">
                      <input type="file" data-default-file="/image/{{ $galery->image }}" name="image" class="dropify" data-height="300" />
                      {{-- <img src="/image/{{ $galery->image }}" width="300px"> --}}
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Albums_Id</label>
                    <div class="col-sm-10">
                      <select type="text" name="albums_id" class="form-control" placeholder="albums_id">
                        @foreach ($galeries as $galeries)
                        <option value="{{$galeries->id}}" {{($galeries->id == $galery->albums_id)?"selected":"";}}>{{$galeries->title}}</option>
                        @endforeach
                      </select>
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
  $(document).ready(function(){
$('.dropify').dropify();

$('.dropify-clear').click(function(e){
  e.preventDefault();
  alert('Remove Hit');
  
});
});
</script>
@endsection