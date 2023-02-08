let auth_token;
$(document).ready(function() {
    $.ajax({
        type: 'get',
        url: 'https://www.universal-tutorial.com/api/getaccesstoken',
        success: function(data) {
            auth_token = data.auth_token;
            getCountry();
        },
        error: function(error) {
            console.log(error);
        },
        headers: {
            "Accept": "application/json",
            "api-token": "t2Nx9FaAc8lzEJJkipgYKd60smK3erRbF_1M2BHsDHWY4tpjHNW3RKTC0NPSjugtIj4",
            "user-email": "rudrayya_mathad@ampwork.com",
        }
    })

    $('#country').change(function() {
        getState();
    });
    $('#state').change(function() {
        getCity();
    })
});

function getCountry() {
    $.ajax({
        type: 'get',
        url: 'https://www.universal-tutorial.com/api/countries',
        success: function(data) {
            // console.log(data);
            data.forEach(element => {
                $('#country').append('<option value="' + element.country_name + '">' + element.country_name + '</option>')
            });
        },
        error: function(error) {
            console.log(error);
        },
        headers: {
            "Authorization": "Bearer " + auth_token + "",
            "Accept": "application/json"
        }
    })
}

function getState() {
    let country_name = $('#country').val();
    $.ajax({
        type: 'get',
        url: 'https://www.universal-tutorial.com/api/states/' + country_name,
        success: function(data) {
            $('#state').empty();
            data.forEach(element => {
                $('#state').append('<option value="' + element.state_name + '">' + element.state_name + '</option>')
            });
        },
        error: function(error) {
            console.log(error);
        },
        headers: {
            "Authorization": "Bearer " + auth_token + "",
            "Accept": "application/json"
        }
    })
}

function getCity() {
    let state_name = $('#state').val();
    $.ajax({
        type: 'get',
        url: 'https://www.universal-tutorial.com/api/cities/' + state_name,
        success: function(data) {
            $('#city').empty();
            data.forEach(element => {
                $('#city').append('<option value="' + element.city_name + '">' + element.city_name + '</option>')
            });
        },
        error: function(error) {
            console.log(error);
        },
        headers: {
            "Authorization": "Bearer " + auth_token + "",
            "Accept": "application/json"
        }
    })
}