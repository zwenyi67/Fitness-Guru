<x-layout>
    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 align="center">B L O G S</h1>
            </div>
        </div>
    </div>

    <div style="padding: 20px;"  class="container mt-5 ">
        <div class="row">
            @foreach ($blogs as $blog)

                
            <div class="col-lg-4 mb-4">

                <div style="border: none;" class="card">
                    <a href="/blogs/{{ $blog->id }}/detail" style="max-height: 350px; overflow: hidden;">
                    <img style="max-height: 350px; min-height: 350px; object-fit: cover; object-position: center;" src="/uploads/{{ $blog->image }}" class="card-img-top" alt="...">
                    </a>
                    <div class="">
                        <h5 class="card-title mb-0 mt-4 fs-5">{{ $blog->title }}</h5>
                        <div style="color: rgb(109, 105, 105);" class="d-flex mb-3">
                            <div class="d-flex me-3">
                                <i style="padding-top: 2px; font-size: 12px;" class="fa-solid fa-user-secret me-1"></i>
                                <span style="font-size: 12px;">ADMIN</span>
                            </div>
                            <div class="d-flex me-3">
                                <i style="padding-top: 3px; font-size: 12px;" class="fa-regular fa-heart me-1"></i>
                                <span style="font-size: 12px;">{{ $blog->likes->count() }}</span>
                            </div>
                            <div class="d-flex me-3">
                                <i style="padding-top: 3px; font-size: 12px;" class="fa-regular fa-comment me-1"></i>
                                <span style="font-size: 12px;">{{ $blog->comments->count() }}</span>
                            </div>
                            <div class="d-flex me-3">
                                <i style="padding-top: 2px; font-size: 12px;" class="fa-solid fa-calendar-days me-1"></i>
                                <span style="font-size: 12px;">{{ $blog->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <p style="height: 54px;" class="">{{ Str::words($blog->content, 13) }}</p>
                        <a href="/blogs/{{ $blog->id }}/detail" class="">Read More</a>
                    </div>
                </div>
                <hr>
            </div>
            @endforeach
            

        </div>


    </div>

</x-layout>
