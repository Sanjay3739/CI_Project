@extends('layouts.app')
@section('title')
    Edit-Share your story
@endsection

@section('content')
    <form id="story-form" action="{{ route('stories.update', $story->story_id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container mt-3">
            <h2>Share Your Story</h2>
            <div id="story-error" class="alert alert-danger" role="alert" style="display: none;"></div>
            <div class="row">
                <div class="col-lg-4">

                    <label for="missionSelect" class="form-label">Mission*</label>
                    <select class="form-control" id="missionSelect" name="mission_id">
                        <option value="" disabled selected>Select Mission</option>
                        @foreach ($storyMissions as $mission)
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
                    <label for="title" class="form-label">My Story Title*</label>
                    <input type="text" class="form-control" id="title" name='title' placeholder="Enter your title"
                        placeholder="Enter story title" value="{{ $story->title }}">
                    @error('title')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-lg-4">
                    <label for="inputdate" class="form-label">Date*</label>
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
                <div class="col-lg-12 mt-3">
                    <label for="summary-ckeditor" class="form-label">My Story*</label>
                    <textarea name="description" class="story-textarea" id="summary-ckeditor">{{ $story->description }}</textarea>
                </div>
                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="row">
                <div class="col-lg-12 mt-3">
                    <label for="orgVideo" class="form-label">Enter Video URL*</label>
                    <textarea class="form-control" id="path" name="path[]" placeholder="Enter your url">@foreach ($storyvideo as $video){{ $video->path }}&#13;&#10;@endforeach</textarea>
                    @error('path.*')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-3">
                    <label for="UploadYourPhotos" class="form-label">Upload your Photos*</label>
                    <div class="text-center border-dashed p-4" id="drop-zone" style="border: 3px dashed #bdbdbd;"

                        ondragover="event.preventDefault(); document.getElementById('drop-zone').classList.add('dragover');"
                        ondragleave="document.getElementById('drop-zone').classList.remove('dragover');"
                        ondrop="event.preventDefault(); document.getElementById('drop-zone').classList.remove('dragover'); handleDrop(event);">
                        <i class="fas fa-plus fa-3x"></i>
                        <div class="mt-3">Drag and Drop Pictures Here</div>
                    </div>
                    <input type="file" id="file-input" name="images[]" onchange="handleFiles(this.files);" multiple
                        hidden />
                    @error('images.*')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div id="preview">
                        @foreach ($storyimage as $imagemedia)
                            <div style="position:relative; display:inline-block; margin-right:10px;margin-left:10px;">
                                <img src="{{ asset('storage/' . $imagemedia->path) }}" alt="" width="118px"
                                    height="118px">
                                <button type="button" class="close_preview_img"
                                    data-story_media_id="{{ $imagemedia->story_media_id }}"
                                    style="position:absolute; top:0px; right:0px; background-color:rgb(85, 85, 85); color:rgb(228, 224, 224); border-radius:5%; padding:2px; cursor:pointer;"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="row">

                <div class=" mt-4">
                    <a type="button" class="btn px-4  btn-outline-secondary  rounded-pill float-start"
                        href="{{ route('stories.index') }}">Cancel</a>
                    <button type="submit" class="btn px-3 btn-outline-warning ms-3 rounded-pill float-end"
                        id="submit-button">
                        Submit</button>
                    <button type="button" id="edit_story_save" data-story_id={{ $story->story_id }}
                        class="btn px-4 btn-outline-warning rounded-pill float-end">Save</button>

                </div>
            </div>

        </div>
    </form>
    <script>
        var uploadedFiles = [
            @foreach ($storyimage as $image)
                '{{ $image->path }}',
            @endforeach
        ];
        var deleteFiles = [];
        var recentuploadFiles = [];

        function handleDrop(event) {
            var files = event.dataTransfer.files;
            handleFiles(files);
        }


        document.getElementById("drop-zone").addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("file-input").click();
        });


        function handleFiles(files) {
            console.log(files);
            var preview = document.getElementById("preview");
            for (let i = 0; i < files.length; i++) {
                console.log(files[i]);
                let file = files[i];
                if (uploadedFiles.includes('storage/storyMedia/' + file.name)) {
                    continue;
                }
                uploadedFiles = [...uploadedFiles, file.name];
                recentuploadFiles = [...recentuploadFiles, file];
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
                    var closeIcon = document.createElement("button");
                    closeIcon.setAttribute("class", "close_new_preview fa fa-times");
                    closeIcon.setAttribute("type", "button");
                    closeIcon.setAttribute("data-path", file.name);
                    closeIcon.setAttribute("style",
                        "position:absolute; top:0px; right:0px; background-color:black; color:white; border-radius:10%; padding:4px; cursor:pointer;"
                    );
                    closeIcon.onclick = function() {
                        div.parentNode.removeChild(div);
                        recentuploadFiles = recentuploadFiles.filter(item => item.name != file.name);
                    };
                    div.appendChild(closeIcon);
                    preview.appendChild(div);
                };
                reader.readAsDataURL(file);
            }
        }

        $(document).ready(function() {
            $('#submit-button').on('click', function() {
                for (var i = 0; i < recentuploadFiles.length; i++) {
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'images[]',
                    }).prop('files', recentuploadFiles[i]).appendTo('form');
                }
                $('<input>').attr({
                        type: 'hidden',
                        name: 'CancleImages',
                        value: deleteFiles,
                    }).appendTo('form');
                });


            $('#edit_story_save').on('click', function(event) {
                event.preventDefault();
                var value = CKEDITOR.instances['summary-ckeditor'].getData();
                // Get the selected files
                var files = document.getElementById("file-input").files;
                // Create a new FormData object
                var formData = new FormData();
                // Append the uploaded files to the FormData object
                for (var i = 0; i < recentuploadFiles.length; i++) {
                    formData.append('images[]', recentuploadFiles[i], recentuploadFiles[i].name);
                }
                formData.append('CancleImages', deleteFiles);

                // Append other form data to the FormData object
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('mission_id', $('#missionSelect').val());
                formData.append('title', $('#title').val());
                formData.append('published_at', $('#published_at').val());
                formData.append('description', value);
                // Split the path input by new lines
                var path = $('#path').val().split('\n');
                for (var i = 0; i < path.length; i++) {
                    if(path[i].length!=0){
                        formData.append('path[]', path[i]);
                    }
                }


                console.log(formData.getAll('path[]'));
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: "{{ route('stories.updatedstory', ':story_id') }}".replace(':story_id', $(
                        this).data('story_id')),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert(response);

                    },
                    error: function(response) {
                    var errors = response.responseJSON.errors;
                    var errorHtml = '';
                    $.each(errors, function(key, value) {
                        errorHtml += '<p>' + value + '</p>';
                    });
                    $('#story-error').html(errorHtml).show();
                },
                })
            })
            $('button[class="close_preview_img"]').on('click', function() {
                deleteFiles = [...deleteFiles, $(this).data('story_media_id')];
                $(this).parent().remove();
            });
        })
    </script>
@endsection
