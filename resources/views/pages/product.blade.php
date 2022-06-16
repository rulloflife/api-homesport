@extends('layouts.app', ['activePage' => 'product', 'titlePage' => __('product')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Product list</h4>
            <p class="card-category">All Products</p>
          </div>

          <div class="col-12">
            <div class="d-flex justify-content-around">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Categories
                </button>
                <div class="dropdown-menu">
                @foreach($category as $category)
                  <a class="dropdown-item" href="#">{{ $category->name }}</a>
                @endforeach
                </div>
              </div>

              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Brand
                </button>
                <div class="dropdown-menu">
                @foreach($brand as $brand)
                  <a class="dropdown-item" href="#">{{ $brand->name }}</a>
                @endforeach
                </div>
              </div>

              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Size
                </button>
                <div class="dropdown-menu">
                @foreach($size as $size)
                  <a class="dropdown-item" href="#">{{ $size->name }}</a>
                @endforeach
                </div>
              </div>
              <div class="text-right">
                <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">Add Product</a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Category
                  </th>
                  <th>
                    Brand
                  </th>
                  <th>
                    Product Name
                  </th>
                  <th>
                    Size
                  </th>
                  <th>
                    Price
                  </th>
                </thead>
                <tbody>
                @foreach($products as $product)
                  <tr>
                    <td>
                    {{ $product->id }}
                    </td>
                    <td>
                    {{ $product->category->name }}
                    </td>
                    <td>
                    {{ $product->brand->name }}
                    </td>
                    <td>
                    {{ $product->name }}
                    </td>
                    <td>
                    {{ $product->size->name }}
                    </td>
                    <td class="text-primary font-weight-bold">
                    {{ $product->price }} $
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
  </div>
</div>
@endsection
