<script>
    $(document).ready(function() {
        $('.customizable-button').click(function() {
            if (!'{{ Auth::user() }}') {
                window.location.href = '{{ route('login') }}';
            }
            var href = $(this).attr('href');
            // Set href URL in local storage
            localStorage.setItem('hrefURL', href);

        });
        $('#customizableId').submit(function(e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var formData = new FormData(this);
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#customizableId')[0].reset();
                    // Retrieve href URL from local storage
                    var href = localStorage.getItem('hrefURL');
                    // Show the corresponding modal
                    $('#trendingCoach').modal('hide');
                    // Redirect to href URL
                    window.location.href = href;
                    // Clear the href URL from local storage
                    localStorage.removeItem('hrefURL');
                },
                error: function(response) {
                    $('#ageError').text(response.responseJSON.errors.age);
                    $('#genderError').text(response.responseJSON.errors.gender);
                    $('#heightError').text(response.responseJSON.errors.height);
                    $('#weightError').text(response.responseJSON.errors.weight);
                    $('#fitnesslevelError').text(response.responseJSON.errors
                        .fitness_level);
                    $('#medicalhistoryError').text(response.responseJSON.errors
                        .medical_history);
                    $('#foodrestrictionError').text(response.responseJSON.errors
                        .food_restriction);
                    $('#lifestyleError').text(response.responseJSON.errors.lifestyle);
                    $('#fitnessgoalsError').text(response.responseJSON.errors
                        .fitness_goals);
                    $('#gymavailabilityError').text(response.responseJSON.errors
                        .gym_availability);
                    $('#personalpreferencesError').text(response.responseJSON.errors
                        .personal_preferences);
                    $('#imageError').text(response.responseJSON.errors.image);
                }
            });
        });
    });
</script>
