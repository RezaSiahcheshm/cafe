@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{--                        @foreach($products as $product)--}}
                        {{--                            <ul>--}}
                        {{--                                <li>--}}
                        {{--                                    {{$product->title}}--}}
                        {{--                                    @foreach($product->addons()->get() as $addon)--}}
                        {{--                                        <ul>--}}
                        {{--                                            <li>--}}
                        {{--                                                {{$addon->title}}--}}
                        {{--                                            </li>--}}
                        {{--                                        </ul>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </li>--}}
                        {{--                            </ul>--}}
                        {{--                        @endforeach--}}
                        <form>
                            <div class="form-row ">
                                <div class="col-2">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">محصول</label>
                                    <select class="custom-select mr-sm-2" id="productSelect">
                                        <option value="0" selected>انتخاب کند...</option>
                                        @foreach($products as $product)
                                            <option value="{{$product->price}}">{{$product->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2" id="addonHide">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect"> افزودنی</label>
                                    <select class="custom-select mr-sm-2" id="addonSelect">
                                        <option value="0" selected>انتخاب کند...</option>
                                        @foreach($product->addons()->get() as $addon)
                                            <option value="{{$addon->price}}">{{$addon->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2 mr-2 d-flex flex-column">
                                    <span class="mb-3">قیمت قهوه</span>
                                    <span class="" id="priceProduct">0</span>
                                </div>
                                <div class="col-2 mr-2 d-flex flex-column">
                                    <div class="mb-3">قیمت افزودنی</div>
                                    <div class="" id="priceAddon">0</div>
                                </div>
                                <div class="col-2 mr-2 d-flex flex-column">
                                    <div class="mb-3">جمع کل</div>
                                    <div class="" id="price">0</div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#addonHide").hide();
        $("#productSelect").change(function() {
            if($(this).val()==0){
                $("#addonHide").hide();
            }else{
                $("#addonHide").show();
            }
            if ($.isNumeric($(this).val())) {
                $("#priceProduct").html($(this).val());
                $("#price").html(parseInt($("#productSelect").val()) + parseInt($("#addonSelect").val()));

            } else {
                $("#priceProduct").empty();
            }
        });
        $("#addonSelect").change(function() {
            if ($.isNumeric($(this).val())) {
                $("#priceAddon").html($(this).val());
                $("#price").html(parseInt($("#productSelect").val()) + parseInt($("#addonSelect").val()));

            } else {
                $("#priceAddon").empty();
            }
        });


    </script>

@endsection
