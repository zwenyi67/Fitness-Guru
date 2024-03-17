<x-admin-layout>
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="card px-5 py-2">
                <div class="card-header d-flex">
                    <a href="/admin/products">
                        <i style="font-size: 37px;"
                        class="fas fa-chevron-circle-left"></i>
                    </a>
                    <h3 style="font-size: 22px;"
                    class="card-title text-center mr-auto ml-3 pt-1">Add New Product</h3>
                </div>

                <div class="card-body">
                    <form class="" method="POST" action="/admin/products/create" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" >
                        @error('name')
                            <p class="text-danger text-sm ">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Category</label>
                            <select class="form-select form-control" name="category" id="category">
                            <option value=0 selected>Select the category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>                                
                                {{ucwords($category->name)}}
                            </option>
                            @endforeach
                            </select>
                        @error('category')
                            <p class="text-danger text-sm ">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Brand</label>
                            <input type="text" name="brand" id="brand" class="form-control" value="{{old('brand')}}" >
                        @error('brand')
                            <p class="text-danger text-sm ">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Price</label>
                            <input min="5" max="999"
                            type="number" name="price" id="price" class="form-control" value="{{old('price')}}" >
                        @error('brand')
                            <p class="text-danger text-sm ">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Quantity</label>
                            <input min="1" max="1000"
                            type="number" name="total_qty" id="total_qty" class="form-control" value="{{old('total_qty')}}" >
                        @error('total_qty')
                            <p class="text-danger text-sm ">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Photo</label>
                            <div class="input-group">
                            <input type="file" name="image" id="image" class="form-control" value="{{old('image')}}" >
                        </div>
                            @error('image')
                            <p class="text-danger text-sm ">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea style="resize: none; max-height: 15vh; min-height: 15vh;"
                            name="description" 
                            id="description" 
                            class="form-control">{{old('description')}}</textarea>
                            @error('description')
                            <p class="text-danger text-sm ">{{$message}}</p>
                        @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->



</x-admin-layout>