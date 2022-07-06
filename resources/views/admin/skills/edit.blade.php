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
                                        <h1 class="m-0">Skills</h1>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                            <li class="breadcrumb-item active">Skills</li>
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
                                                <h3 class="card-title">Edit Skill</h3>
                                            </div>
                                            <form method="POST" action="{{ route('skills.update', $skill->id ) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="condition-title">Skill Title</label>
                                                        <input type="text" class="form-control" name="title"
                                                        value="{{ old('title') ?? $skill->title}}"
                                                        placeholder="Skill Title">
                                                        @error('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="condition-title">Is Active</label>
                                                        <br>
                                                        <input type="hidden" name="status" value="0">
                                                        <input type="checkbox" name="status" value="1"
                                                        {{
                                                            (old('status') == 1 ? 'checked' : null) ??
                                                            ($skill->status == 1 ? 'checked' : '')
                                                        }}
                                                        >
                                                        @error('status')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
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
