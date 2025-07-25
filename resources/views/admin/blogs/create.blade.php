{{-- Extends layout --}}
@extends('admin.layouts.master')

@section('title')
    {{ $page_title }}
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
                        </div>
                    </div>
                    {{-- Card Header End --}}

                    {{-- Card Body Start --}}
                    <div class="myy-card__body">
                        <form class="form" action="{{ route($info->form_route) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">

                                {{-- <div class="col-md-6">

                                    <div class="form-group">

                                        <label class="form-label" for="banner">Banner
                                        </label>
                                        <div class="admin__thumb-upload">
                                            <div class=" admin__thumb-edit">
                                                <input type='file' class="@error('banner') is-invalid @enderror"
                                                    id="banner" name="banner"
                                                    onchange="imagePreview(this,'image_preview_banner');"
                                                    accept=".png, .jpg, .jpeg" />
                                                <label for="banner"></label>
                                            </div>

                                            <div class="admin__thumb-preview">
                                                <div id="image_preview_banner" class="admin__thumb-profilepreview"
                                                    style="background-image: url( {{ asset(avatarUrl()) }});">
                                                </div>
                                            </div>

                                            @error('banner')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>




                                    </div>

                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Title <span>&#x002A;</span> </label>
                                        <input type="text" value="{{ old('title') }}"
                                            class="form-control @error('title') is-invalid @enderror" id="title"
                                            name="title" placeholder="Enter Title" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="slug">Slug <span>&#x002A;</span> </label>
                                        <input type="text" value="{{ old('slug') }}"
                                            class="form-control @error('slug') is-invalid @enderror" id="slug"
                                            name="slug" placeholder="Enter Slug" required>
                                        @error('slug')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div id="imageUploader" class="image-uploader" data-multiple="false" data-name="banner">
                                        <div class="upload-box">
                                            <p>Drag & Drop or <span class="clickable">Browse</span></p>
                                            <input type="file" name="banner" accept="image/*">
                                        </div>
                                        <div class="preview-box"></div>
                                    </div>
                                </div>

                                <!-- Banners (Multiple) -->
                                <div class="col-md-6">
                                    <div id="bannersUploader" class="image-uploader" data-multiple="true" data-name="banners[]">
                                        <div class="upload-box">
                                            <p>Banners - Drag & Drop or <span class="clickable">Browse</span></p>
                                            <input type="file" name="banners[]" accept="image/*" multiple>
                                        </div>
                                        <div class="preview-box"></div>
                                    </div>
                                </div>

                                <!-- Damage Images (Multiple) -->
                                <div class="col-md-6">
                                    <div id="damageUploader" class="image-uploader" data-multiple="true" data-name="damage[]">
                                        <div class="upload-box">
                                            <p>Damage Images - Drag & Drop or <span class="clickable">Browse</span></p>
                                            <input type="file" name="damage[]" accept="image/*" multiple>
                                        </div>
                                        <div class="preview-box"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="form-label" for="blog_category_id">Blog Category <span>&#x002A;</span>
                                        </label>
                                        <select
                                            class="form-select search-select @error('blog_category_id') is-invalid @enderror"
                                            data-live-search="true" id="blog_category_id" name="blog_category_id">
                                            <option value="">--Choose--</option>
                                            @foreach (activeModelData('App\Models\BlogCategory') as $row)
                                                <option value="{{ $row->id }}"
                                                    @if (old('blog_category_id') == $row->id) selected @endif>{{ $row->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('blog_category_id')
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

                                            <option value="draft" @if (old('status') == 'draft') selected @endif>Draft
                                            </option>

                                            <option value="published" @if (old('status') == 'published') selected @endif>
                                                Published</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>


                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label class="form-label" for="short_description">Short Description </label>
                                        {!! renderCKEditorHtml('short_description', 0, old('short_description')) !!} @error('short_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>


                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label class="form-label" for="description">Description </label>
                                        {!! renderCKEditorHtml('description', 0, old('description')) !!} @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="meta_title">Meta Title </label>
                                        <input type="text" value="{{ old('meta_title') }}"
                                            class="form-control @error('meta_title') is-invalid @enderror" id="meta_title"
                                            name="meta_title" placeholder="Enter Meta Title">
                                        @error('meta_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="meta_tags">Meta Tag </label>
                                        <input type="text" value="{{ old('meta_tags') }}"
                                            class="form-control @error('meta_tags') is-invalid @enderror" id="meta_tags"
                                            name="meta_tags" placeholder="Enter Meta Tag">
                                        @error('meta_tags')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label class="form-label" for="meta_description">Meta Description </label>
                                        {!! renderCKEditorHtml('meta_description', 0, old('meta_description')) !!} @error('meta_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-10">
                                    <button type="submit"
                                        class="btn btn-primary mt-4">{{ __('button.create') }}</button>
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

    <style>
        .image-uploader {
    border: 2px dashed #ccc;
    padding: 20px;
    text-align: center;
    position: relative;
    border-radius: 10px;
    margin-bottom: 1rem;
}

.image-uploader .upload-box {
    cursor: pointer;
    color: #666;
    font-size: 16px;
}

.image-uploader input[type="file"] {
    display: none;
}

.image-uploader .preview-box {
    margin-top: 15px;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
}

.image-uploader .preview {
    position: relative;
    width: 120px;
    height: 120px;
    border: 1px solid #ccc;
    border-radius: 8px;
    overflow: hidden;
}

.image-uploader .preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.image-uploader .remove-btn {
    position: absolute;
    top: 3px;
    right: 3px;
    background: red;
    color: white;
    border: none;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    font-size: 12px;
    cursor: pointer;
}

    </style>
@endsection

@section('js')
    @parent


    {!! renderCKEditorScript('short_description') !!}
    {!! renderCKEditorScript('description') !!}
    {!! renderCKEditorScript('meta_description') !!}

  
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".image-uploader").forEach(function (uploader) {
            const input = uploader.querySelector("input[type='file']");
            const previewBox = uploader.querySelector(".preview-box");
            const isMultiple = uploader.dataset.multiple === "true";

            // UI trigger
            uploader.querySelector(".upload-box").addEventListener("click", () => input.click());

            // Handle file input
            input.addEventListener("change", function () {
                const files = Array.from(input.files);

                if (!isMultiple) {
                    previewBox.innerHTML = ""; // Clear for single image
                }

                files.forEach(file => {
                    if (!file.type.startsWith("image/")) return;

                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const div = document.createElement("div");
                        div.className = "preview";
                        div.innerHTML = `
                            <img src="${e.target.result}" alt="Preview">
                            <button class="remove-btn" title="Remove">&times;</button>
                        `;
                        previewBox.appendChild(div);

                        // Remove image
                        div.querySelector(".remove-btn").addEventListener("click", () => {
                            div.remove();
                            clearInputFile(input, isMultiple);
                        });
                    };
                    reader.readAsDataURL(file);
                });
            });

            // Allow drag & drop
            uploader.addEventListener("dragover", e => {
                e.preventDefault();
                uploader.classList.add("drag-over");
            });

            uploader.addEventListener("dragleave", e => {
                e.preventDefault();
                uploader.classList.remove("drag-over");
            });

            uploader.addEventListener("drop", e => {
                e.preventDefault();
                uploader.classList.remove("drag-over");

                const droppedFiles = e.dataTransfer.files;
                if (droppedFiles.length > 0) {
                    input.files = droppedFiles; // update real input
                    input.dispatchEvent(new Event("change")); // trigger preview
                }
            });
        });

        function clearInputFile(input, isMultiple) {
            if (isMultiple) {
                // clone and reset
                const clone = input.cloneNode();
                input.parentNode.replaceChild(clone, input);
            } else {
                input.value = "";
            }
        }
    });
</script>

@endsection
