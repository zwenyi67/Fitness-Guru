<x-admin-layout>
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="card px-5 py-2">
                <div class="card-header d-flex">
                    <a href="/admin/galleries">
                        <i style="font-size: 37px;" class="fas fa-chevron-circle-left"></i>
                    </a>
                    <h3 style="font-size: 22px;" class="card-title text-center mr-auto ml-3 pt-1">Add New Category</h3>
                </div>

                <div class="card-body">
                    <form class="" method="POST" action="/admin/galleries/create" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control"
                                value="{{ old('image') }}">
                            @error('image')
                                <p class="text-danger text-sm ">{{ $message }}</p>
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
