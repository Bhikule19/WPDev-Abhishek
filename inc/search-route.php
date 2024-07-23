<?php 

//The add_action function is used to hook into the rest_api_init action, which is triggered when the REST API is initialized. This allows us to register our custom route.
add_action('rest_api_init', 'universityRegisterSearch');


//Inside the universityRegisterSearch function, we use the register_rest_route function to define a new REST route. The first parameter is the namespace (university/v1), the second parameter is the route name (search), and the third parameter is an array of configuration options.

//Inside the configuration array, we specify the HTTP method (WP_REST_SERVER::READABLE, which means the route will respond to GET requests) and the callback function (universitySearchResults).
function universityRegisterSearch() {
    register_rest_route('university/v1', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'universitySearchResults'
    ));
}

function universitySearchResults(){
    return 'Congratulations, you created a new route';
}