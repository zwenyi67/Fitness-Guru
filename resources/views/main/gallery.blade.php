<x-layout>

    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 align="center">G A L L E R Y</h1>
            </div>
        </div>
    </div>

    <div class="gallery">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-11">
                    <div class="titlepage">
                        <p class="fs-5">"Explore the essence of our fitness world through captivating images. From
                            invigorating workouts and stylish
                            gym decor to top-notch facilities and inspiring body transformations,
                            each photo tells a story of dedication and well-being. Welcome to a place where fitness
                            comes to life in every snapshot."</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="tz-gallery">
                    <div class="col-sm-12 ">
                        <div class="row">
                            @foreach ($galleries as $gallery)
                                <div class="col-sm-12 col-lg-4 col-md-6 col-md-4">
                                    <a class="gallery_img" href="uploads/{{ $gallery->image }}">
                                        <img style="max-height: 350px; min-height: 350px; object-fit: cover;" src="uploads/{{ $gallery->image }}" alt="Bridge">
                                    </a>
                                </div>
                            @endforeach


                        </div>
                        <div class="row d-flex justify-content-center mt-5">
                            <div>
                                {{ $galleries->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end gallery -->


</x-layout>
