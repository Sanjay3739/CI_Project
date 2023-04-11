@extends('layouts.app')
@section('title')
    Edit-Share your story
@endsection

@section('content')
    <form id="story-form" action="{{ route('stories.update', $story->story_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container mt-5">
            <h2>Share Your Story</h2>
            <div class="row">
                <div class="col-lg-4">

                    <label for="missionSelect" class="form-label">Mission</label>
                    <select class="form-control" id="missionSelect" name="mission_id">
                        <option value="" disabled selected>Select Mission</option>
                        @foreach ($appliedMissions as $mission)
                            <option value="{{ $mission->mission_id }}" @if ($mission->mission_id == $story->mission_id) selected @endif>
                                {{ $mission->title }}</option>
                        @endforeach
                    </select>
                    @error('mission_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-lg-4">
                    <label for="title" class="form-label">My Story Title</label>
                    <input type="text" class="form-control" id="title" name='title' placeholder="Enter your title"
                        placeholder="Enter story title" value="{{ $story->title }}">
                    @error('title')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-lg-4">
                    <label for="inputdate" class="form-label">Date</label>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='datetime-local' class="form-control" id='published_at' name='published_at'
                            placeholder="Select date" value="{{ date('Y-m-d\TH:i:s', strtotime($story->published_at)) }}">
                    </div>
                    @error('published_at')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <label for="summary-ckeditor" class="form-label">My Story</label>
                    <textarea name="description" class="story-textarea" id="summary-ckeditor">{{ $story->description }}</textarea>
                </div>
                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="row">
                <div class="col-lg-12 mt-5">
                    <label for="orgVideo" class="form-label">Enter Video URL</label>
                    <textarea class="form-control" id="path" name="path[]" placeholder="Enter your url">
@foreach ($storyvideoMedia as $videomedia)
{{ $videomedia->path }}&#13;&#10;
@endforeach
</textarea>
                    @error('path.*')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <label for="UploadYourPhotos" class="form-label">Upload your Photos</label>
                    <div id="drop-zone" style="border: 2px dashed #d8d7d7; padding: 20px; text-align: center;"
                        ondragover="event.preventDefault(); document.getElementById('drop-zone').classList.add('dragover');"
                        ondragleave="document.getElementById('drop-zone').classList.remove('dragover');"
                        ondrop="event.preventDefault(); document.getElementById('drop-zone').classList.remove('dragover'); handleDrop(event);">
                        <i class="fas fa-plus" style="font-size: 40px;"></i>
                        <div style="margin-top: 20px;">Drag and Drop Pictures Here</div>
                    </div>
                    <input type="file" id="file-input" name="photos[]" onchange="handleFiles(this.files);" multiple
                        hidden />
                    <div id="preview">
                        @foreach ($storyimageMedia as $imagemedia)
                            <div style="position:relative; display:inline-block; margin-right:10px;margin-left:10px;">
                                <img src="{{ asset('storage/' . $imagemedia->path) }}" alt="" width="118px"
                                    height="118px">
                                <i class="fa fa-times"
                                    style="position:absolute; top:0px; right:0px; background-color:black; color:white; border-radius:10%; padding:4px; cursor:pointer;"
                                    onclick="removeImage('{{ $imagemedia->path }}')"></i>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="row">

                <div class=" mt-4">
                    <a type="button" href="{{ url('storylisting') }}"
                        class="btn px-4  btn-outline-secondary  rounded-pill float-start">Cancel</a>
                    <button type="submit" class="btn px-3 btn-outline-warning ms-3 rounded-pill float-end"
                        id="submit-button">
                        Submit</button>

                    <button type="button" id="story_save"
                        class="btn px-4 btn-outline-warning rounded-pill float-end">Save</button>

                </div>
            </div>

        </div>
    </form>


    <script>
        var uploadedFiles = [];



        function handleFiles(files) {
            var preview = document.getElementById("preview");
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                if (uploadedFiles.includes('storage/StoryMedia/' + file.name)) {
                    continue;
                }
                uploadedFiles.push(file.name);
                var reader = new FileReader();
                reader.onload = function(event) {
                    var src = event.target.result;
                    var div = document.createElement("div");
                    div.setAttribute("style",
                        "position:relative; display:inline-block; margin-right:10px;margin-left:10px;");
                    var img = document.createElement("img");
                    img.setAttribute("src", src);
                    img.setAttribute("style", "width: 118px;height: 118px;");
                    div.appendChild(img);
                    var closeIcon = document.createElement("i");
                    closeIcon.setAttribute("class", "fa fa-times");
                    closeIcon.setAttribute("style",
                        "position:absolute; top:0px; right:0px; background-color:black; color:white; border-radius:10%; padding:4px; cursor:pointer;"
                    );
                    closeIcon.onclick = function() {
                        div.parentNode.removeChild(div);
                        var index = uploadedFiles.indexOf(file.name);
                        if (index !== -1) {
                            uploadedFiles.splice(index, 1);
                        }
                        var input = document.getElementById("file-input");
                        var files = input.files;
                        for (var j = 0; j < files.length; j++) {
                            if (files[j].name === file.name) {
                                input.value = "";
                                break;
                            }
                        }
                    };
                    div.appendChild(closeIcon);
                    preview.appendChild(div);
                };
                reader.readAsDataURL(file);
            }
        }

        function handleDrop(event) {
            var files = event.dataTransfer.files;
            handleFiles(files);
        }

        document.getElementById("drop-zone").addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("file-input").click();
        });

        $(document).ready(function(event) {
            $('#story_save').on('click', function() {
                var value = CKEDITOR.instances['summary-ckeditor'].getData();

                // Get the selected files
                var files = document.getElementById("file-input").files;

                files = Array.from(files).filter(file => !uploadedFiles.includes('storage/story_media' +
                    file.name));


                // Create a new FormData object
                var formData = new FormData();
                var input = document.getElementById("file-input");
                var files = input.files;
                for (var j = 0; j < files.length; j++) {
                    if (files[j].name === file.name) {
                        input.value = "";
                        break;
                    }
                }
                // Append the uploaded files to the FormData object
                for (var i = 0; i < files.length; i++) {
                    formData.append('photos[]', files[i], files[i].name);
                }

                // Append other form data to the FormData object
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('mission_id', $('#missionSelect').val());
                formData.append('title', $('#title').val());
                formData.append('published_at', $('#published_at').val());
                formData.append('description', value);

                // Split the path input by new lines
                var path = $('#path').val().split('\n');

                for (var i = 0; i < path.length; i++) {
                    formData.append('path[]', path[i]);
                }
                console.log(formData);
                console.log(formData.get('title'));
                console.log(formData.get('published_at'));
                console.log(formData.get('description'));
                console.log(formData.getAll('path[]'));
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $.ajax({
                    type: 'PUT',
                    url: '{{ route('stories.update', $story->story_id) }}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert(response);

                    }
                })
            })
        })
    </script>

    <script>
        function removeImage(path) {
            var imageDiv = event.target.parentNode;
            imageDiv.parentNode.removeChild(imageDiv);

            // Remove the image from the uploadedFiles array
            var index = uploadedFiles.indexOf(path);
            if (index !== -1) {
                uploadedFiles.splice(index, 1);
            }
        }
    </script>
@endsection
