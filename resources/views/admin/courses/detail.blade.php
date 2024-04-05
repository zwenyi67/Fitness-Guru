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
                            <div class="col-lg-6">
                                <img src="/uploads/{{ $course->image }}" alt="">

                                <div style="font-size: 30px" class="text-center">
                                    {{ $course->name }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="">Start Date</label>
                                    <input class="form-control" type="text" value="{{ $course->start_date }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">End Date</label>
                                    <input class="form-control" type="text" value="{{ $course->end_date }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Available</label>
                                    <input class="form-control" type="text" value="{{ $course->total }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Training</label>
                                    <input class="form-control" type="text" value="{{ $course->method == 1 ? 'Offline' : 'Online' }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">Description</label>
                                    <textarea class="form-control" type="text">{{ $course->description }}</textarea>
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
