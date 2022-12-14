@extends('layouts.master')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Category List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h5 class="card-title">Category List</h5>
                            <br>

                            <a  href="{{route('categories.create')}}" class="btn btn-sm btn-primary" href=""> <i class="fa fa-plus"></i>Add Category</a>

                            <br>
                            <br>
                          <table class="table table-bordered datatable" >
                              <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Name</th>
                                    <th>Category Code</th>
                                    <th>Category Barcode</th>
                                    <th>Action</th>
                                </tr>

                              </thead>
                              @if($categories)

                                  @foreach($categories as $index=>$category)

                                  <tr>

                                      <td>{{$index+1}}</td>
                                      <td>{{$category->name}}</td>
                                      <td>{{$category->category_code}}</td>

                                      <td>
                                          <h4>Trendy Fashion</h4>

                                          {!!$category->barcode!!}

                                          <h5>{{$category->name}}</h5>
                                          <h6>{{$category->category_code}}</h6>

                                      </td>

                                      <td>
                                          <a  href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-info">
                                              <i class="fa fa-edit">Edit</i>
                                          </a>

                                          <a  href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="category-delete-{{$category->id}}">
                                              <i class="fa fa-trash"> Delete </i>
                                          </a>

                                          <form id="category-delete-{{$category->id}}" action="{{route('categories.destroy',$category->id)}}" method="POST">
                                          @csrf
                                              @method('DELETE')


                                          </form>

                                      </td>

                                  </tr>

                                  @endforeach


                                      @endif


                          </table>
                        </div>
                    </div><!-- /.card -->
                </div>
                <!-- /.col-md-6 -->

                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection
<script>
    import TestComponent from "../../js/components/testComponent";
    export default {
        components: {TestComponent}
    }
</script>
