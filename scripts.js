$(document).ready(function() {
    // Function to load products initially
    loadProducts();

    // Function to load products from database
    function loadProducts() {
        $.ajax({
            url: 'load_products.php', // Adjust this to your product listing script
            type: 'GET',
            success: function(response) {
                $('#productTable tbody').html(response);
            },
            error: function(xhr, status, error) {
                console.error('Error loading products:', error);
            }
        });
    }

    // Save product button click event
    $('#saveProductButton').click(function() {
        var productName = $('#productName').val();
        var productPrice = $('#productPrice').val();
        var productSale = $('#productSale').val();
        var productStocks = $('#productStocks').val();
        var productImage = $('#productImage')[0].files[0];

        var formData = new FormData();
        formData.append('productName', productName);
        formData.append('productPrice', productPrice);
        formData.append('productSale', productSale);
        formData.append('productStocks', productStocks);
        formData.append('productImage', productImage);

        $.ajax({
            url: 'add_product.php', // PHP script to handle insertion
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response); // Log response from PHP script (debugging)
                $('#addProductModal').modal('hide'); // Hide modal on success
                $('#addProductForm')[0].reset(); // Clear form fields
                loadProducts(); // Reload products list
            },
            error: function(xhr, status, error) {
                console.error('Error saving product:', error);
            }
        });
    });

    // Other event handlers for edit and update can remain as previously discussed
});
