<x-admin-layout>
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="card px-5 py-2">
                <div class="card-header d-flex">
                    <a href="/admin/sports">
                        <i style="font-size: 37px;" class="fas fa-chevron-circle-left"></i>
                    </a>
                    <h3 style="font-size: 22px;" class="card-title text-center mr-auto ml-3 pt-1">Edit</h3>
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5">
                                <img style="
                                    width: 100%; height: 100%; 
                                    min-width: 20rem; max-width: 20rem;
                                    min-height: 35.6vh; max-height: 35.6vh;
                                    object-fit: cover; object-position: center; 
                                    border-radius: 2%;
                                    "
                                src="/uploads/{{ $sport->image }}" alt="">
                                <form style="width: 81%;" class="input-group mt-4" 
                                    method="POST" action="/admin/sports/{{$sport->id}}/edit/image"
                                    enctype="multipart/form-data">
                                    @csrf
                                <input class="form-control" name="image" id="image" type="file" />
                                <button name="change" class="btn btn-primary">Change</button>
                                    </form>
                            </div>
                            <div class="col-lg-7">
                                <form class="ml-3" method="POST" action="/admin/sports/{{$sport->id}}/edit"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="form-label">Type</label>
                                        <input type="text" name="type" id="type" class="form-control"
                                        style="color: gray;"  value="{{ $sport->type }}">
                                        @error('type')
                                            <p class="text-danger text-sm ">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Description</label>
                                        <textarea style="resize: none; max-height: 20vh; min-height: 20vh; color: gray;" 
                                        name="description" id="description"
                                            class="form-control">{{ $sport->description }}</textarea>
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
