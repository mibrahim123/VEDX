@extends('layouts.admin.app')
    @section('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" />
    @endsection
    @section('content')
        <div class="content-wrapper">
                        <div class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1 class="m-0">Sub Categories</h1>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                            <li class="breadcrumb-item active">Sub Categories</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Create Sub Category</h3>
                                            </div>
                                            <form method="POST" action="{{ route('sub-categories.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="condition-title">Select Parent Category</label>
                                                        <select class="form-control" name="parent_id">
                                                            @foreach ($parentCategory as $parentCategory)
                                                                <option value="{{ $parentCategory->id}}">
                                                                    {{ $parentCategory->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="condition-title">Sub Category Title</label>
                                                        <input type="text" class="form-control" name="title"
                                                        value="{{ old('title' )}}"
                                                        placeholder="Category Title">
                                                        @error('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="condition-title">Sub Category Slug</label>
                                                        <input type="text" class="form-control" name="slug"
                                                        value="{{ old('slug' )}}"
                                                        placeholder="Category Slug">
                                                        @error('slug')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="condition-title">Show On Home Page</label>
                                                        <br>
                                                        <input type="hidden" name="is_show" value="0">
                                                        <input type="checkbox" name="is_show" value="1"
                                                        {{ old('is_show') == 1 ? 'checked' : ''}}
                                                        >
                                                        @error('is_show')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="condition-title">Is Active</label>
                                                        <br>
                                                        <input type="hidden" name="is_active" value="0">
                                                        <input type="checkbox" name="is_active" value="1"
                                                        {{ old('is_active') == 1 ? 'checked' : ''}}
                                                        >
                                                        @error('is_show')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div id="custom__dropzone" class="fallback dropzone needsclick dz-clickable" id="lmg-dropzone">
                                                        <div class="dz-message needsclick">
                                                            <span class="text">
                                                                {{ __('Add Image') }}
                                                            </span>
                                                        </div>


                                                    </div>
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="file" name="image" id="category_image" style="display: none">
                                                  </div>
                                                <div class="card-footer">
                                                    <button type="submit" id="form__submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
    @endsection
    @section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function () {

            let myDropzone = new Dropzone("div#custom__dropzone", {
                url: "{{route('admin.dashboard')}}",
                autoProcessQueue : false,
                addRemoveLinks: true,
                maxFiles: 1,
                uploadMultiple: false,
            });

            $(document).on('click', '#form__submit',function (e) {
                if(Dropzone.instances[0].files[0]) {
                    e.preventDefault();
                    const dT = new DataTransfer();
                    dT.items.add( Dropzone.instances[0].files[0]);
                    $("#category_image")[0].files = dT.files;
                    $(this).parents("form").submit();
                }
            });
        });

    </script>
    @endsection
