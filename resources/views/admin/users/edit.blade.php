<x-admin.layouts.app :title="$page_title">
    <div class="page-title-box">
        <div class="row align-items-center mt-3">
            <x-admin.partials.breadcumb :title="$page_title"></x-admin.partials.breadcumb>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{ $page_title }}</h4>
                    <x-form method="PUT" action="{{ route('admin.users.update', $item->id) }}"
                        enctype="multipart/form-data">
                        <input type="hidden" name="type" value="{{ $item->type }}">
                        <div class="row">
                            <div class="col-md-6">
                                <x-form_input label="Name" placeholder="Enter your name" name="name"
                                    errorName='name' value="{{ $item->name }}"></x-form_input>
                            </div>
                            <div class="col-md-6">
                                <x-form_input label="Last Name" placeholder="Enter your last name" name="last_name"
                                    errorName='last_name' value="{{ $item->last_name }}"></x-form_input>
                            </div>
                            <div class="col-md-6">
                                <x-form_input label="Email" placeholder="Enter email address" name="email"
                                    errorName="email" value="{{ $item->email }}" type="email"></x-form_input>
                                    
                            </div>
                            <div class="col-md-6">
                                <x-form_selectbox label="Type" name="type" errorName="type">
                                    <option value="user" @if ($item->type == 'user') selected @endif>User
                                    </option>
                                    <option value="admin" @if ($item->type == 'admin') selected @endif>Admin
                                    </option>
                                </x-form_selectbox>
                            </div>
                            <div class="col-md-6">
                                <x-form_input label="Phone" placeholder="Enter phone number" name="phone"
                                    type="text" errorName="phone" value="{{ $item->phone }}"></x-form_input>
                            </div>
                            <div class="col-md-6">
                                <x-form_selectbox label="Gender" name="gender" errorName="gender">
                                    <option value="male" @if ($item->gender == 'male') selected @endif>Male
                                    </option>
                                    <option value="female" @if ($item->gender == 'female') selected @endif>Female
                                    </option>
                                    <option value="third_gender" @if ($item->gender == 'third_gender') selected @endif>Third
                                        Gender</option>
                                </x-form_selectbox>
                            </div>
                            <div class="col-md-6">
                                <x-form_input label="Password" placeholder="Enter your password" name="password"
                                    errorName="password" type="password"></x-form_input>
                            </div>
                            <div class="col-md-6">
                                <x-form_input label="Confirm Password" placeholder="Enter your confirm password"
                                    name="password_confirmation" type="password"></x-form_input>
                            </div>
                            <div class="col-md-6">
                                <x-image_upload label="Upload Profile Image" errorName="avatar" name="avatar"
                                    size="570*350" src="{{ get_storage_image('user', $item->avatar) }}">
                                </x-image_upload>
                            </div>
                            <x-buttons cancleurl="{{ route('admin.users.index') }}"></x-buttons>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="topStyle">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            #file {
                opacity: 0;
                width: 0.1px;
                height: 0.1px;

            }

            .image-upload-label {
                color: aliceblue;
                padding: 10px;
                border-radius: 5px;
            }

            .file-input i {
                padding-left: 10px;
            }

            .file-input {
                display: grid;
                grid-template-columns: repeat(1, 1fr);
                justify-content: center;
                align-items: center;
                position: relative;
            }
        </style>
    </x-slot>
    <x-slot name="topScript">
        <script>
            $(document).ready(function(e) {

                let input = document.querySelector('.iamge-upload')
                input.addEventListener('change', function() {
                    const reader = new FileReader()
                    reader.onload = function(e) {
                        $('#image-preview').attr('src', e.target.result);
                        $('#image-preview').hide();
                        $('#image-preview').fadeIn(650);
                    }
                    reader.readAsDataURL(this.files[0])
                })
            });
        </script>
    </x-slot>
</x-admin.layouts.app>
