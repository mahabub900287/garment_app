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
                    <x-form method="POST" action="{{ route('admin.newsletter.store') }}" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <x-form_input label="Email" placeholder="Enter email address" name="email"
                                    errorName="email" type="email"></x-form_input>
                            </div>
                            <div class="col-md-12">
                                <x-buttons cancleurl="{{ route('admin.newsletter.index') }}"></x-buttons>
                            </div>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="topStyle">
    </x-slot>
    <x-slot name="topScript">
    </x-slot>
</x-admin.layouts.app>
