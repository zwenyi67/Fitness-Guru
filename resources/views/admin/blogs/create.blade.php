<x-admin-layout>


    <div class="content">
        <div class="container">
            <div class="card py-2">
                <div class="card-header d-flex">
                    <a href="#" onclick="history.back()">
                        <i style="font-size: 37px;" class="fas fa-chevron-circle-left"></i>
                    </a>
                    <h3 style="font-size: 22px;" class="card-title text-center mr-auto ml-3 pt-1">Create Blog</h3>
                </div>

                <div class="card-body">

                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            
                            <div class="col-lg-8">
                                <form class="p-5" method="POST" action="/admin/blogs/create"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <input type="file" class="form-control" name="image" id="image">
                                        @error('image')
                                            <p class="text-danger text-sm ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <input type="text" class="form-control" placeholder="Write title here"
                                            name="title" id="title">
                                        @error('title')
                                            <p class="text-danger text-sm ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <textarea style="width: 100%; height: 200px; resize: none;" class="form-control" name="content" id="content"
                                            placeholder="Write something about to share ..."></textarea>
                                        @error('content')
                                            <p class="text-danger text-sm ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-primary px-4">POST</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-admin-layout>
