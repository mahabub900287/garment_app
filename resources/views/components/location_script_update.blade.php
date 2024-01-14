<script>
   $(document).ready(function() {
        // On page load, trigger change event on country dropdown to load states
        $('#country-dd').trigger('change');

        $('#country-dd').on('change', function() {
            var idCountry = this.value;
            $("#city-dd").html('');
            $('.loading').show();
            $.ajax({
                url: "{{ url('api/fetch-states') }}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('.loading').hide();
                    $('#city-dd').html('<option value="">Select State</option>');
                    $.each(result.states, function(key, value) {
                        $("#city-dd").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
        
    });
</script>
