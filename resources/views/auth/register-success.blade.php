<x-layout>


    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
        <div class="card text-center">
            <div class="card-body px-4 py-5">
                <h2 class="card-title text-success fs-1 mb-4">Registration Successful !</h2>
                <p class="lh-1 fs-5 pb-3">
                    Congratulations! Your trainer account registration was successful. However, your account requires approval from the admin to become a trainer.
                </p>
                <p class="lh-sm">
                    In the meantime, feel free to use your account as a regular user. Explore the platform, browse products, 
                    and enjoy the full range of functionalities available to normal users. 
                    Whether it's ordering products or engaging with the content, make the most of your experience!               
                </p>
                <hr class="mb-4">
                <div class="py-2">
                <p class="card-text ">
                        Do you want to <a href="{{ route('login') }}" class="">LOGIN</a> now?
                </p>
            </div>
            </div>
        </div>
    </div>
    </div>

    </div>

</x-layout>