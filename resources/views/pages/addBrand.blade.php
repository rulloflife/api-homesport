@extends('layouts.app', ['activePage' => 'addbrand', 'titlePage' => __('addbrand')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('brand.store') }}" autocomplete="off" class="form-horizontal">

        @csrf
        <div class="card ">
          <div class="card-header card-header-primary">
            <h4 class="card-title">{{ __('Add Brand') }}</h4>
            <p class="card-category">{{ __('Brand information') }}</p>
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
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                  <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="brand Name" required="true" aria-required="true"/>
                  @if ($errors->has('name'))
                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                  @endif
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
