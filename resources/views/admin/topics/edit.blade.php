<x-admin-layout>
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="card px-5 py-2">
                <div class="card-header d-flex">
                    <a href="/admin/topics">
                        <i style="font-size: 37px;" class="fas fa-chevron-circle-left"></i>
                    </a>
                    <h3 style="font-size: 22px;" class="card-title text-center mr-auto ml-3 pt-1">Edit</h3>
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <form class="ml-3" method="POST" action="/admin/topics/{{$topic->id}}/edit">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                        style="color: gray;"  value="{{ $topic->name }}">
                                        @error('name')
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
