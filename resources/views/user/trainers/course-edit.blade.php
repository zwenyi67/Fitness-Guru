<x-layout>



        <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5">
            <div class="card py-5">
                <div class="container mb-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="container d-flex justify-content-center flex-column mt-4">
                                <div class="product-img-box ">
                                    <img style="width: 100%;  min-height: 387px; max-height: 387px; object-fit: cover;
                                     object-position: center;"
                                        src="/uploads/{{ $course->image }}" alt="">
                                </div>
                                <div class="mt-4">
                                    <form class="input-group" action="">
                                        <input class="form-control" type="file">
                                        <button class="btn btn-primary">Change</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="container-fluid mt-5">
                                <div class="mb-4">
                                    <label for="">Title</label>
                                    <input class="form-control mb-3" value="{{ $course->name }}">
                                </div>
                                <div class="mb-4">
                                    <label for="">Description</label>
                                    <input class="form-control mb-3" value="{{ $course->description }}">
                                </div>
                                
                                <input type="text" >
                                <p style=" text-align: justify;" class="">{{ $course->description }}</p>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    
    
       
    
    
    
    





</x-layout>