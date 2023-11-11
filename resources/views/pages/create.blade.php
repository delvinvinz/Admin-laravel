@extends('layouts.app')

@section('content')
   <div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body p-3">
                    <h5>Add Product</h5>
                    <hr>
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-control-label">Image</label>
                            <input type="file" name="image" class="form-control form-control-file" id="image" accept=".JPG .PNG .SVG" required>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="6" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-control-label">Price</label>
                            <input type="number" name="price" class="form-control" id="price" required>
                            <small>* Minimal Rp 100.000</small>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection
