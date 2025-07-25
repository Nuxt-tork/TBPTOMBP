{{-- Extends layout --}}
@extends('admin.layouts.master')

@section('title')
    {{ $info->title }}
@endsection

{{-- Content --}}
@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="myy-card">
                <div class="myy-card__wrapper">
                    {{-- Card Header Start --}}
                    <div class=" myy-table__header d-flex justify-content-between">
                        <div class="myy-table__title">
                            <h5>{{ $info->title }}</h5>
                        </div>
                        <div class="float-right">
                            <a href="{{ route($info->first_button_route) }}" class="btn btn-primary">

                                <i class="flaticon2-add"></i>

                                {{ $info->first_button_title }}
                            </a>
                            <a href="{{ route($info->second_button_route) }}" class="btn btn-warning">

                                <i class="flaticon2-add"></i>

                                {{ $info->second_button_title }}
                            </a>
                        </div>
                    </div>
                    {{-- Card Header End --}}

                    {{-- Card Body Start --}}
                    <div class="myy-card__body">
                        <form class="form" action="{{ route($info->form_route, $id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row g-4">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label class="form-label" for="image">Image
                                        </label>
                                        <div class="admin__thumb-upload">
                                            <div class=" admin__thumb-edit">
                                                <input type='file' class="@error('image') is-invalid @enderror"
                                                    id="image" name="image"
                                                    onchange="imagePreview(this,'image_preview_image');"
                                                    accept=".png, .jpg, .jpeg" />
                                                <label for="image"></label>
                                            </div>

                                            <div class="admin__thumb-preview">
                                                <div id="image_preview_image" class="admin__thumb-profilepreview"
                                                    style="
                            background-image: url({{ $data->image != '' ? asset($data->image) : asset(avatarUrl()) }});">
                                                </div>
                                            </div>

                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>




                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Name <span>&#x002A;</span> </label>
                                        <input type="text" value="{{ $data->name }}"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            name="name" placeholder="Enter Name" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="phone">Phone </label>
                                        <input type="text" value="{{ $data->phone }}"
                                            class="form-control @error('phone') is-invalid @enderror" id="phone"
                                            name="phone" placeholder="Enter Phone">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email </label>
                                        <input type="email" value="{{ $data->email }}"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            name="email" placeholder="Enter Email">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="form-label" for="user_id">User <span>&#x002A;</span> </label>
                                        <select class="form-select search-select @error('user_id') is-invalid @enderror"
                                            data-live-search="true" id="user_id" name="user_id" required>
                                            <option value="">--Choose--</option>
                                            @foreach (activeModelData('App\Models\User') as $row)
                                                <option value="{{ $row->id }}"
                                                    @if ($data->user_id == $row->id) selected @endif>{{ $row->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="form-label" for="parent_id">Blog Comment </label>
                                        <select class="form-select search-select @error('parent_id') is-invalid @enderror"
                                            data-live-search="true" id="parent_id" name="parent_id">
                                            <option value="">--Choose--</option>
                                            @foreach (activeModelData('App\Models\BlogComment') as $row)
                                                <option value="{{ $row->id }}"
                                                    @if ($data->parent_id == $row->id) selected @endif>{{ $row->id }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('parent_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="form-label" for="status">Status <span>&#x002A;</span> </label>
                                        <select class="form-select search-select @error('status') is-invalid @enderror"
                                            data-live-search="true" id="status" name="status" required>
                                            <option value="">--Choose--</option>

                                            <option value="approved" @if ($data->status == 'approved') selected @endif>
                                                Approved</option>

                                            <option value="pending" @if ($data->status == 'pending') selected @endif>
                                                Pending</option>

                                            <option value="cancelled" @if ($data->status == 'cancelled') selected @endif>
                                                Cancelled</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label class="form-label" for="description">Description </label>
                                        {!! renderCKEditorHtml('description', 0, $data->description) !!} @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-10">
                                    <button type="submit"
                                        class="btn btn-primary mt-4">{{ __('button.update') }}</button>
                                    <button type="reset" class="btn btn-danger mt-4">{{ __('button.reset') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- Card Body End --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    @parent
@endsection

@section('js')
    @parent


    {!! renderCKEditorScript('description') !!}

    {{-- SCRIPT --}}'
@endsection
