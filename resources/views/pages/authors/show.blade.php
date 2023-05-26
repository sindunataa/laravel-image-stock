@extends('templates.main')

@section('title')
    {{'Show Photo'}}
@endsection

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Show Galery</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item"><a href="/galery">Galeries</a></li>
        <li class="breadcrumb-item active">{{ $galery->name }}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-6">

        <div class="card">
          <div class="card-body pt-4 d-flex flex-column align-items-center">
            <div class="social-links">
              <img src="/image/{{ $galery->image }}" class="d-block w-100">
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
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#edit">Edit Galery</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="overview">
                <h5 class="card-title">About</h5>
                <p class="small fst-italic">{{ $galery->content }}</p>

                <h5 class="card-title">Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Name</div>
                  <div class="col-lg-9 col-md-8">{{ $galery->name }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Slug</div>
                  <div class="col-lg-9 col-md-8">{{ $galery->slug }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Status</div>
                  <div class="col-lg-9 col-md-8">
                    @if($galery->status == 'Publish')
                    <td>
                        <span class="badge bg-success tips">
                              {{ $galery->status }}
                        </span>
                    </td>
                      @elseif($galery->status == 'Pending')
                    <td>
                        <span class="badge bg-danger">
                              {{ $galery->status }}
                        </span>
                    </td>
                    @endif
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Albums ID</div>
                  <div class="col-lg-9 col-md-8"> {{ $galery->albums_id }}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="edit">

                <!-- Profile Edit Form -->
                <form action="{{ route('galery.update',['id'=> $galery->id]) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="file" data-default-file="/image/{{ $galery->image }}" name="image" class="dropify" data-height="300" />

                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text" name="name" value="{{ $galery->name }}" class="form-control" placeholder="Name">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="about" class="col-md-4 col-lg-3 col-form-label">Slug</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text" name="slug" value="{{ $galery->slug }}" class="form-control" placeholder="Slug">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Status</label>
                    <div class="col-md-8 col-lg-9">
                      <select type="text" name="status" value="{{ $galery->status }}" class="form-control mb-2" placeholder="Status">
                        <option value="1">Publish</option>
                        <option value="2">Pending</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Content</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea class="form-control" name="content" placeholder="Detail" style="height: 100px">{{ $galery->content }}</textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Albums ID</label>
                    <div class="col-md-8 col-lg-9">
                      <select type="text" name="albums_id" class="form-control" placeholder="albums_id">
                        @foreach ($galeries as $galeries)
                        <option value="{{$galeries->id}}" {{($galeries->id == $galery->albums_id)?"selected":"";}}>{{$galeries->title}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                 

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>

                </form><!-- End Profile Edit Form -->

              </div>

            </div><!-- End Bordered Tabs -->

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