<x-admin.layouts.app :title="$page_title">

    <div class="page-title-box">
        <div class="row align-items-center">
            <x-admin.partials.breadcumb :title="$page_title"></x-admin.partials.breadcumb>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="row">


                <div class="col-md-6 p-5">
                   <div class="card-body">
                    <h4 class="mt-0 header-title">Your Information</h4>
                    <table>
                        <tr>
                            <th>Full Name </th>
                            <td> </td>
                            <td>:</td>
                            <td></td>
                            <td>{{ Auth::User()->name }}</td> 
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td> </td>
                            <td>:</td>
                            <td></td>
                            <td>{{ Auth::User()->email }}</td> 
                        </tr>
                        <tr>
                            <th>Type </th>
                            <td> </td>
                            <td>:</td>
                            <td></td>
                            <td>{{ Auth::User()->type }}</td>
                        </tr>
                        <tr>
                            <th>Create Account</th>
                            <td> </td>
                            <td>:</td>
                            <td></td>
                            <td>{{ Auth::User()->created_at->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td> </td>
                            <td>:</td>
                            <td></td>
                            <td>{{ Auth::User()->gender }}</td>
                        </tr>
                     
                        {{-- <tr>
                            <th>Address</th>
                            <th>:</th>
                            <td>{{ Auth::User()->address }}</td>
                        </tr>  --}}
                        <tr class="">
                            <td>
                                <a href="{{ route('admin.profile.edit') }}" class="btn btn-info mt-2">Edit Profile</a>
                            </td>
                        </tr>
                    </table>
                   </div>
                </div>
                <div class="col-lg-6 p-5">

                    <div class="card-body">
                        <h4 class="mt-0 header-title">Profile Iamge</h4>
                        <div class="">
                            <img id="profile_img_preview" class="img-thumbnail" alt="200x200" width="150"
                                src="{{ Auth::User()->avatar == Null ? get_default_image() :asset('storage/user').'/' .Auth::User()->avatar  }}" data-holder-rendered="true">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</x-admin.layouts.app>
