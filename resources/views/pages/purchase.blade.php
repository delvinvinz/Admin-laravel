@extends('layouts.app')

@section('content')
   <div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body p-3">
                    <h5>Purchase History</h5>
                    <hr>
                    <table class="table align-items-center mb-0">
                       <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Product</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Seller</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Auth::user()->purchases as $product)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/img') }}/{{ $product->detail->image}}" style="height: 50px; width: 50px; object-fit:contain;">
                                    <div class="ms-2">
                                        <h6 class="mb-0 text-sm text-primary">Rp {{ number_format($product->detail->price, 0, '.' , '.') }}</h6>
                                        <h6 class="mb-0 text-sm">{{ $product->detail->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm">{{ $product->detail->seller->name }}</h6>
                                      <p class="text-xs text-secondary mb-0">{{ $product->detail->seller->email}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $product->created_at }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection
