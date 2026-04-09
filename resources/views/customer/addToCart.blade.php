@extends('customer.Layouts.theme')
@section('contents')
    <section class="section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Add to Cart</h2>
        </div>
        <div class="container" data-aos="fade-up">


            <div class="row">
                <div class="col-4 ms-3">
                    @if ($menu->image == null)
                        <img src="{{ asset('uploads/menudef/question mark.jpg') }}" class="border-0 img-thumbnail ms-5"
                            style="height: 400px" alt="">
                    @else
                        @switch($menu->category_id)
                            @case(1)
                            @case(2)

                            @case(5)
                            @case(6)

                            @case(7)
                                <img src="{{ asset('uploads/pizzas/' . $menu->image) }}" class="border-0 img-thumbnail ms-5"
                                    style="height: 400px" alt="">
                            @break

                            @case(3)
                                <img src="{{ asset('uploads/softdrinks/' . $menu->image) }}" class="border-0 img-thumbnail ms-5"
                                    style="height: 400px" alt="">
                            @break

                            @case(8)
                                <img src="{{ asset('uploads/combos/' . $menu->image) }}" class="border-0 img-thumbnail ms-5"
                                    style="height: 400px" alt="">
                            @break

                            @case(9)
                                <img src="{{ asset('uploads/desserts/' . $menu->image) }}" class="border-0 img-thumbnail ms-5"
                                    style="height: 400px" alt="">

                                @default
                            @endswitch
                        @endif
                    </div>
                    <div class="col-6 offset-1">
                        <div class="my-3 row">
                            <div class="col-5"><strong class="h5">Name :</strong></div>
                            <div class="col">{{ $menu->name }}</div>
                        </div>
                        <div class="my-3 row">
                            <div class="col-5"><strong class="h5">Category Name :</strong></div>
                            <div class="col">{{ $category_name }}</div>
                        </div>
                        <div class="my-3 row">
                            <div class="col-5"><strong class="h5">Description :</strong></div>
                            <div class="col">{{ $menu->description }}</div>
                        </div>
                        <div class="my-3 row">
                            <div class="col-5"><strong class="h5">Price :</strong></div>
                            <div class="col">{{ $menu->price }}$</div>
                        </div>
                        <div class="my-3 row">
                            <div class="col-5"><strong class="h5">Quantity :</strong></div>
                            <div class="col">
                                <div class="gap-2 quantity-control d-flex align-items-center">
                                    <div class="input-group input-group-sm quantity-wrapper">
                                        <button type="button" class="px-2 py-1 btn btn-outline-light rounded-circle btn-sm"
                                            onclick="decreaseQty(this)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="text" name="qty" class="mx-1 text-center form-control qty-input"
                                            value="1" readonly>
                                        <button type="button" class="px-2 py-1 btn btn-outline-light rounded-circle btn-sm"
                                            onclick="increaseQty(this)">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="my-3 row">
                            <div class="col-5"><strong class="h5">Total price :</strong></div>
                            <div class="col price">{{ $menu->price }}$</div>
                        </div>
                        {{-- <div class="my-3 row">
                        <div class="col-5"><strong class="h5">Rate this menu :</strong></div>

                    </div> --}}
                        <div class="my-3 row">
                            <div class="col">
                                <button type="button" class="btn btn-sm btn-outline-primary me-2 addtocart-btn"><i
                                        class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
                                <a href="{{ route('customerMenu') }}" class="btn btn-sm btn-outline-warning">Back</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </section>
        <!-- Topping Modal -->
        <div class="modal fade" id="toppingModal" tabindex="-1" aria-labelledby="toppingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="p-4 text-center modal-content">
                    <h5 class="mb-3 modal-title" id="toppingModalLabel">Would you like to add toppings?</h5>
                    <div class="gap-3 d-flex justify-content-center">
                        <a id="yesTopping" class="btn btn-success">Yes, Add Toppings</a>
                        <a href="{{ route('customerCart') }}" class="btn btn-secondary">No, Go to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script>
            function increaseQty(button) {
                const input = button.previousElementSibling;
                let currentValue = parseInt(input.value);
                input.value = currentValue + 1;
                updatePrice();
            }

            function decreaseQty(button) {
                const input = button.nextElementSibling;
                let currentValue = parseInt(input.value);
                if (currentValue > 1) {
                    input.value = currentValue - 1;
                    updatePrice();
                }
            }

            function updatePrice() {
                const qtyInput = document.querySelector('.qty-input');
                const priceElement = document.querySelector('.price');
                const unitPrice = {{ $menu->price }};
                const totalPrice = unitPrice * parseInt(qtyInput.value);
                priceElement.textContent = totalPrice + '$';
            }
        </script>
        <script>
            $(document).ready(function() {
                $('.addtocart-btn').click(function() {
                    let qty = $('.qty-input').val();
                    let menu_id = {{ $menu->id }};
                    let category_id = {{ $menu->category_id }};

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('customerAddToCart') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            menu_id: menu_id,
                            category_id: category_id,
                            quantity: qty,
                        },
                        success: function(response) {
                            if (response.success) {
                                let category_id = response.category_id;
                                if (category_id == 1 || category_id == 2 || category_id == 5 ||
                                    category_id == 6 || category_id == 7) {
                                    let cartId = response.cart_id;

                                    // Show Bootstrap modal
                                    let modal = new bootstrap.Modal(document.getElementById(
                                        'toppingModal'));
                                    modal.show();

                                    // Set dynamic topping link
                                    $('#yesTopping').attr('href', '/customer/cart/toppings/' +
                                        cartId);
                                } else {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Added to Cart',
                                        text: 'Your item has been added to the cart.',
                                        showCancelButton: true,
                                        confirmButtonText: 'Go to Cart',
                                        cancelButtonText: 'Continue Shopping'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href =
                                                '{{ route('customerCart') }}';
                                        }
                                        // If they cancel, do nothing (stay on the same page)
                                    });

                                }


                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message,
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Something went wrong. Please try again.',
                            });
                        }
                    });
                });
            });
        </script>
    @endsection
