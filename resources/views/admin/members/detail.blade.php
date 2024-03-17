<x-admin-layout>
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="card py-2">
                <div class="card-header d-flex">
                    <a href="#" onclick="history.back()">
                        <i style="font-size: 37px;" class="fas fa-chevron-circle-left"></i>
                    </a>
                    <h3 style="font-size: 22px;" class="card-title text-center mr-auto ml-3 pt-1">Detail</h3>
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 ">
                                <img style="border: 1px solid;
                                width: 100%; height: 100%; 
                                max-width: 400px; max-height: 400px; 
                                min-width: 400px; min-height: 400px; 
                                object-fit: cover; object-position: center;"
                                class="ml-3"
                                    src="/uploads/{{ $trainer->imagesx }}" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="ml-2 mt-4">
                                    <div>
                                        <h1>Information</h1>
                                        <h4>Name - {{$trainer->name}}</h4>
                                        <h4>Specialization - BodyBuilding</h4>
                                        <h4>Height - 180cm </h4>
                                        <h4>Weight - 75kg</h4>
                                        <h4>Experience - 1 year </h4>
                                        <h4></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-3 mt-4 mr-5 flex-column">
                            <h1>Contact</h1>
                            <h5>email  - {{$trainer->email}}</h5>
                            <h5>phone - 43523452345</h5>
                            <h5>address - {{$trainer->address}}</h5>
                        </div>
                        <div class="row mr-5 mt-4 ml-3">
                            <h1>Description</h1>
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Quos eumconsequuntur nemo dolor fugit corporis voluptatum error 
                                odit quas voluptatem. Voluptatum praesentium aliquid in illum dolores. 
                                Distinctio provident quo laudantium?
                            </h5>
                        </div>
                        <div class="row mt-4 ml-3">
                            <h1>Body Photos</h1>
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col-lg-3 mr-5">
                                        <img style="border: 1px solid;
                                        width: 100%; height: 100%; 
                                        max-width: 300px; max-height: 300px; 
                                        min-width: 300px; min-height: 300px; 
                                        object-fit: cover; object-position: center;"
                                        src="/images/loader.gif" alt="">
                                    </div>
                                    <div class="col-lg-3 mr-5">
                                        <img style="border: 1px solid;
                                        width: 100%; height: 100%; 
                                        max-width: 300px; max-height: 300px; 
                                        min-width: 300px; min-height: 300px; 
                                        object-fit: cover; object-position: center;"
                                        src="/images/loader.gif" alt="">
                                    </div>
                                    <div class="col-lg-3">
                                        <img style="border: 1px solid;
                                        width: 100%; height: 100%; 
                                        max-width: 300px; max-height: 300px; 
                                        min-width: 300px; min-height: 300px; 
                                        object-fit: cover; object-position: center;"
                                        src="/images/loader.gif" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->



</x-admin-layout>
