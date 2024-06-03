<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Delivery App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    /* body {
        background: linear-gradient(to bottom, #8B4513, #D2B48C);
    } */

    </style>

</head>
<body>
    <!-- Navbar -->
    <nav class="bg-transparent absolute w-full z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="#">
                        <img class="h-8 w-auto" src="https://via.placeholder.com/100x40" alt="Logo">
                    </a>
                </div>
                <!-- Mobile Menu Toggle Button -->
                <div class="flex md:hidden items-center">
                    <button id="mobile-menu-toggle" class="focus:outline-none">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="#home" class="text-white hover:text-gray-300 inline-flex items-center px-1 pt-1 text-sm font-medium">Home</a>
                    <a href="#menu" class="text-white hover:text-gray-300 inline-flex items-center px-1 pt-1 text-sm font-medium">Menu</a>
                    <a href="#contact" class="text-white hover:text-gray-300 inline-flex items-center px-1 pt-1 text-sm font-medium">Contact</a>
                </div>
                <!-- <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <button class="bg-indigo-600 text-white px-3 py-2 rounded-md text-sm font-medium">Login</button>
                </div> -->
            </div>
        </div>
    </nav>


    <!-- Banner -->
    <div class="relative bg-cover bg-center h-screen" style="background-image: url('images/banner.jpg');" id="home">
        <div class="absolute inset-0 bg-opacity-50 flex items-center justify-center">
            <div class="absolute top-0 left-0 mt-40 ml-20">
                <h6 class="text-white text-uppercase mb-2">NOW YOU CAN FEEL THE ENERGY</h6>
                <h1 class="text-white text-5xl font-bold">
                    Welcome to Our Food 
                    <br class="mx-2">
                    Delivery App
                </h1>
                <a href="#menu" class="mt-4 inline-block px-6 py-3 bg-white text-black rounded-lg shadow-md hover:bg-gray-200">Menu</a>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="max-w-7xl mx-auto py-12 sm:px-6 lg:px-8" id="contact">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <img class="w-full h-full object-cover rounded-lg shadow-lg" src="images/contact.jpg" alt="Contact Image">
            </div>
            <div class="flex flex-col justify-center">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Contact Us</h2>
                <p class="text-gray-600 mb-4">Have any questions or need help? Feel free to reach out to us. We are here to help you with any inquiries or support you may need. You can contact us through the following channels:</p>
                <ul class="list-disc pl-5 text-gray-600">
                    <li>Email: support@fooddeliveryapp.com</li>
                    <li>Phone: +1 234 567 890</li>
                    <li>Address: 123 Food Street, Delicious City, FL 12345</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Card Menu -->
    <div class="mx-auto py-12 sm:px-6 lg:px-8 bg-cover" id="menu" style="background-image: url('images/menu-bg.jpg');">
        <h1 class="text-3xl font-semibold text-gray-900 mb-6 text-center">What kind of Coffee we serve for you</h1>
        <p class="text-gray-600 mb-6 text-center">We serve a variety of coffee beans, from Arabica to Robusta, to give you the perfect taste.</p>
        <div class="max-w-7xl mx-auto py-12 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card Example -->
            @foreach($menus as $menu)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-32 sm:h-48 object-cover" src="{{ asset('images/menu/' . $menu->image) }}" alt="{{ $menu->name }}">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $menu->name }}</h3>
                    <p class="mt-2 text-gray-600">{{ $menu->description }}</p>
                    <h4 class="mt-2 text-gray-400">{{ $menu->outlet->name }}</h4>
                    <div class="flex items-center mt-3">
                        <span class="text-gray-900 font-bold">Rp.{{ number_format($menu->price, 3) }}</span>
                    </div>
                    <!-- Order Button -->
                    <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#orderModal-{{ $menu->id }}">
                    Order
                    </button>
                </div>
            </div>
             <!-- Modal -->
            <div class="modal fade" id="orderModal-{{ $menu->id }}" tabindex="-1" aria-labelledby="orderModalLabel-{{ $menu->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="orderModalLabel-{{ $menu->id }}">Order {{ $menu->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('orders.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="outlet_id" value="{{ $menu->outlet_id }}">
                                <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                <input type="hidden" id="price-{{ $menu->id }}" value="{{ $menu->price }}">
                                <div class="form-group">
                                    <label for="customer_name">Customer Name</label>
                                    <input type="text" name="customer_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="customer_phone">Customer Phone</label>
                                    <input type="text" name="customer_phone" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="quantity-{{ $menu->id }}">Quantity</label>
                                    <input type="number" name="quantity" id="quantity-{{ $menu->id }}" class="form-control" required oninput="calculateTotal('{{ $menu->id }}')">
                                </div>
                                <div class="form-group">
                                    <label for="total_price-{{ $menu->id }}">Total Price (Rp)</label>
                                    <input type="number" step="0.01" name="total_price" id="total_price-{{ $menu->id }}" class="form-control" readonly>
                                </div>
                                <button type="submit" class="btn btn-success">Submit Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-500">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <p class="text-white">© 2024 Food Delivery App. All rights reserved.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-white">Privacy Policy</a>
                    <a href="#" class="text-white hover:text-white">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
</body>
<script>
function calculateTotal(menuId) {
    var price = document.getElementById('price-' + menuId).value;
    var quantity = document.getElementById('quantity-' + menuId).value;
    var total = price * quantity;
    document.getElementById('total_price-' + menuId).value = total.toFixed(3);
}
</script>
</html>
