
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>My Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('product.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">My Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    {{-- main content --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if ($products->count() > 0)
                 @foreach ($products as $product)
                 <div class="col-xl-3 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <img src="{{ asset('assets/img') }}/{{ $product->image }}" style="height: 150px; width: 100%; object-fit: contain;">
                        </div>
                        <div class="card-body p-3" >
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ $product->name }}</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            Rp {{ number_format($product->price, 0, '.','.') }}
                                        </h5>
                                        <small>{{ $product->description}}</small>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    @if ($product->sold)
                                    <span class="btn bg-gradient-danger">Sold</span>
                                     @else
                                     <span class="btn bg-gradient-success">Active</span>
                                    @endif
                                    <a href="{{ route('product.delete', $product->id )}}" onclick="confirmation(event)" class="btn btn-danger">Hapus</a>

                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                 @endforeach
                 @else
                 <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center p3">
                            <h4>You Don't have a product yet</h4>
                            <a href="{{ route('product.create') }}" class="btn bg-gradient-primary">Add Product</a>
                        </div>
                    </div>
                 </div>
                @endif
            </div>
        </div>
    </section>
    <script>
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');
          console.log(urlToRedirect);
          swal({
              title: "Are you sure to Delete this post",
              text: "You will not be able to revert this!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willCancel) => {
              if (willCancel) {
                  window.location.href = urlToRedirect;
              }
          });
      }
  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
