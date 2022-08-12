@extends('admin.base.index')

@section('filter')
    <div class="col-md-4 my-2 my-md-0">
        <div class="input-icon">
            <select name="category_id" id="category_id" class="form-control kt-filter">
                <option value="0">اختر التصنيف</option>
                @foreach(\App\Models\Category::all() as $category)
                    <option
                        value="{{$category->id}}" {{$category->id==request('category_id')?"selected":""}}>{{$category->title}}</option>
                @endforeach
            </select>
            <span>
                <i class="flaticon2-search-1 text-muted"></i>
            </span>
        </div>
    </div>
@endsection
@section('column')
    <script>
        let column = [
            {
                field: 'title',
                title: 'الاسم',
            },
            {
                field: 'img',
                title: 'الصورة',
                template: function (row) {
                    return '<img src="' + row.thumb + '" width="50px" /">'
                }
            },
            {
                field: 'price',
                title: 'السعر',
            },
            {
                field: 'status',
                title: 'الحالة',
                autoHide: false,
                // callback function support for column rendering
                template: function (row) {
                    return '<span class="switch switch-outline switch-icon switch-success">\
                        <label>\
                        <input type="checkbox" class="status" data-action="categories" data-id="' + row.id + '" ' + (row.status ? "checked" : "") + '/>\
                        <span></span>\
                </label>\
                </span>';
                },
            },

        ];


    </script>
@endsection
@push('scripts')
    <script>
        $('.kt-filter').on('change', function () {
            datatableTable.search($(this).val().toLowerCase(), $(this).attr('name'));
        });
    </script>
@endpush
