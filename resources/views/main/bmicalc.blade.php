<x-layout>

    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 align="center">B M I &nbsp; C A L C U L A T I O N</h1>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-7">
                <div class="card p-5">
                    <div style="background: none; padding: 0" class="card-header mb-5">
                        <div class="text-black fs-5 ps-1">
                            CALCULATE &nbsp; B M I
                        </div>
                        <div class="fs-2 text-black fw-semibold pb-2">CALCULATE YOUR BODY MASS INDEX</div>
                    </div>
                    <div class="card-body mb-5 ms-0 ps-0 ">
                        <div class="ms-0 ps-0 d-flex">
                            <div class="me-5">
                                <a class=" {{ request('imperial') ? 'bmi' : 'bmiactive' }} px-4" href="/bmicalc">Metric</a>
                            </div>
                            <div>
                            <a class="{{ request('imperial') ? 'bmiactive' : 'bmi' }}" href="/bmicalc?imperial=1">Imperial</a>
                        </div>
                        </div>
                    </div>
                    <form action="/bmicalc/metric" method="post" class="tab {{ request('imperial') ? '' : 'active' }}">
                        @csrf

                        <div class="mb-4">
                            <label for="" class="form-label">Height</label>
                            <input type="number" class="form-control" placeholder="CM" name="height">
                            @error('height')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">Weight</label>
                            <input type="number" class="form-control" placeholder="KG" name="weight">
                            @error('weight')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-dark py-2 fw-semibold form-control">CALCULATE</button>
                        </div>
                    </form>
                    <form action="/bmicalc/imperial" method="post"
                        class="tab {{ request('imperial') ? 'active' : '' }}">
                        @csrf
                
                        <div class="">
                            <label for="" class="form-label">Height</label>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-md-6 mb-4">
                                    <input type="number" name="feet" class="form-control" placeholder="FT">
                                    @error('feet')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 mb-4">
                                    <input type="number" name="inches" class="form-control" placeholder="IN">
                                    @error('inches')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">Weight</label>
                            <input type="number" name="weight" class="form-control" placeholder="LB">
                            @error('weight')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="">
                            <button class="btn btn-dark form-control py-2 fw-semibold">CALCULATE</button>
                        </div>
                    </form>
                   
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card p-5">
                    <div class="note">
                        
                        <div>
                            <strong>Important Note:</strong> BMI (Body Mass Index) is a basic measure of body weight in relation to height. It has limitations and does not consider factors like muscle mass. For a personalized health assessment, consult with a trainer or a healthcare professional.
                        </div>
                    </div>
                    <div>
                        <img style="width: 100%; height: 100; object-fit: cover; object-position: center;" src="/images/images1.png" alt="">
                    </div>
                    
                    <div class="mt-2">
                        
                        @if (session()->has('under'))
                        <div style="background: rgb(111, 157, 190); border-radius: 6px;"  class="d-flex justify-content-center py-3">
                            <div>
                            <div class="text-white fs-5">YOUR BMI : <strong>{{ session('bmi') }} </strong></div>
                            <div class="text-white fs-5 text-center">(UNDER  WEIGHT)</div>
                        </div>
                        </div>
                        @endif
                        @if (session()->has('normal'))
                        <div style="background: rgb(117, 230, 217); border-radius: 6px;"  class="d-flex justify-content-center py-3">
                            <div>
                            <div class="text-white fs-5">YOUR BMI : <strong>{{ session('bmi') }} </strong></div>
                            <div class="text-white fs-5 text-center">(NORMAL  WEIGHT)</div>
                        </div>
                        </div>
                        @endif
                        @if (session()->has('over'))
                        <div style="background: rgb(220, 194, 62); border-radius: 6px;"  class="d-flex justify-content-center py-3">
                            <div>
                            <div class="text-white fs-5">YOUR BMI : <strong>{{ session('bmi') }} </strong></div>
                            <div class="text-white fs-5 text-center">(OVER  WEIGHT)</div>
                        </div>
                        </div>
                        @endif
                        @if (session()->has('obese'))
                        <div style="background: rgb(213, 97, 51); border-radius: 6px;"  class="d-flex justify-content-center py-3">
                            <div>
                            <div class="text-white fs-5">YOUR BMI : <strong>{{ session('bmi') }} </strong></div>
                            <div class="text-white fs-5 text-center">(OBESE)</div>
                        </div>
                        </div>
                        @endif
                        @if (session()->has('exobese'))
                        <div style="background: rgb(206, 54, 46); border-radius: 6px;"  class="d-flex justify-content-center py-3">
                            <div>
                            <div class="text-white fs-5">YOUR BMI : <strong>{{ session('bmi') }} </strong></div>
                            <div class="text-white fs-5 text-center">(EXTREMELY OBESE)</div>
                        </div>
                        </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layout>
