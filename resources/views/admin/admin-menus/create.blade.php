@extends('admin.layouts.master')

@section('title')
Admin Dashboard
@endsection

@section('container')

    <div class="row">
    <div class="col-lg-12">
        <div class="myy-card">
            <div class="myy-card__wrapper">
                <div class="myy-card__header text-center">
                    <div>
                        <h5>{{ $info->title }}</h5>
                    </div>
                    <div>
                        <a href="{{ route($info->first_button_route) }}" class="btn btn-success">
                            <i class="flaticon2-add"></i>
                            {{ $info->first_button_title }}
                        </a>
                    </div>
                </div>
                <div class="myy-card__body">
                    <form action="{{ route($info->form_route) }}" method="post" class="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="title">{{ __('field.title') }}</label>
                                    <input type="text" class="form-control @error(" title") is-invalid @enderror" id="title" name="title" placeholder="Enter Title">
                                    @error("title")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="icon">{{ __('field.icon') }}</label>
                                    <input type="text" class="form-control @error(" icon") is-invalid @enderror" id="icon" name="icon" placeholder="Enter icon">
                                    @error("icon")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="url">{{ __('field.url') }}</label>
                                    <input type="text" class="form-control @error(" url") is-invalid @enderror" id="url" name="url" placeholder="Enter url">
                                    @error("url")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="url">Permission</label>
                                    <input type="text" class="form-control @error(" url") is-invalid @enderror" id="url" name="permission" placeholder="Enter Permission Key">
                                    @error("permission")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="parent_menu">{{ __('field.parent_menu') }}</label>
                                    <select class="form-select search-select @error(" parent_id") is-invalid @enderror" name="parent_id" aria-label="Default select example">
                                        <option value="0">No Parent</option>
                                        @foreach($admin_menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                                        @endforeach
                                    </select>
                                    @error("parent_id")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <label class="form-label" for="is_active">{{ __('field.is_newtab') }}</label>
                                        <input type="hidden" value="0" name="is_newtab">
                                        <input type="checkbox" value="1" name="is_newtab" class="form-check-input">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <input type="hidden" value="0" name="is_shortcut">
                                        <input type="checkbox" value="1" name="is_shortcut" class="switch form-check-input">
                                        <label class="form-label" for="is_active">{{ __('field.is_shortcut') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <label class="form-label" for="is_active">{{ __('field.is_quick_action') }}</label>
                                        <input type="hidden" value="0" name="is_quick_action">
                                        <input type="checkbox" value="1" name="is_quick_action" class="form-check-input">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <label class="form-label" for="is_active">{{ __('field.is_section') }}</label>
                                        <input type="hidden" value="0" name="is_section">
                                        <input type="checkbox" value="1" name="is_section" class="form-check-input">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <label class="form-label" for="is_active">{{ __('field.is_separator') }}</label>
                                        <input type="hidden" value="0" name="is_separator">
                                        <input type="checkbox" value="1" name="is_separator" class="form-check-input">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <label class="form-label" for="is_active">{{ __('field.is_active') }}</label>
                                        <input type="hidden" value="0" name="is_active">
                                        <input type="checkbox" value="1" name="is_active" class="form-check-input">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-primary mt-4">{{ __('button.create') }}</button>
                                <button type="reset" class="btn btn-danger mt-4">{{ __('button.reset') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection