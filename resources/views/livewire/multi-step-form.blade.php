    {{-- If your happiness depends on money, you will never be happy with yourself. --}}


    <div>

        <form wire:submit.prevent="register">

            {{-- Step One --}}
            @if ($currentStep == 1)
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        Step 1/4 - Personal Information
                    </div>
                    <div class="card-body px-4">
                        <div class="row mb-2 mt-3">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="pb-2" style="font-size: 14px;" for="">First Name <span
                                            class="text-danger">(Required*)</span></label>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                        wire:model="first_name">
                                    @error('first_name')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="pb-2" style="font-size: 14px;" for="">Last Name <span
                                            class="text-danger">(Required*)</span></label>
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                        wire:model="last_name">
                                    @error('last_name')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="pb-2" style="font-size: 14px;" for="">Date of Birth
                                        <span class="text-danger">(Required*)</span></label>
                                    <input type="date" class="form-control" name="birth_date" id="birth_date"
                                        wire:model="birth_date">
                                    @error('birth_date')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="pb-2" style="font-size: 14px;" for="">Gender <span
                                            class="text-danger">(Required*)</span></label>
                                    <select class="form-select form-control" name="gender" id="gender"
                                        wire:model="gender">
                                        <option value="" selected>Select Gender</option>
                                        <option value="1" selected>Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                    @error('gender')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="pb-2" style="font-size: 14px;" for="">Height
                                                (CM) <span class="text-danger">(Required*)</span></label>
                                            <input type="double" class="form-control" name="height"
                                                wire:model.live="height">
                                            @error('height')
                                                <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label class="pb-2" style="font-size: 14px;" for="">Weight
                                                (KG) <span class="text-danger">(Required*)</span></label>
                                            <input type="text" class="form-control" name="weight"
                                                wire:model="weight">
                                            @error('weight')
                                                <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="pb-2" style="font-size: 14px;" for="">Profile Image <span
                                            class="text-danger">(Required*)</span></label>
                                    <input type="file" class="form-control" name="image" wire:model="image">
                                    @error('image')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>




                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="pb-2" style="font-size: 14px;" for="">Phone <span
                                            class="text-danger">(Required*)</span></label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        wire:model="phone">
                                    @error('phone')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="pb-2" style="font-size: 14px;" for="">Region
                                        <span class="text-danger">(Required*)</span></label>
                                    <select class="form-select form-control" name="region"
                                        id="region" required wire:model="region">
                                        <option value="0" selected>Region</option>
                                        @foreach (App\Models\Region::latest()->get() as $region)
                                            <option value="{{ $region->id }}"
                                                {{ old('region') == $region->id ? 'selected' : '' }}>
                                                {{ ucwords($region->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('region')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="pb-2" style="font-size: 14px;" for="">Township <span
                                            class="text-danger">(Required*)</span></label>
                                    <input type="text" class="form-control" name="township" id="township"
                                        wire:model="township">
                                    @error('township')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="pb-2" style="font-size: 14px;" for="">Address <span
                                            class="text-danger">(Required*)</span></label>
                                    <input type="text" class="form-control" name="address" id="address"
                                        wire:model="address">
                                    @error('address')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endif


            {{-- Step Two --}}

            @if ($currentStep == 2)
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        Step 2/4 - Experienc & Certification
                    </div>
                    <div class="card-body px-4">

                        <div class="row mt-3 mb-2">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="pb-2" style="font-size: 14px;" for="">Experience
                                        (Year) <span class="text-danger">(Required*)</span></label>
                                    <input type="text" class="form-control" name="experience" id="experience"
                                        wire:model="experience">
                                    @error('experience')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="pb-2" style="font-size: 14px;" for="">Specialization
                                        <span class="text-danger">(Required*)</span></label>
                                    <select class="form-select form-control" name="specialization"
                                        id="specialization" required wire:model="specialization">
                                        <option value="0" selected>Specialization</option>
                                        @foreach (App\Models\Sport::latest()->get() as $specialization)
                                            <option value="{{ $specialization->id }}"
                                                {{ old('specialization') == $specialization->id ? 'selected' : '' }}>
                                                {{ ucwords($specialization->type) }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('specialization')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="pb-2" style="font-size: 14px;" for="">Hourly_Rate <span
                                            class="text-danger">(Required*)</span></label>
                                    <input type="text" class="form-control" name="hourly_rate" id="hourly_rate"
                                        wire:model.live="hourly_rate">
                                    @error('hourly_rate')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="pb-2" style="font-size: 14px;" for="">Currently
                                        Working Gym <span class="text-danger">(Optional*)</span></label>
                                    <input type="text" class="form-control" name="current_gym" id="current_gym"
                                        wire:model="current_gym">
                                    @error('current_gym')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="mb-4">

                                    <label class="pb-2" style="font-size: 14px;" for="">Body Images <span
                                            class="text-danger">(can select multiple images)</span></label>
                                    <input type="file" class="form-control" name="body_image[]" multiple
                                        wire:model="body_image" wire:loading.attr="disabled">
                                    @error('body_image')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="pb-2" style="font-size: 14px;" for="">Certification <span
                                            class="text-danger">(can select multiple images)</span></label>
                                    <input type="file" class="form-control" name="certification[]" multiple 
                                        id="certification" wire:model="certification" wire:loading.attr="disabled">
                                    @error('certification')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label class="pb-2" style="font-size: 14px;" for="">Descirption
                                        <span class="text-danger">(Optional*)</span></label>
                                    <textarea style="min-height: 146px;" class="form-control" name="description" id=""
                                        wire:model="description" placeholder="Enter your description"></textarea>
                                    @error('description')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            @endif


            {{-- Step Three --}}

            @if ($currentStep == 3)
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        Step 3/4 - Attachments
                    </div>
                    <div class="card-body px-4">
                        <div class="row mb-4">
                            <header>
                                <h4>Trainer Account Registration Terms and Policies</h4>
                            </header>
                            <section>
                                <p style="text-align: justify;"> By joining as a trainer, you confirm that you're at
                                    least 18, qualified in fitness,
                                    and agree to maintain a professional and respectful environment. Your trainer
                                    profile content should be accurate,
                                    safe, and adhere to our guidelines. We may verify your certifications and reserve
                                    the right to approve or reject
                                    accounts. Keep your account credentials secure, follow our content and client
                                    interaction guidelines,
                                    and abide by payment terms if applicable. We may terminate accounts for policy
                                    violations. Contact us at
                                    <a href="mailto:fitnessguru@email.com">fitnessguru@email.com</a> for questions.
                                </p>
                            </section>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-8">
                                <div class="mb-4">
                                    <label class="pb-2" style="font-size: 14px;" for="">CV Form<span
                                            class="text-danger">(Required*)</span></label>
                                    <input type="file" class="form-control" name="cv_form" wire:model="cv_form">
                                    @error('cv_form')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-8">
                                <div class="mb-4">

                                    <label class="pb-2" style="font-size: 14px;" for="">Instagram Profile Link<span
                                            class="text-danger">(Option*)</span></label>
                                    <input type="text" class="form-control" name="instagram" wire:model="instagram" placeholder="Paste here your profile link" required>
                                    @error('instagram')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-8">
                                <div class="mb-4">

                                    <label class="pb-2" style="font-size: 14px;" for="">Facebook Profile Link<span
                                            class="text-danger">(Option*)</span></label>
                                    <input type="text" class="form-control" name="facebook" wire:model="facebook" placeholder="Paste here your profile link">
                                    @error('facebook')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="ps-3">
                                <label>
                                    <input type="checkbox" name="agree" wire:model="agree" required>
                                    You have to agree with our Terms & Policies.
                                </label>
                                @error('agree')
                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>

                    </div>
                </div>
            @endif





            {{-- Step Three --}}

            @if ($currentStep == 4)
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        Step 4/4 - Create Account
                    </div>
                    <div class="card-body px-5">
                        <div class="mb-4">
                            <label style="font-size: 14px;" for="">Email</label>
                            <input type="email" class="form-control" name="email" wire:model="email">
                            @error('email')
                                <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label style="font-size: 14px;" for="">Password</label>
                            <input type="password" class="form-control" name="password" wire:model="password">
                            @error('password')
                                <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label style="font-size: 14px;" for="">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                wire:model="password_confirmation">
                            @error('password_confirmation')
                                <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>
            @endif




            <div class="d-flex justify-content-between bg-white pt-2 pb-3">

                @if ($currentStep == 1)
                    <div></div>
                @endif
                @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                    <button class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back</button>
                @endif
                @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                    <button class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
                @endif
                @if ($currentStep == 4)
                    <button class="btn btn-md btn-primary">Submit</button>
                @endif
            </div>

        </form>

    </div>
