@extends('layouts.app', ['activePage' => 'categoryandbrand', 'titlePage' => __('Category Brand and Size')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Category -->
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Category list</h4>
            <p class="card-category">All Category</p>
          </div>
          <div class="col-12 text-right">
            <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary">Add Category</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Category ID
                  </th>
                  <th>
                    Category Name
                  </th>
                  <th>
                    Image
                  </th>
                </thead>
                <tbody>
                @foreach($category as $category)
                  <tr>
                    <td>
                    {{$category->id}}
                    </td>
                    <td>
                    {{$category->name}}
                    </td>         
                    <td>
                    <img src="{{ url($category->image) }}"
                        class="rounded-circle border border-primary"  
                        alt="" 
                        style="width: 50px; height: 50px; object-fit: contain; background-color: #D3D3D3" />
                    </td>            
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Brand -->
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Brand list</h4>
            <p class="card-category">All Brand</p>
          </div>
          <div class="col-12">
            <div class="d-flex justify-content-around">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Categories
                </button>
                <div class="dropdown-menu">
                @foreach($category1 as $category)
                  <a class="dropdown-item" href="#" value="{{ $category->id }}">{{$category->name}}</a>
                @endforeach
                </div>
              </div>
              <div class="col-8 text-right">
                <a href="{{ route('brand.create') }}" class="btn btn-sm btn-primary">Add Brand</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Brand ID
                  </th>
                  <th>
                    Category Name
                  </th>
                  <th>
                    Brand Name
                  </th>
                </thead>
                <tbody>
                @foreach($brand as $brand)
                  <tr>
                    <td>
                    {{$brand->id}}
                    </td>
                    <td>
                    {{$brand->category->name}}
                    </td>
                    <td>
                    {{$brand->name}}
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Size -->
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Size list</h4>
            <p class="card-category">All Size</p>
          </div>
          <div class="col-12">
            <div class="d-flex justify-content-around">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Categories
                </button>
                <div class="dropdown-menu">
                @foreach($category2 as $category)
                  <a class="dropdown-item" href="#">{{$category->name}}</a>
                @endforeach
                </div>
              </div>

              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Brand
                </button>
                <div class="dropdown-menu">
                @foreach($brand1 as $brand)
                  <a class="dropdown-item" href="#">{{$brand->name}}</a>
                @endforeach
                </div>
              </div>
              <div class="col-2 text-right">
                <a href="{{ route('size.create') }}" class="btn btn-sm btn-primary">Add Size</a>
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
                    Size
                  </th>
                </thead>
                <tbody>
                @foreach($size as $size)
                  <tr>
                    <td>
                    {{$size->id}}
                    </td>
                    <td>
                    {{$size->category->name}}
                    </td>
                    <td>
                    {{$size->brand->name}}
                    </td>
                    <td>
                    {{$size->name}}
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