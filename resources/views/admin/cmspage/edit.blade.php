@extends('admin.app')
@section('title')
    CMS Page
@endsection
@section('body')
    <div class="container-fluid px-4">
        <h1 class="mt-4">CMS Page</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">CMS Page</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <span>Edit</span>
            </div>
            <div class="card-body">
                <div class="container">
                    <form action="{{ route('cmspage.update', $cmsPage->cms_page_id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="Title">Title</label>
                                <input type="text" name="title" class="form-control" value='{{ $cmsPage->title }}'
                                    id="">
                                @error('title')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="inputAddress" class="form-label">Description</label>
                                <textarea name="text" id="editor1">{{ $cmsPage->text }}</textarea>
                                @error('text')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control" value='{{ $cmsPage->slug }}'
                                    id="">

                                @error('slug')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="0" @if (!$cmsPage->status) selected @endif>Inactive
                                    </option>
                                    <option value="1" @if ($cmsPage->status) selected @endif>Active</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 py-4 mr-5">
                                <button class="btn apply-btn px-3 float-end btn-outline-warning" type="submit"
                                    style="border-radius:18px">Save</button>
                                <a class="btn  apply-btn px-3 mr-2 float-end btn-outline-secondary"
                                    style="border-radius:18px" href="{{ route('cmspage.index') }}">cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('editor1');
    </script>
@endsection
