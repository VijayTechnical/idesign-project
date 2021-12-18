<div>
    @if ($product)
        <div class="price-cal-modal modal fade" id="PriceCalcModal" tabindex="-1" role="dialog"
            aria-labelledby="demoModal" aria-hidden="true" wire:ignore>
            <div class="modal-dialog
    modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="text-center price-calc-modal-head
                ">
                            <i class="fas fa-calculator"></i>
                            <h3>Price Calculator</h3>
                        </div>
                        <hr>
                        <!-- <form>
                <div
                    class="form-group">
                    <label
                        for="exampleInputEmail1">Email
                        address</label>
                    <input
                        type="email"
                        class="form-control"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                        placeholder="Enter
                        email">
                </div>
            </form> -->

                        <div class="card-radio-tile-group">
                            @foreach ($product->attributeValues->unique('attribute_id') as $attributeValue)
                                <h4 class=card-radio-size-heading>{{ $attributeValue->Attribute->name }}</h4>
                                <div class="card-radio-size-container">
                                    <div class="input-container">
                                        <select name="{{ $attributeValue->Attribute->name }}"
                                            id="{{ $attributeValue->Attribute->name }}" class="form-control"
                                            id="{{ $attributeValue->Attribute->name }}"
                                            wire:model="sattr.{{ $attributeValue->Attribute->name }}">
                                            <option value="">Choose</option>
                                            @foreach ($attributeValue->Attribute->attributeValues->where('product_id', $product->id) as $pav)
                                                <option value="{{ $pav->value }}">
                                                    {{ $pav->value }}
                                                </option>

                                            @endforeach
                                        </select>
                                        <label
                                            for="{{ $attributeValue->Attribute->name }}">{{ $attributeValue->Attribute->name }}</label>
                                    </div>
                                    {{-- <div class="input-container">
                                    <input id="front-card" class="radio-button" type="radio" name="radio" />
                                    <div class="radio-tile">
                                        <div class="icon front-card">
                                            <img src="images/idesign/calc-font-card.png" alt="">
                                        </div>
                                        <label for="front-card" class="radio-tile-label">Front Side</label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input id="font-back-card" class="radio-button" type="radio" name="radio" />
                                    <div class="radio-tile">
                                        <div class="icon font-back-card-icon">
                                            <img src="images/idesign/calc-font-back-card.png" alt="">
                                        </div>
                                        <label for="front-back-card" class="radio-tile-label">Front & Back
                                            Side</label>
                                    </div>
                                </div> --}}
                                </div>
                            @endforeach
                        </div>

                        <div class="card-radio-tile-group quangroup">
                            <h4 class=card-radio-size-heading>Quantity</h4>
                            <div class="card-radio-size-container">
                                @for ($i = 1; $i < 5; $i++)
                                    <div class="input-container">
                                        <input id="front-card" class="radio-button" type="radio" name="radio-quan"
                                            wire:model="qty" value="{{ $i }}" />
                                        <div class="radio-tile">
                                            <div class="icon front-card">
                                                <div class="quantity_label_number">
                                                    <p>{{ $i }}</p>
                                                </div>
                                            </div>
                                            <label for="front-card" class="radio-tile-label">Rs.
                                                {{ $product->regular_price * $i }}</label>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>




                        <div class="card-radio-tile-group">
                            <h4 class="card-radio-size-heading">Corner</h4>
                            <div class="card-radio-size-container">
                                <div class="input-container round-straight">
                                    <input id="front-card" class="radio-button" type="radio" name="round-radio" />
                                    <div class="radio-tile">
                                        <p>straight</p>
                                        <div class="straight-container">
                                            <div class="background-container"></div>
                                        </div>
                                        <label for="straight" class="radio-tile-label">Rs.
                                            0.00</label>
                                    </div>
                                </div>
                                <div class="input-container round-straight">
                                    <input id="font-back-card" class="radio-button" type="radio" name="round-radio" />
                                    <div class="radio-tile">
                                        <p>Round</p>
                                        <div class="round-container">
                                            <div class="background-container round-added">
                                            </div>
                                        </div>
                                        <label for="round" class="radio-tile-label">Rs.100</label>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div style="display: flex; gap: 10px; align-items: center; justify-items: center;">

                            <label class="wrapper" for="states">
                                <h4 style=" font-size: 15px; color: #cc0000;"> do you
                                    want
                                    to include your custoin design ?</h4>
                            </label>
                            <div class="button dropdown">
                                <select id="colorselector">
                                    <option value="no">no</option>
                                    <option value="yes">yes</option>

                                </select>
                            </div>
                        </div>

                        <div class="output">
                            <div id="yes" class="colors red">
                                <form action="">
                                    <label for="img">Select image:</label>
                                    <input type="file" id="img" name="img" accept="image/*">
                                    <input type="submit">
                                </form>
                            </div>

                        </div>

                        <style>
                            .colors {
                                padding: 2em;
                                color: black;
                                display: none;
                            }

                        </style>

                        <script>
                            $(function() {
                                $('#colorselector').change(function() {
                                    $('.colors').hide();
                                    $('#' + $(this).val()).show();
                                });
                            });
                            // [forked from](http://jsfiddle.net/FvMYz/)
                            // [show-hide-based-on-select-option-jquery)(http://stackoverflow.com/questions/2975521/show-hide-div-based-on-select-option-jquery/2975565#2975565)
                        </script>






                        <div class="table" style="margin-top: 10px;">
                            <div class="th">
                                <div class="td">category</div>
                                <div class="td">price</div>

                            </div>
                            <div class="tbody">
                                <div class="tr">
                                    <div class="td">per piece</div>
                                    <div class="td">RS 10</div>
                                </div>

                                <div class="tr">
                                    <div class="td">sub total</div>
                                    <div class="td">RS 10</div>
                                </div>
                                <div class="tr">
                                    <div class="td">total</div>
                                    <div class="td">RS 10</div>
                                </div>
                            </div>
                        </div>

                        <div class="card-radio-tile-group">
                            <p class="no-margin brand-color"> <br> (all
                                inclusive
                                of shipping & taxes) </p>
                        </div>

                        <div class="priceModal-button">
                            @if ($product->sale_price > 0)
                                <button href="#"
                                    wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->sale_price }})">Add
                                    to cart</button>
                            @else
                                <button href="#"
                                    wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})">Add
                                    to cart</button>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
</div>
@endif
</div>
