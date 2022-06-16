@extends('layouts.app', ['activePage' => 'addProducts', 'titlePage' => __('addProducts')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('product.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
          
          @csrf
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Add Product') }}</h4>
              <p class="card-category">{{ __('Product information') }}</p>
            </div>
            <div class="card-body ">
              @if (session('status'))
                <div class="row">
                  <div class="col-sm-12">
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                      <span>{{ session('status') }}</span>
                    </div>
                  </div>
                </div>
              @endif            
 
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('category Name') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">               
                      <!-- Bootstrap Select with Search Input -->
                      <!--===================================================-->
                      
                        <select class="form-control" id="category_id" name="category_id">
                          @foreach($category as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      
                      <!--===================================================-->                    
                  </div>
                </div>
              </div>   

              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Brand Name') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">               
                      <!-- Bootstrap Select with Search Input -->
                      <!--===================================================-->
                      
                        <select class="form-control" id="brand_id" name="brand_id">
                          @foreach($brand as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                          @endforeach
                        </select>
                      
                      <!--===================================================-->                    
                  </div>
                </div>
              </div>   

              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Size Name') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">               
                      <!-- Bootstrap Select with Search Input -->
                      <!--===================================================-->
                      
                        <select class="form-control" id="size_id" name="size_id">
                          @foreach($size as $size)
                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                          @endforeach
                        </select>
                      
                      <!--===================================================-->                    
                  </div>
                </div>
              </div>   

              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Product Name') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="Product Name" required="true" aria-required="true"/>
                    @if ($errors->has('name'))
                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                </div>
              </div>  

              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Price') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" id="input-price" type="text" placeholder="Price" required="true" aria-required="true"/>
                    @if ($errors->has('price'))
                      <span id="name-error" class="error text-danger" for="input-price">{{ $errors->first('price') }}</span>
                    @endif
                  </div>
                </div>
              </div>  

              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Inventory') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('quantity') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" id="quantity-name" type="text" placeholder="Quantity" required="true" aria-required="true"/>
                    @if ($errors->has('quantity'))
                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('inventory->name') }}</span>
                    @endif
                  </div>
                </div>
              </div>  

              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Discount') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('discount') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" name="discount" id="input-discount" type="text" value="0" placeholder="Discount" required="true" aria-required="true"/>
                    @if ($errors->has('discount'))
                      <span id="name-error" class="error text-danger" for="input-discount">{{ $errors->first('discount->name') }}</span>
                    @endif
                  </div>
                </div>
              </div>  

              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('desc') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" name="desc" id="input-desc" type="text" placeholder="Description" required="true" aria-required="true"/>
                    @if ($errors->has('desc'))
                      <span id="name-error" class="error text-danger" for="input-desc">{{ $errors->first('desc') }}</span>
                    @endif
                  </div>
                </div>
              </div>  
              <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                  <div class="row center">
                        <div class="panel">
                            <div class="panel-body">
                                <style>
                                    .center {
                                        height:100%;
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;

                                    }
                                    .form-input {
                                        width:350px;
                                        padding:20px;
                                        background:#fff;
                                        box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
                                        3px 3px 7px rgba(94, 104, 121, 0.377);
                                    }
                                    .form-input input {
                                        display:none;
                                    }
                                    .form-input label {
                                        display:block;
                                        width:45%;
                                        height:45px;
                                        margin-left: 25%;
                                        line-height:50px;
                                        text-align:center;
                                        background:#1172c2;

                                        color:#fff;
                                        font-size:15px;
                                        font-family:"Open Sans",sans-serif;
                                        text-transform:Uppercase;
                                        font-weight:600;
                                        border-radius:5px;
                                        cursor:pointer;
                                    }

                                    .form-input img {
                                        width:100%;
                                        display:none;
                                        margin-bottom:30px;
                                    }
                                </style>
                                </head>
                                <body>
                                <div class="center">
                                    <div class="form-input">
                                        <div class="preview">
                                            <img id="file-ip-1-preview">
                                        </div>
                                        <label for="file-ip-1">Upload Image</label>
                                        <input type="file" name="image" class="form-control" id="file-ip-1" value="{{old('image')}}" onchange="showPreview(event);">
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    function showPreview(event){
                                        if(event.target.files.length > 0){
                                            var src = URL.createObjectURL(event.target.files[0]);
                                            var preview = document.getElementById("file-ip-1-preview");
                                            preview.src = src;
                                            preview.style.display = "block";
                                        }
                                    }
                                </script>
                                </body>
                                </html>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection