@extends('admin.layouts.master')

@section('title')
    {{$page_title}}
@endsection

@section('container')
        <div class="row">
            <div class="col-lg-12">
                <div class="myy-card">
                    <div class="myy-card__header d-flex justify-content-between">
                        <div class="myy-card__title">
                            <h5>{{$info->title}}</h5>
                        </div>
                        <div class="float-right">
                            @can('page-update')
                                <a href="{{ route($info->first_button_route,$id)}}" class="btn btn-primary">
                                    <i class="flaticon2-add"></i>
                                    {{$info->first_button_title}}
                                </a>
                            @endcan
                            <a href="{{ route($info->second_button_route) }}" class="btn btn-warning">
                                <i class="flaticon2-add"></i>
                                {{ $info->second_button_title }}
                            </a>
                        </div>
                    </div>
                    <div class="myy-card__body">
                        <div class="myy-card__body-text">
                            <ul class="crud-view mt-4">
                                <li class="crud-view__item">
    <span class="crud-view__item-title">Banner:</span>
    <span class="crud-view__item-content">
    <div class="myy-avatar d-flex flex-wrap align-items-center">
        <div class="myy-avatar__item me-3">
            
                    <img style="height:100px;"
                        @if ($data->banner) 
                            src="{{ asset($data->banner) }}"
                        @else                
                            src="{{ asset(avatarUrl()) }}" 
                        @endif
                        alt="#" data-bs-original-title="" title="">
        </div>
    </div>
    </span>
</li>
<li class="crud-view__item">
    <span class="crud-view__item-title">Admin:</span>
    <span class="crud-view__item-content">
                                        
                {{$data->admin?->name}}            
                
            </span>
</li><li class="crud-view__item">
    <span class="crud-view__item-title">Title:</span>
    <span class="crud-view__item-content">{{ $data->title}}</span>
</li>
<li class="crud-view__item">
    <span class="crud-view__item-title">Slug:</span>
    <span class="crud-view__item-content">{{ $data->slug}}</span>
</li>
<li class="crud-view__item">
    <span class="crud-view__item-title">Meta Title:</span>
    <span class="crud-view__item-content">{{ $data->meta_title}}</span>
</li>
<li class="crud-view__item">
    <span class="crud-view__item-title">Meta Tag:</span>
    <span class="crud-view__item-content">{{ $data->meta_tags}}</span>
</li>
<li class="crud-view__item">
    <span class="crud-view__item-title">Content:</span>
    <span class="crud-view__item-content">{!! $data->content!!}</span>
</li>
<li class="crud-view__item">
    <span class="crud-view__item-title">Meta Description:</span>
    <span class="crud-view__item-content">{!! $data->meta_description!!}</span>
</li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

