<?php

return[
    /** START OF Saved User data **/

    'name' => 'Full Name',
    'username' => 'Username',
    'email' => 'Email Address',
    'password' => 'Password',
    'image' => 'Profile Image',
    'phone' => 'Phone Number',
    'role' => 'User Role',
    'status' => 'Account Status',
    'selected_address' => 'Selected address',
    /** END OF Saved User data **/
    /***************************************************/

    /** START OF Validation messages **/

    'name_regex' => 'The name must only contain letters and spaces.',
    'username_unique' => 'This username is already taken.',
    'email_unique' => 'This email is already in use.',
    'phone_unique' => 'This phone number is already registered.',
    'password_min' => 'The password must be at least :min characters.',
    'phone_regex' => 'The phone number must be in a valid format starting with 01 and followed by 9 digits.',

    'email_password_incorrect' => 'Email or Password is Incorrect',
    'address_en.regex' => 'The address in English can only contain English characters, numbers, spaces, and commas.',
    'address_ar.regex' => 'The address in Arabic can only contain Arabic characters and numbers.',
    'login_success' => 'You have successfully logged in',
    'login_error' => 'Email or Password is Incorrect',
    'address_success' => 'Address added successfully',
    'address_default_success' => 'Address selected successfully as default',
    'unauthorized' => 'Unauthorized',
    'added_to_cart' => 'Added to Cart',

    'category_exists_error' => 'A category with this name already exists.',
    'category_added_success' => 'Category has been successfully added!',
    'category_updated_success' => 'Category has been successfully updated!',
    'order_placed_success' => 'Order placed successfully!',

    'product_save_error' => 'Product could not be saved.',
    'product_update_success' => 'Product updated successfully.',
    'product_update_error' => 'Product could not be updated.',
    'product_add_success' => 'Product has been successfully added!',
    'user_update_success' => 'User updated successfully',
    'user_create_success' => 'User created successfully',
    'add_to_wishlist_success' => 'Added to wishlist.',
    'product_not_found'=>'Product not found',

    'deleted_successfully'=>'Deleted successfully',
    'icon_required' => 'The icon field is required.',
    'user_updated_success' => 'User updated successfully!',
    'user_update_failed' => 'Failed to update user.',
    'unauthorized_action' => 'You are not authorized to perform this action.',
    'wishlist_fetched_successfully' => 'Wishlist fetched successfully.',
    'address_fetched_successfully' => 'Addresses fetched successfully.',

    'address_en_required_without' => 'The English address is required if no address is selected.',
    'address_ar_required_without' => 'The Arabic address is required if no address is selected.',

    'cart_items' => 'cart items',
    'cart_items.*.quantity' => 'item quantity',
    'cart_items.*.price' => 'item price',
    'logout_success' => 'You have been logged out successfully.',

    'please_login' => 'Please login to continue',
    /*****************************************************/

    /*Success Messages*/
    'user_created_successfully' => 'User created successfully',
    /*Roles*/
    'welcome_seller' => 'Welcome again, seller :name!!',
    'welcome_customer' => 'Welcome again, our favorite customer :name!!',
    'welcome_admin'=>'Welcome again, admin :name!!',
    /*******************************************************/
    /* admin dashboard */
    'hi' => 'Hi, :name !',
    'overview' => 'Here you can view an overview of your site on this page.',
    'total_admins' => 'Total Admins',
    'total_sellers' => 'Total Sellers',
    'total_users' => 'Total Users',
    'total_categories' => 'Total Category',
    'total_products' => 'Total Products',
    'total_orders' => 'Total Orders',
    /************************************************************************/
    /** add category  **/
    'categorize_products' => 'Easily categorize your products here.',
    'add_category' => 'Add Category',
    'category_name' => 'Category Name:',
    'select_icon' => 'Select an Icon:',
    'category_description' => 'Category Description:',
    'fill_description' => 'Please fill in the description.',
    'add_category_button' => 'Add Category',
    /************************************************************************/
    /* add product */
    'add_products' => 'Easily add your products here.',
    'add_product' => 'Add Product',
    'product_name' => 'Product Name',
    'clear_name_placeholder' => 'Use a more clear name',
    'quantity' => 'Quantity',
    'price' => 'Price',
    'price_placeholder' => 'xx $',
    'sku' => 'SKU',
    'sku_placeholder' => 'xxx-x',
    'category' => 'Category',
    'select_category' => 'Select Category',
    'product_description' => 'Product Description',
    'description_placeholder' => 'This is a description for the product to help users know more about it',
    'images' => 'Images',
    'add_product_button' => 'Add Product',
    /************************************************************************/
    /*add user*/
    'add_users' => 'Easily add new users here.',
    'add_user' => 'Add User',
    'user_name' => 'User Name',
    'user_name_placeholder' => 'Full user name',
    'username_placeholder' => 'Enter username',
    'email_address' => 'Email Address',
    'email_placeholder' => 'you@example.com',
    'phone_number' => 'Phone Number',
    'phone_placeholder' => 'Your Phone Number',
    'password_placeholder' => 'Enter 6 characters or more',
    'user_roles' => 'User Roles',
    'select_roles' => 'Select Roles',
    'user_status' => 'User Profile Status',
    'select_status' => 'Select Status',
    'add_user_button' => 'Add User',
    /************************************************************************/
    /*category table*/
    'hash' => '#',
    'description' => 'Description',
    'icon' => 'Icon',
    'created_at' => 'Created At',
    'actions' => 'Actions',
    /************************************************************************/
    'added_by' => 'Added By',
    'no_image' => 'No image available',
    /************************************************************************/
    // Filter Form
    'filter_by_role' => 'Filter by Role:',
    'all_roles' => 'All Roles',
    'admin' => 'Admin',
    'seller' => 'Seller',
    'customer' => 'Customer',

    'filter_by_status' => 'Filter by Status:',
    'all_statuses' => 'All Statuses',
    'active' => 'Active',
    'inactive' => 'Inactive',
    'apply_filter' => 'Apply Filter',

    // Table Headers
    'id' => 'ID',
    'profile_image' => 'Profile Image',
    /************************************************************************/
    'change_info' => 'Change information about yourself on this page.',
    'update_profile' => 'Update Profile',
    'personal_image' => "Personal Image (leave blank if you don't want to change it)",
    'no_profile_image' => 'No profile image available. The default image is set.',
    'full_name' => 'Full Name',
    'fill_in_email' => 'Please fill in the email',
    'leave_blank_password' => "leave blank if you don't want to change it",
    'save_changes' => 'Save Changes',
    /************************************************************************/
    'dookan_admin' => 'Dookan Admin',
    'hi_user' => 'Hi,',
    'english' => 'English',
    'arabic' => 'Arabic',
    /************************************************************************/
    'dashboard' => 'Dashboard',
    'design_studio' => 'Design Studio',
    'forms' => 'Forms',
    'tables' => 'Tables',
    'show_users' => 'Show Users',
    'show_categories' => 'Show Category',
    'show_products' => 'Show Products',
    'pages' => 'Pages',
    'profile' => 'Profile',
    'logout' => 'Logout',
    /************************************************************************/
    'categorize_products_here' => 'Easily categorize your products here.',
    'edit_category' => 'Edit Category',
    /************************************************************************/
    'edit_product' => 'Edit Product',
    'use_clear_name' => 'Use a more clear name',
    'product_description_placeholder' => 'This is a description to help users know more about the product',
    'leave_blank_if_no_change' => 'Leave blank if you don’t want to change it',
    'current_images' => 'Current Images',
    'product_image' => 'Product Image',
    'no_images' => 'No images available, please add some images.',
    /************************************************************************/
    'edit_user_data' => 'Easily edit user data here.',
    'leave_sections_blank' => 'Leave sections blank if you don’t want to change it.',
    'edit_user' => 'Edit User',
    'full_user_name' => 'Full user name',
    'example_email' => 'you@example.com',
    'phone_number_placeholder' => 'Your Phone Number',
    'user_profile_status' => 'User Profile Status',
    'user_image' => 'User Image',
    'default_image' => 'default image',
    /************************************************************************/
    'login_page' => 'Login Page',
    'submit' => 'Submit',
    /************************************************************************/
    'login' => 'Login',
    'forgot_password' => 'Forgot Password?',
    'no_account' => "Don't have an account?",
    'sign_up' => 'Sign Up',
    'placeholder_email' => 'you@example.com',
    'placeholder_password' => 'Enter 6 characters or more',
    'login_illustration_alt' => 'Login Illustration',
    /************************************************************************/
    'register' => 'Register',
    'placeholder_full_name' => 'Your Full Name',
    'placeholder_username' => 'Your Username',
    'placeholder_phone' => 'Your Phone Number',
    'already_have_account' => 'Already have an account?',
    'login_here' => 'Login here',
    'register_illustration_alt' => 'Registration Illustration',
    /************************************************************************/
    'placeholder_product_name' => 'Use a more descriptive name',
    'placeholder_price' => 'xx $',
    'placeholder_sku' => 'xxx-x',
    'placeholder_description' => 'This is a description to help users understand more about this product.',
    'leave_blank' => 'Leave blank if you don’t want to change it',
    'product_image_alt' => 'Product Image',
    'no_images_available' => 'No images available, please add some images.',
    /************************************************************************/
    'add_your_products' => 'Easily add your products here.',
    /************************************************************************/
    'dookan_seller' => 'Dookan Seller',
    /************************************************************************/
    'dashboard_overview' => 'Here You can view an overview of your site on this page.',
    /************************************************************************/
    'logo_alt' => 'Dookan Logo',
    'search_placeholder' => 'Search for items and inspiration',
    /************************************************************************/
    'vendors' => 'Vendors',
    'categories' => 'Categories',
    'contact_us' => 'Contact Us',
    /************************************************************************/
    'orders' => 'Orders',
    'addresses' => 'Addresses',
    /************************************************************************/
    'no_products' => "There isn't any products, come back soon!",
    'no_products_image_alt' => "No products available",
    'product_hover_image_alt' => 'Hover image of :name',
    'show_product' => 'Show :name',
    'add_to_wishlist' => 'Add :name to Wishlist',
    'login_to_add_wishlist' => 'Please login to add this item to wishlist',
    'add_to_cart' => 'Add :name to Cart',
    'login_to_add_cart' => 'Please login to add this item to cart',
    /************************************************************************/
    'thumbnail_image_alt' => 'Thumbnail image of :name',
    'in_stock' => 'In Stock',
    'out_of_stock' => 'Out of Stock',
    'per_unit' => 'per unit',
    'no_product_available' => 'Sorry for that, come back soon!',
    'no_product_image_alt' => 'No product data available',
    'add_to_cart_btn'=>'Add to cart',
    /************************************************************************/
    'empty_cart_message' => "There isn't any products in Your cart, Add products and come back soon!",
    'shopping_cart' => 'Shopping Cart',
    'back_to_shop' => 'Back to shop',
    'summary' => 'Summary',
    'items_count' => 'ITEMS :count',
    'shipping' => 'SHIPPING',
    'total_price' => 'TOTAL PRICE',
    'checkout' => 'CHECKOUT',
    'choose_address' => 'Choose Address',
    'select_saved_address' => 'Please select one of your saved addresses:',
    'address' => 'Address',
    'no_address' => "You don't have any addresses. Please add one.",
    'address_en' => 'Address in (English)',
    'address_ar' => 'Address in (Arabic)',
    'close' => 'Close',
    'submit_order' => 'Submit Order',
    /************************************************************************/
    'my_wishlist' => 'My Wishlist',
    'empty_wishlist_message' => "There isn't any products in Your wishlist, Add products and come back soon!",
    'unit_price' => 'Unit Price',
    'stock_status' => 'Stock Status',
    'out_of_stock_message' => 'Out of Stock',
    'remove_from_wishlist' => 'Remove from Wishlist',
    /************************************************************************/
    'add_address_info' => 'Add your address information on this page.',
    'address_english' => 'Address (English)',
    'address_arabic' => 'Address (Arabic)',
    'select_address' => 'Select Address',
    'no_addresses_found' => 'No addresses found for this user.',
    /************************************************************************/
    'address_en.required_without' => 'Please provide an English address if no other address is selected.',
    'address_ar.required_without' => 'Please provide an Arabic address if no other address is selected.',
    'selected_address.exists' => 'The chosen address is invalid or does not exist.',
    /************************************************************************/
    /** all vendors page **/
    'our_vendors' => 'Our Vendors',
    'welcome_message' => 'Welcome to our comprehensive list of trusted vendors!',
    /** all Categories page **/
    'our_categories' => 'Our Categories',
    'categories_welcome_message' => 'Welcome to our comprehensive list of categories!',

];
