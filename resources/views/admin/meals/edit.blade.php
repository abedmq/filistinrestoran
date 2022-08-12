@extends('layout.admin.default')

@section('content')
    <form action="{{route('admin.'.$route.'.update',$item)}}" method="post" class="form-validate ajax-form"
          enctype="multipart/form-data">
        @csrf
        @method('update')
        <div class="row">
            <div class="col-md-8">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a href="{{route('admin.'.$route.'.index')}}">{{$title}}</a>
                        </h3>
                    </div>
                    <!--begin::Form-->

                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @foreach(\App\Models\Language::list() as $lang)
                                <li class="nav-item">
                                    <a class="nav-link {{$loop->first?'active':''}}" id="lang-{{$lang->id}}"
                                       data-toggle="tab"
                                       href="#lang-tab-{{$lang->id}}">
																	<span class="nav-icon">
                                                                        <img style="width: 20px"
                                                                             src="images/{{$lang->code}}.png" alt="">
																	</span>
                                        <span class="nav-text">{{$lang->name}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content mt-5" id="myTabContent">
                            @foreach(\App\Models\Language::list() as $lang)
                                <div class="tab-pane fade {{$loop->first?"active show":""}}" id="lang-tab-{{$lang->id}}"
                                     role="tabpanel"
                                     aria-labelledby="home-tab">

                                    <div class="form-group">
                                        <label>العنوان<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="ادخل العنوان"
                                               value="{{$item->getTrans('title',$lang->id)}}"
                                               required name="lang[title][{{$lang->id}}]"/>
                                    </div>
                                    <div class="form-group">
                                        <label>الوصف<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="ادخل الوصف"
                                               value="{{$item->getTrans('description',$lang->id)}}"
                                               required name="lang[description][{{$lang->id}}]"/>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label>السعر<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="ادخل السعر"
                                   value="{{$item->price}}"
                                   required name="price"/>
                        </div>


                    </div>
                    <!--end::Form-->
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom mb-5">

                    <div class="card-body">

                        <div class="form-group">
                            <label>التصنيف<span class="text-danger">*</span></label>

                            <select name="category_id" id="category_id" class="form-control kt-filter">
                                <option value="0">اختر التصنيف</option>
                                @foreach(\App\Models\Category::all() as $category)
                                    <option
                                        value="{{$category->id}}" {{$category->id==$item->category_id?"selected":""}}>{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        @include('admin.partials.image', ['iValue'=>$item->getImage()])
                    </div>

                </div>
                <div class="card card-custom">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary mr-2 w-100 mb-4">حفظ
                            <i class="fa fa-spinner fa-spin loader" style="display: none;"></i>
                        </button>
                        <a href="{{route('admin.'.$route.'.index')}}" class="btn btn-secondary w-100">رجوع</a>
                    </div>
                </div>
            </div>

        </div>
    </form>

    <!--end::Card-->
@endsection

@push('scripts')
@endpush
