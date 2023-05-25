@extends('templates.main')

@section('title')
    {{'Authors'}}
@endsection

@section('main')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Galeries</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item">Authors</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif 

<div class="pull-center mb-3">
  <a class="btn btn-success" href="{{ route('authors.create') }}"><i class="bi bi-plus-circle"></i> Add Authors</a>
</div>

    <section class="section">
      <div class="row align-items-top">
       @foreach ($authors as $author)  
       <div class="col-lg-3">
          <div class="card mt-3" class="center">
            
            <div class="card-body">
              
              <h1 class="card-title"><strong>{{ $author->name }}</strong></h1>
              
              <div class="card">
                    <img src="/uploads/{{ $author->image }}" class="card-img-top" alt="...">
                  <div class="card-body">

                  
                    
                    <h6 class="card-text mt-2 mb-2">{{ $author->address }}</h6>
          
                    <form action="{{ route('authors.destroy',$author->id) }}" method="POST">
        
                      {{-- <a href="{{ route('galeries.show',$author->id) }}">
                        <button type="button" class="btn btn-info"><i class="bi bi-info-lg"></i></button>
                      </a> --}}

                      <a href="{{ route('galeries.edit',$author->id) }}"> 
                        <button type="button" class="btn btn-success"><i class="bi bi-pencil-fill"></i></i></button>
                      </a>
       
                      @csrf
                      @method('DELETE')
          
                      <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">
                        <i class="bi bi-trash3"></i>
                      </button>
                  </form>

                  </div>
              </div>
            </div>
          </div>
        </div>
             
             @endforeach
                
             {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Galeries</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">

                    <form action="{{ route('galery.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" placeholder="Name">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Slug</label>
                      <div class="col-sm-10">
                        <input type="text" name="slug" class="form-control" placeholder="Slug">
                      </div>
                    </div>
  
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-10">
                        <select type="text" name="status" class="form-control mb-2" placeholder="Status">
                          <option selected>Open this select menu</option>
                          <option value="1">Publish</option>
                          <option value="2">Pending</option>
                        </select>
                      </div>
                    </div>
  
                    <div class="row mb-3">
                      <label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="content" placeholder="Detail" style="height: 100px"></textarea>
                      </div>
                    </div>
  
                    <div class="row mb-3">
                      <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                      <div class="col-sm-10">
                        <input type="file" name="image" class="dropify" data-height="300" />
                      </div>
                    </div>
  
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Albums_Id</label>
                      <div class="col-sm-10">
                        <select type="text" name="albums_id" class="form-control" placeholder="albums_id">
  
                          @foreach ($galery as $galerie)
  
                          <option value="{{$galerie->id}}">{{$galerie->title}}</option>
                              
                          @endforeach
                        
                        </select>
                      </div>
                    </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
            
                  </form>
                  </div>
                </div>
              </div>
             </div> --}}
      </div>
    </section>
                  
         

{{ $authors->links() }}

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
<script>
  $(document). ready(function(){
    $('img').lazyload();
  });
</script>

@endsection