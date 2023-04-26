<div class="modal fade" id="ContactUSModal" tabindex="-1" role="dialog" aria-labelledby="ContactUSModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-2">
            <form id="contactus" method="POST">
                @csrf
                @method('POST')
                <div>
                    <div class="modal-header" style="border-bottom: none;">
                        <h5 class="modal-title">Contact Us</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="name" class="form-label">Name*</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name"
                                    name="name" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}"
                                    disabled>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="email" class="form-label">Email Address*</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email"
                                    name="email" value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="col-12 mt-2">
                                <label for="subject" class="form-label">Subject*</label>
                                <input type="text" class="form-control" id="subject"
                                    placeholder="Enter your Subject" name="subject">
                            </div>
                            <div class="col-12 mt-2">
                                <label for="message" class="form-label">Message*</label>
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your message" name="message"></textarea>
                            </div>
                        </div>
                        <p id="contactus-error" class="alert alert-danger" role="alert" style="display: none;">
                        </p>
                    </div>
                    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->user_id }}">
                    <div class="d-flex py-2 justify-content-end">
                        <a type="button" class="btn btn-outline-secondary px-3 rounded-pill"
                            data-dismiss="modal">Cancel</a>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-outline-warning px-4 rounded-pill">Save</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<script>
    $('#contactus').submit(function(event) {
        event.preventDefault();
        var user_id = $('#user_id').val();
        $.ajax({
            type: 'POST',
            url: "{{ url('api/users/Contactus') }}",
            data: $(this).serialize(),
            success: function(response) {
                $('#contactusModal').modal('hide');
                location.reload();
                alert('Your message has been successfully!');
            },
            error: function(response) {
                var errors = response.responseJSON.errors;
                var errorHtml = '';
                $.each(errors, function(key, value) {
                    errorHtml += '<p>' + value + '</p>';
                });
                $('#contactus-error').html(errorHtml).show();
            },
        });
    });
</script>
