// Visit https://api.prokerala.com/demo/birth-details.php to see the following code in action
const PK_API_CLIENT_ID = 'd5d9461b-49f7-4339-8a1b-72cf9fa7b4ee';

(function() {

    function loadScript(cb) {
        var script = document.createElement('script');
        //script.src = 'https://client-api.prokerala.com/static/js/location.min.js';
        script.src = "{{asset('js/location.min.js')}}";
        script.onload = cb;
        script.async = 1;
        document.head.appendChild(script);
    }

    function createInput(id, name, value) {
        const input = document.createElement('input');
        input.name = name;
        //input.id = id;
        input.type = 'hidden';

        return input;
    }

    function initWidget(input) {
        const form = input.form;
        const inputPrefix = input.dataset.location_input_prefix ? input.dataset.location_input_prefix : '';
        const coordinates = createInput("coordinates", inputPrefix + 'coordinates');
        const timezone = createInput("timezone", inputPrefix + 'timezone');
        form.appendChild(coordinates);
        form.appendChild(timezone);
        //alert('Hi');
        new LocationSearch(input, function(data) {
            coordinates.value = `${data.latitude},${data.longitude}`;
            timezone.value = data.timezone;
            input.setCustomValidity('');
        }, { clientId: PK_API_CLIENT_ID, persistKey: `${inputPrefix}loc` });

        input.addEventListener('change', function(e) {
            //alert('Hi');
            input.setCustomValidity('Please select a location from the suggestions list');
        });

        window.onload = function() {
            localStorage.removeItem(`prokerala-location-${inputPrefix}loc`)
        };

    }
    loadScript(function() {
        let location = document.querySelectorAll('.prokerala-location-input');
        Array.from(location).map(initWidget);
        $('.prokerala-location-input').val('');
    });

})();