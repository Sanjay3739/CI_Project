<div class="ms-5 ps-5">
    <div class="container">
        <div class="row">
            <a type="button" data-toggle="modal" data-target="#contactus" class=" no-decore text-muted ">Contactus
            </a>
            <div class="modal fade" id="contactus" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content p-3">
                        <form action="" method="post">
                            @csrf
                            @method('GET')
                            <div>
                                <div class="d-flex justify-content-between">
                                    <div class="py-2 text-start">
                                        Contact Us
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                        style="border:none;background:none">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="first_name" class="form-label">Name*</label>
                                        <input type="text" class="form-control" id="first_name" name='first_name'
                                            placeholder="Enter your name" value="{{ $user->first_name }}" disabled>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <label for="email" class="form-label">Email*</label>
                                        <input type="mail" class="form-control" id="email" name='email'
                                            placeholder="Enter your Email" value="{{ $user->email }}" disabled>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <label for="subject" class="form-label">Subject*</label>
                                        <input type="text" class="form-control" id="subject" name='subject'
                                            placeholder="Enter your Subject" value="{{ $user->subject }}">
                                        @error('subject')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col mt-4">
                                        <label for="message">Message*</label>
                                        <textarea class="form-control mt-2" id="message" name="messages" placeholder="Enter your Message">{{ $user->message }}</textarea>
                                        @error('message')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" d-flex justify-content-end mt-3">
                                    <button type="button" class="btn mt-4 px-4 btn-outline-secondary"
                                        style="border-radius: 23px" data-dismiss="modal">Cancle</button>&nbsp;&nbsp;
                                    <button type=Submit class="btn mt-4 px-4 btn-outline-warning"
                                        style="border-radius:18px">Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
