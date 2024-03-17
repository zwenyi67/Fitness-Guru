<x-layout>

    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow py-2" style="width: 70%;">
            <div class="card-header d-flex">
                <h3 style="font-size: 22px;" class="card-title text-center me-auto ms-3 pt-1">Launch Course or Program
                </h3>
            </div>

            <div class="card-body p-4 py-5">
                <form class="" method="POST" action="/trainer/courses/create" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label style="font-size: 15px;" class="pb-1">Course/ Program</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label style="font-size: 15px;" class="pb-1">Photo</label>
                                    <div class="input-group">
                                        <input type="file" name="image" id="image" class="form-control"
                                            value="{{ old('image') }}">
                                    </div>
                                    @error('image')
                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label style="font-size: 15px;" class="pb-1">Category</label>
                                    <select class="form-select form-control" name="category" id="category">
                                    <option value=0 selected>Select the category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>                                
                                        {{ucwords($category->name)}}
                                    </option>
                                    @endforeach
                                    </select>
                                @error('category')
                                    <p class="text-danger text-sm ">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label style="font-size: 15px;" class="pb-1">Launch Method</label>
                                    <select class="form-select form-control" name="method" id="method">
                                    <option value=0 selected>Select the method</option>
                                    <option value="1" {{ old('method') == 1 ? 'selected' : '' }}>                                
                                        Online
                                    </option>
                                    <option value="2" {{ old('method') == 2 ? 'selected' : '' }}>                                
                                        In Class
                                    </option>
                                    </select>
                                @error('method')
                                    <p class="text-danger text-sm ">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label style="font-size: 15px;" for="exampleInputPassword1" class="pb-1">Start Date</label>
                                    <input type="date" class="form-control" name="start_date" id="date"
                                        value="{{ old('start_date') }}">
                                    @error('start_date')
                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label style="font-size: 15px;" for="exampleInputPassword1" class="pb-1">End Date</label>
                                    <input type="date" class="form-control" name="end_date" id="date"
                                        value="{{ old('end_date') }}">
                                    @error('end_date')
                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label style="font-size: 15px;" for="exampleInputPassword1" class="pb-1">Total Members</label>
                                    <input min="1" type="number" class="form-control" name="total" id="total"
                                        value="{{ old('total') }}">
                                    @error('total')
                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label style="font-size: 15px;" for="exampleInputPassword1" class="pb-1">Price</label>
                                    <input type="text" class="form-control" name="price" id="price"
                                        value="{{ old('price') }}">
                                    @error('price')
                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    <div class="row mb-4">
                    <div class="mb-4">
                        <label style="font-size: 15px;" for="exampleInputPassword1" class="pb-1">Description</label>
                        <textarea style="resize: none; max-height: 15vh; min-height: 15vh;" name="description" id="description"
                            class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-danger text-sm ">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                    <button type="submit" class="checkout px-5 py-2 fw-medium">LAUNCH </button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>

</x-layout>
