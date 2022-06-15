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
