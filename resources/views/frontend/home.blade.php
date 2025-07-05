@extends('frontend.layouts.app')
@section('content')
 <div class="row">
    @foreach ( $data as $info )


        <div class="col-lg-4">
          <div class="image-wrap-2">
            <div class="image-info">
              <h2 class="mb-3">{{ $info->name }}</h2>
              <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>
            </div>
            <img src="{{ asset( $info->image)   }}" alt="Image" class="img-fluid">
          </div>
      </div>

         @endforeach


@endsection


{{-- <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top" --}}