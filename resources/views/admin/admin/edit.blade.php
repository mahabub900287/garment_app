<x-admin.layouts.app :title="$page_title">

    <div class="page-title-box">
        <div class="row align-items-center">
            <x-admin.partials.breadcumb :title="$page_title"></x-admin.partials.breadcumb>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <x-form method="POST" action="{{ route('admin.profile.update',Auth()->user()->id) }}" enctype="multipart/form-data">
                        {{-- <input type="hidden" value="{{ Auth()->user()->id }}" name="id"> --}}
                        <div class="row">
                            <div class="col-md-6">
                                <x-form_input label="Name" placeholder="Enter your first name"
                                    name="name" errorName='name' value="{{ Auth()->user()->name }}">
                                </x-form_input>
                            </div>
                            <div class="col-md-6">
                                <x-form_input label="Email" placeholder="Enter email address" name="email"
                                    errorName="email" value="{{ Auth()->user()->email }}" type="email">
                                </x-form_input>
                            </div>
                            <div class="col-md-6">
                                <x-form_input label="Phone" placeholder="Enter phone Number" name="phone"
                                    type="text" errorName="phone" value="{{ Auth()->user()->phone }}">
                                </x-form_input>
                            </div>
                            <div class="col-md-6">
                                <x-form_selectbox label="Gender" name="gender" errorName="gender">
                                    <option value="male" @if (Auth()->user()->gender == 'male') selected @endif>Male
                                    </option>
                                    <option value="female" @if (Auth()->user()->gender == 'female') selected @endif>Female
                                    </option>
                                    <option value="third_gender" @if (Auth()->user()->gender == 'third_gender') selected @endif>Third
                                        Gender</option>
                                </x-form_selectbox>

                            </div>
                            {{-- <div class="col-md-6">
                                <x-form_input label="address" placeholder="Enter your address" name="address"
                                    errorName="address" value="{{ Auth()->user()->address }}"></x-form_input>

                            </div>
                            <div class="col-md-6">
                                <x-form_input label="Date of birth" placeholder="Enter your date of birth"
                                    name="date_of_birth" errorName="date_of_birth" type="date"
                                    value="{{ Auth()->user()->date_of_birth }}"></x-form_input>
                            </div> --}}
                            <div class="col-md-6">
                                <x-form_input label="Password" placeholder="Enter your password"
                                    name="password" errorName="password" type="password"></x-form_input>

                            </div>
                
                            <div class="col-md-6">
                                <x-form_input label="Confirm Password"
                                    placeholder="Enter your confirm password" name="password_confirmation"
                                    type="password"></x-form_input>
                            </div>
                            <div class="col-md-6">
                                <x-image_upload label="Upload Profile Image" errorName="avatar" name="avatar"
                                    size="570*350"  src="{{ Auth::User()->avatar == Null ? get_default_image() :asset('storage/user').'/' .Auth::User()->avatar  }}">
                                </x-image_upload>
                            </div>
                            <x-buttons cancleurl="{{ route('admin.profile') }}" update="Update"></x-buttons>
                        </div>
                        </x-form>



                </div>
            </div>

        </div> <!-- end col -->
    </div>



    <x-slot name="topStyle">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <style>
               #file{
                    opacity: 0;
                    width: 0.1px;
                    height: 0.1px;
                    
                }
                .image-upload-label {
                    color: aliceblue;
                    padding: 10px;
                    border-radius: 5px;
                } 

               .file-input i{
                padding-left: 10px;
               }
                .file-input{
                display: grid;
                grid-template-columns: repeat(1,1fr);
                justify-content: center;
                align-items: center;
                position: relative;
                }
            </style>
    </x-slot>
    <x-slot name="topScript">
        <script>
               $(document).ready(function (e) {
               
                         let input=document.querySelector('.iamge-upload')
                        input.addEventListener('change',function(){
                            const reader=new FileReader()
                            reader.onload = function(e) {
                                $('#image-preview').attr('src', e.target.result);
                                $('#image-preview').hide();
                                $('#image-preview').fadeIn(650);
                            }
                            reader.readAsDataURL(this.files[0])
                        })
                    });

                    function TypeCheck(type) {
                    if (type == 'coache') {
                        $('#typeCoache').addClass('d-block');
                        $('#typeCoache').removeClass('d-none');
                    } else {
                        $('#typeCoache').addClass('d-none');
                        $('#typeCoache').removeClass('d-block');
                    }
                }
        </script>
    </x-slot>

    </x-admin.app>
