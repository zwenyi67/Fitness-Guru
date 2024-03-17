<x-admin-layout>
    <!-- Main content -->
    <div style="width: 100%;" class="content">
        <div class="container">
            <div class="card px-5 py-2">
                <div class="card-header d-flex">
                    <a href="/admin/products">
                        <i style="font-size: 37px;" class="fas fa-chevron-circle-left"></i>
                    </a>
                    <h3 style="font-size: 22px;" class="card-title text-center mr-auto ml-3 pt-1">Edit</h3>
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5">
                                <img style="
                                border: 1px solid; padding: 15px;
                                    width: 100%; height: 100%; 
                                    min-width: 350px; max-width: 350px;
                                    min-height: 330px; max-height: 330px;
                                    object-fit: cover; object-position: center;
                                    "
                                    src="/uploads/{{ $product->image }}" alt="">
                                <div>
                                    <form style="width: 88%;" class="input-group mt-4" method="POST"
                                        action="/admin/products/{{ $product->id }}/edit/image"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input class="form-control" name="image" id="image" type="file" />
                                        <button name="change" class="btn btn-primary">Change</button>
                                    </form>
                                </div>
                                <div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <form class="ml-3" method="POST" action="/admin/products/{{$product->id}}/edit"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            style="color: gray;" value="{{ $product->name }}">
                                        @error('name')
                                            <p class="text-danger text-sm ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Brand</label>
                                        <input type="text" name="brand" id="brand" class="form-control"
                                            style="color: gray;" value="{{ $product->brand }}">
                                        @error('brand')
                                            <p class="text-danger text-sm ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Price</label>
                                        <input type="number" name="price" id="price" class="form-control"
                                            style="color: gray;" value="{{ $product->price }}">
                                        @error('price')
                                            <p class="text-danger text-sm ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div  class="container-fluid mb-4">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <label class="form-label">Stock Quantities</label>
                                                <label class="form-control">{{$product->total_qty}}</label>  
                                            </div>
                                            <div class="col-lg-1">
                                            </div>
                                            <div class="col-lg-1 mt-4 pt-3">
                                                <i class="fas fa-plus"></i>
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="form-label">Add</label>
                                                <input type="number" name="add" id="add" class="form-control"
                                            style="color: gray;" >
                                        @error('add')
                                            <p class="text-danger text-sm ">{{ $message }}</p>
                                        @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Description</label>
                                        <textarea style="resize: none; max-height: 20vh; min-height: 20vh;
                                        color: gray;"
                                            name="description" id="description" class="form-control">{{ $product->description }}</textarea>
                                        @error('description')
                                            <p class="text-danger text-sm ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content -->



</x-admin-layout>
