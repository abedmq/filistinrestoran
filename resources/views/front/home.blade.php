@extends('front.layout.__layout')

@section('content')
<div class="product-menu-area pt-100 pb-70 gray-bg">
    <div class="container">
        <div class="section-title text-center mb-50">
            <h2>قائمة الطعام</h2>
            <p>
                {!! settings('about_us_ar',settings('description')) !!}
            </p>
        </div>
        <div class="menu-tab-wrap mb-50">
            <div class="menu-tab-list nav text-center">
                <a class="active" href="#tab1" data-bs-toggle="tab">
                    كل الوجبات
                </a>
                @foreach(($categories=\App\Models\Category::active()->with(['meals'=>function($q){
    $q->active();
}])->sort()->get()) as $category)
                    <a href="#tab-{{$category->id}}" data-bs-toggle="tab">
                        {{$category->title}}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="tab-content jump">
            <div id="tab1" class="tab-pane active">
                <div class="row">
                    @foreach(\App\Models\Meal::active()->with('category')->sort()->get() as $meal)
                        <div class="col-lg-6">
                            <div class="single-menu-product mb-30">
                                <div class="menu-product-img">
                                    <img alt="" src="{{$meal->getImage('high')}}">
                                </div>
                                <div class="menu-product-content">
                                    <div class="menu-title-price">
                                        <div class="menu-title">
                                            <h4>
                                                {{$meal->title}}
                                            </h4>
                                            <p>{!! $meal->description !!}</p>
                                        </div>
                                        <div class="menu-price">
                                            <span>{{$meal->getPrice()}}</span>
                                        </div>
                                    </div>
                                    <p><b>التصنيف</b> {{$meal->category->title??''}} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            @foreach($categories as $category)
                <div id="tab-{{$category->id}}" class="tab-pane">
                    <div class="row">
                        @foreach($category->meals as $meal)
                            <div class="col-lg-6">
                                <div class="single-menu-product mb-30">
                                    <div class="menu-product-img">
                                        <img alt="" src="{{$meal->getImage('high')}}">
                                    </div>
                                    <div class="menu-product-content">
                                        <div class="menu-title-price">
                                            <div class="menu-title">
                                                <h4>
                                                    {{$meal->title}}
                                                </h4>
                                            </div>
                                            <div class="menu-price">
                                                <span>{{$meal->getPrice()}}</span>
                                            </div>
                                        </div>
                                        {{--                                        <p><b>التصنيف</b> {{$category->title}} </p>--}}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script></script>
@endpush
