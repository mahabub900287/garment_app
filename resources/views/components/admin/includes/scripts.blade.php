<!-- Vue js -->
{{-- <script src="{{ asset('assets/admin/js/lib/jquery.min.js') }}"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js" type="application/javascript"></script>

{{-- <script src="/assets/admin/js/lib/bootstrap.bundle.min.js"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous" type="application/javascript">
</script>

<script src="https://cdn.jsdelivr.net/npm/metismenu"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.0/simplebar.min.js"
    integrity="sha512-OxWoHsSxJBmxF3gmEVdJxoEyZOpIl8a73c2/pirzipkFRneDmgiuK5JS1y1pHx3AUxwjJNxb9ehreIC7/YanaA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" type="application/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.min.js" type="application/javascript"></script>
<script src="{{ asset('assets/admin/js/sweetalert2@10.js') }}"></script>
<script src="{{ asset('assets/admin/js/parsley.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/custom-dev.js') }}"></script>



{{-- @vite('resources/js/app.js') --}}


{{ $topScript ?? '' }}

<script defer src="/assets/admin/js/lib/app.js"></script>

<script defer src="/assets/admin/js/custom-dev.js"></script>

{{ $bottomScript ?? '' }}
