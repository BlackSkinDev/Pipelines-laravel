@extends('layouts.app')
@section('title','Laravel | Pipelines')
@section('content')

<main class="main_wrapper">
    <div class="container small_container">
        <h4 class="title_1">All Products</h4>

        <div class="row">

            <div class="col-md-3 section_order_0 left_sidebar" style="margin-top:30px;">

                <form method="post" action="" style="position: sticky; top: 30px" id="filter-form">
                    @csrf
                    <div style="">
                        <span style="font-weight:560">By Time</span>
                        <a style="float: right;color:white;" class="btn btn-danger btn-sm" id="reset"><i class="fa fa-refresh"></i></a>
                    </div>
                    <hr>
                    <div>
                        <select class="form-control" name="date_type" id="date_filter">
                            <option value="">Select time</option>
                            <option value="today">Today</option>
                            <option value="tomorrow">Tomorrow</option>
                            <option value="week">This week</option>
                            <option value="month">This month</option>
                        </select>
                    </div>

                    <h6 class="mt-3">By Probability</h6>
                    <hr>
                    <div>
                        <div class="search-box">
                            <div><input type="checkbox" name="probability_type" value="high" class="probCheckbox" id="high"></div>
                            <div><p id="highlabel" class="bold" >1X2 High (Type A or B >= 70)</p></div>
                        </div>
                        <div class="search-box">
                            <div><input type="checkbox" name="probability_type" value="moderate" class="probCheckbox" id="moderate"></div>
                            <div><p id="moderatelabel">1X2 Moderate <br>(Type A and B > 50 < 69)</p></div>
                        </div>
                        <div class="search-box">
                            <div><input type="checkbox" name="probability_type" value="low" class="probCheckbox" id="low"></div>
                            <div><p id="lowlabel">1X2 Low (Type A and B < 50)</p></div>
                        </div>
                    </div>

                    <div class="mt-1">
                        <h6>By Category</h6>
                        <hr>
                        <div class="search-box">
                            <div><input type="checkbox" class="checkAllCategories" id="all"></div>
                            <div><p id="alllabel">All categories</p></div>
                        </div>

                        @foreach($categories as $category)
                            <div class="search-box">
                                <div><input type="checkbox" name="category" value="{{$category->id}}" class="categoryCheckbox" id="{{$category->id}}"></div>
                                <div><p id="{{$category->id}}label">{{$category->name}}</p></div>
                            </div>
                        @endforeach
                    </div>
                    <button class="btn btn-success btn-sm" id="filter-button">Apply</button>
                </form>

            </div>

            <div class="col-md-8" id="product-div">
                @if(count($products) > 0)

                    @foreach($products as $category=>$singleProduct)

                        <h4 class="mt-4">{{ucfirst($category)}}</h4>

                        <div class="white_box_content match_table_content">
                            <div class="table-responsive table-striped table-bordered">

                                <table class="table match_table m-0" id="myTable">

                                    <thead>
                                        <th class="text-left">
                                        <div>Product Name</div>
                                        </th>
                                        <th>
                                        <div class="small_width">
                                        <div>Type Perishable Probability %</div>
                                        <div class="flex_between d-flex" style="column-gap: 15px">
                                        <span>A</span>
                                        <span>B</span>
                                        </div>
                                        </div>
                                        </th>
                                        <th>
                                        <div>Date Registered</div>
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($singleProduct as $product)
                                            <tr>
                                                <td>{{$product->name}}</td>
                                                <td class="small_width">
                                                    <div class="flex_between small_width d-flex" style="column-gap: 15px">

                                                        <span>
                                                            @if($product->type_a_perish_probability > $product->type_b_perish_probability)
                                                                <span class="text-danger">{{$product->type_a_perish_probability}}</span>
                                                            @else
                                                                <span>{{$product->type_a_perish_probability}}</span>
                                                            @endif
                                                        </span

                                                        <span>
                                                            @if($product->type_b_perish_probability > $product->type_a_perish_probability)
                                                                <span class="text-danger">{{$product->type_b_perish_probability}}</span>
                                                            @else
                                                                <span>{{$product->type_b_perish_probability}}</span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>{{date('d/m/Y H:i ',strtotime($product->registered_at))}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                            </div>
                        </div>

                    @endforeach

                @else
                    <h5 class="mt-4">No products available</h5>
                @endif
            </div>

        </div>

    </div>
</main>

@endsection
@section('scripts')
<script src="{{asset('js/script.js')}}"></script>
@endsection
