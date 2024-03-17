<x-admin-layout>

    <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-header d-flex">
                    <a href="/admin/blogs">
                        <i style="font-size: 37px;" class="fas fa-chevron-circle-left"></i>
                    </a>
                    <h3 style="font-size: 22px;" class="card-title text-center mr-auto ml-3 pt-1">Edit</h3>
                </div>


                <div class="card-body">

                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-lg-2">

                            </div>
                            <div class="col-lg-8">
                                    <div style="max-height: 450px; overflow: hidden;">
                                        <img style="max-height: 450px; object-fit: cover; object-position: center;"
                                            class="card-img-top" src="/uploads/{{ $blog->image }}" alt="">

                                    </div>
                                    <form action="/admin/blogs/{{ $blog->id }}/imagechange" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mt-4 mb-4 input-group">
                                            <input type="file" class="form-control py-2" name="image"
                                                id="image">
                                            <button class="btn btn-primary">CHANGE</button>
                                            @error('image')
                                                <p class="text-danger text-sm ">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </form>

                                    <form action="/admin/blogs/{{ $blog->id }}/edit" method="POST">
                                        @csrf
                                        <div class="mb-4 pb-5">
                                            <input type="text" class="form-control card-title fs-5"
                                                value="{{ $blog->title }}" name="title" id="title">
                                            @error('title')
                                                <p class="text-danger text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mt-4 mb-4">
                                            <textarea style="line-height: 28px; color:rgb(109, 105, 105); min-height: 200px;" class="form-control" name="content"
                                                id="content">{{ $blog->content }}</textarea>
                                            @error('content')
                                                <p class="text-danger text-sm ">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="">
                                            <button disabled id="update"
                                                class="btn btn-primary">UPDATE</button>
                                        </div>
                                    </form>
                            </div>
                            <div class="col-lg-2">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const title = document.getElementById("title");
            const content = document.getElementById("content");

            const update = document.getElementById("update");


            title.addEventListener("input", validateForm);
            content.addEventListener("input", validateForm);


            function validateForm() {
                if (title.value.trim() !== "" || content.value.trim() !== "") {
                    update.removeAttribute("disabled");
                } else {
                    update.setAttribute("disabled", "disabled");
                }
            }
        });
    </script>



</x-admin-layout>
