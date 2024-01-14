<x-admin.layouts.app :title="$page_title">
    <div class="page-title-box">
        <div class="row align-items-center mt-3">
            <x-admin.partials.breadcumb :title="$page_title"></x-admin.partials.breadcumb>
        </div>
    </div>
    <x-admin.partials.datatable :dataTable="$dataTable"></x-admin.partials.datatable>
</x-admin.layouts.app>
