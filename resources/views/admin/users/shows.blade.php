<x-admin.layouts.app :title="$page_title">
    <div class="page-title-box">
        <div class="row align-items-center mt-3">
            <x-admin.partials.breadcumb :title="$page_title"></x-admin.partials.breadcumb>
        </div>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Right Sidebar -->
                    <div class="email-area mb-3">
                        
                        <div class="card shadow-sm">
                            
                                <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-toolbar mb-3" role="toolbar">
                                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                                <button type="button" class="btn btn-primary waves-light waves-effect"><a href="{{ route('admin.users.index') }}" class="text-white">Back User List</a></button>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-4">
                                            <div class="flex-grow-1">
                                               <table>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <td> </td>
                                                    <td>:</td>
                                                    <td></td>
                                                    <td>{{ $item->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email Address</th>
                                                    <td></td>
                                                    <td>:</td>
                                                    <td></td>
                                                    <td>{{ $item->email  }}</td>
                                                  
                                                </tr>
                                                <tr>
                                                    <th>Phone Number</th>
                                                    <td> </td>
                                                    <td>:</td>
                                                    <td></td>
                                                    <td>{{ $item->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th>User Type</th>
                                                    <td> </td>
                                                    <td>:</td>
                                                    <td></td>
                                                    <td>{{ $item->type }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Gender</th>
                                                    <td> </td>
                                                    <td>:</td>
                                                    <td></td>
                                                    <td>{{ $item->gender }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Create Account</th>
                                                    <td> </td>
                                                    <td>:</td>
                                                    <td></td>
                                                    <td>{{ Auth::User()->created_at->format('d F Y') }}</td>
                                                </tr>
                                               </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-start mb-3">User Profile Image</h4>
                                        <div class="text-start">
                                        <img src="{{ $item->avatar == Null ? get_default_image() : asset('/storage/user').'/'.$item->avatar }}"
                                            alt="Site Logo" class="rounded-circle img-fluid" style="height: 150px;width:150px">
                                        </div>
                                    </div>
                                 </div>
                                    
                                </div>
                        </div>
    
                    </div> <!-- end Col-9 -->
    
                </div>
    
            </div><!-- End row -->
    
        </div> <!-- container-fluid -->
    </div>
</x-admin.layouts.app>