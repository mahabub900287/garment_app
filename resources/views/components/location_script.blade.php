<script>
    $(document).ready(function() {
        $('#country-dd').on('change', function() {
            var idCountry = this.value;
            $("#city-dd").html('');
            $('.loading').show();
            $.ajax({
                url: "{{ url('api/fetch-cities') }}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('.loading').hide();
                    $('#city-dd').html('<option value="">Select City</option>');
                    $.each(result.cities, function(key, value) {
                        $("#city-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    // $('#city-dd').html('<option value="">Select City</option>');
                }

            });
        });
        $("#country-dd").trigger("change");
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAsg6AkW1wE30yQkIMhwMrEdp9eVn5vSRw">
</script>

<script type="text/javascript">
    var geocoder;
    var map;


    function initialize() {
        var input = document.getElementById('address');
        var options = {
            types: ['geocode']
        };
        autocomplete = new google.maps.places.Autocomplete(input, options);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            /* console.log(place) */
            ;
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            var latlng = new google.maps.LatLng(latitude, longitude);
            var geocoder = (geocoder = new google.maps.Geocoder());

            geocoder.geocode({
                latLng: latlng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        var address = results[0].formatted_address;
                        var pin =
                            results[0].address_components[
                                results[0].address_components.length - 1
                            ].long_name;
                        var country =
                            results[0].address_components[
                                results[0].address_components.length - 2
                            ].long_name;
                        var countryCode =
                            results[0].address_components[
                                results[0].address_components.length - 2
                            ].short_name;
                        var state =
                            results[0].address_components[
                                results[0].address_components.length - 3
                            ].long_name;
                        var city =
                            results[0].address_components[
                                results[0].address_components.length - 4
                            ].long_name;
                        document.getElementById("countryInput").value = country;
                        document.getElementById("countryCodeInput").value = countryCode;
                        document.getElementById("cityInput").value = city;
                        document.getElementById("postalcodeInput").value = pin;

                    }
                }
            });
        })
    }
    google.maps.event.addDomListener(window, "load", initialize);
</script>
