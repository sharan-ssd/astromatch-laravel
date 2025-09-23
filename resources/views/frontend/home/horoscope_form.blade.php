<div class="hero-form" id="new_partner_details_form">
    <div class="form-header">
        <h2>Get Your Free Compatibility Score</h2>
        <p>Limited Time: Free Basic Report</p>
    </div>
    <form method="post" onsubmit="validateHorosope(event);" action="/submit-horoscope">
        @csrf
        <div class="form-group">
            <label class="form-label">Your's Fullname <span style='color:#e91e63; font-weight:bold;'>(Male
                    Horoscope)</span></label>
            <input type="text" id="fullname_male" name="fullname_male" class="form-control" placeholder="Full Name"
                validations="required:true;length:5">
        </div>

        <div class="form-group">
            <label class="form-label">Your Date of Birth</label>
            <div class="row">
                <div class="col-sm-4 ">
                    <div class="form-control-group mb-3">
                        <select class="form-control form-select" name="male-year" id="male-year"
                            onchange="updateDays('male')" validations="required:true">
                            <option value="" selected="" disabled="">-YYYY-</option>
                            @for ($i = date('Y'); $i >= 1950; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="form-control-group mb-3">
                        <select class="form-control form-select" name="male-month" id="male-month"
                            onchange="updateDays('male')" validations="required:true">
                            <option value="" selected="" disabled="">-MM-</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="form-control-group mb-3">
                        <select class="form-control form-select" name="male-date" id="male-date"
                            onchange="setBirthDate('male')" validations="required:true">
                            <option value="" selected="" disabled="">-DD-</option>
                        </select>
                    </div>
                </div>
            </div>
            <span class="error" id="d_error"></span>
        </div>
        <div class="form-group">
            <label class="form-label">Your Time of Birth</label>
            <!--<input type="time" onchange="time_split('male', this)" id="birth_time_male" class="form-control">-->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-control-group mb-3">
                        <select class="form-control form-select" name="male-hour" id="male-hour"
                            validations="required:true">
                            <option value="" selected="" disabled="">-HH-</option>
                            <option value="00">00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="form-control-group mb-3">
                        <select class="form-control form-select" name="male-minute" id="male-minute"
                            validations="required:true">
                            <option value="" selected="" disabled="">-MM-</option>
                            <option value="00">00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="form-control-group mb-3">
                        <select class="form-control form-select" name="ampm1" id="ampm1" validations="required:true"
                            onchange="setBirthTime('male')">
                            <option value="">-AM / PM-</option>
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                    </div>
                </div>
            </div>
            <span class="error" id="birth_time_male_error"></span>
        </div>

        <div class="form-group">
            <label class="form-label">Your Place of Birth</label>
            <input type="text" data-location_input_prefix="male" class="form-control prokerala-location-input"
                name="location1" id="location1" placeholder="Place of Birth" autocomplete="off"
                validations="required:true" />
            <span class="error" id="location1_error"></span>
        </div>

        <div class="form-group">
            <label class="form-label">Partner's Fullname <span style='color:#e91e63; font-weight:bold;'>(Female
                    Horoscope)</span></label>
            <input type="text" id="fullname_female" name="fullname_female" validations="required:true"
                class="form-control" placeholder="Full Name">
            <span class="error" id="fullname_female_error"></span>
        </div>


        <div class="form-group">
            <label class="form-label">Partner's Date of Birth</label>

            <!-- <input type="date" onchange="date_split('female', this)" id="birth_date_female" class="form-control"> -->

            <div class="row">
                <div class="col-sm-4 ">
                    <div class="form-control-group mb-3">
                        <select class="form-control form-select" name="female-year" id="female-year"
                            onchange="updateDays('female')" validations="required:true">
                            <option value="" selected="" disabled="">-YYYY-</option>
                            @for ($i = date('Y'); $i >= 1950; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="form-control-group mb-3">
                        <select class="form-control form-select" name="female-month" id="female-month"
                            validations="required:true" onchange="updateDays('female')">
                            <option value="" selected="" disabled="">-MM-</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="form-control-group mb-3">
                        <select class="form-control form-select" name="female-date" id="female-date"
                            validations="required:true" onchange="setBirthDate('female')">
                            <option value="" selected="" disabled="">-DD-</option>
                        </select>
                    </div>
                </div>
            </div>


            <span class="error" id="birth_date_female_error"></span>
        </div>

        <div class="form-group">
            <label class="form-label">Partner's Time of Birth</label>
            <!-- <input type="time" onchange="time_split('female', this)" id="birth_time_female" class="form-control"> -->

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-control-group mb-3">
                        <select class="form-control form-select" name="female-hour" id="female-hour"
                            validations="required:true">
                            <option value="" selected="" disabled="">-HH-</option>
                            <option value="00">00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="form-control-group mb-3">
                        <select class="form-control form-select" name="female-minute" id="female-minute"
                            validations="required:true">
                            <option value="" selected="" disabled="">-MM-</option>
                            <option value="00">00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="form-control-group mb-3">
                        <select class="form-control form-select" name="ampm2" id="ampm2" validations="required:true"
                            onchange="setBirthTime('female')">
                            <option value="">-AM / PM-</option>
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                    </div>
                </div>
            </div>


            <span class="error" id="birth_time_female_error"></span>
        </div>

        <div class="form-group">
            <label class="form-label">Partner's Place of Birth</label>
            <input type="text" data-location_input_prefix="female" class="form-control prokerala-location-input"
                validations="required:true" name="location2" id="location2" placeholder="Place of Birth"
                autocomplete="off" />
            <span class="error" id="location2_error"></span>
        </div>

        <div class="form-group">
            <label class="form-label">Partner Email</label>
            <input type="text" id="partner_email" validations="required:true;pattern:email" class="form-control"
                placeholder="Email">
            <span class="error" id="email_error"></span>
        </div>
        <button type="submit" class="btn btn-mat  w-100">Check Your
            Compatibility</button>
        <p class="form-footer">
            🔒 We respect your privacy. No spam, ever.
        </p>
    </form>
</div>
<script>
    function setBirthTime(gender)
    {
        let hour = $("#"+gender+"-hour").val();
        let minute = $("#"+gender+"-minute").val();
        
        if (hour === 0) {
            hour = 12; // Midnight case
        }

    }

    function updateDays(gender) {        
        const year = document.getElementById(gender + "-year").value;
        const month = document.getElementById(gender + "-month").value;
        const dayDropdown = document.getElementById(gender + "-date");
        dayDropdown.innerHTML = ""; // Clear the current options

        let daysInMonth = 31; // Default for months with 31 days
        if (month == 4 || month == 6 || month == 9 || month == 11) {
        daysInMonth = 30; // April, June, September, November have 30 days
        } else if (month == 2) {
        // Check for leap year
        if ((year % 4 === 0 && year % 100 !== 0) || year % 400 === 0) {
            daysInMonth = 29; // February in a leap year
        } else {
            daysInMonth = 28; // February in a non-leap year
        }
        }

        let option = document.createElement("option");
        option.value = "";
        option.text = "-DD-";
        dayDropdown.appendChild(option);

        // Populate the day dropdown with the correct number of days
        for (let day = 1; day <= daysInMonth; day++) {
        let formattedDay = String(day).padStart(2, '0'); // Pad with leading zeros
        let option = document.createElement("option");
        option.value = formattedDay;
        option.text = formattedDay;
        dayDropdown.appendChild(option);
        }
    }

    function validateHorosope(e) {
        clearErrors();

        let parent = $('#new_partner_details_form');
        let inputs = $(parent).find('input, select, textarea');
        let isvalid = true;
        let focusSet = false;

        inputs.each(function() {
            let value = $(this).val();
            let rules = $(this).attr('validations');
            let label = $(this).attr('placeholder');

            let errors = validationMatch(value, rules);

            if (errors.length > 0) {
                addError($(this), errors[0]);
                isvalid = false;

                if(!focusSet){
                    $('html, body').animate({
                        scrollTop: $(this).offset().top - 100,
                    }, 1000);
                }

                focusSet = true;
            }
        });

        if (!isvalid) {
            e.preventDefault();
        }
        
    }

    function clearErrors(){
        $('.error').remove();
    }

    const regex_patterns = {
        email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,     
        number: /^[0-9]+$/,                      
        alpha: /^[A-Za-z]+$/,                   
        alphanumeric: /^[A-Za-z0-9]+$/      
    };

    function validationMatch(value, rulesString) {
        if(!rulesString) return [];

        let rules = {};
        

        rulesString.split(";").forEach(rule => {
            if (rule.trim() === "") return;
            let [key, val] = rule.split(":");
            if (key && val) {
                rules[key.trim()] = val.trim();
            }
        });

        let errors = [];

        if (rules.required === "true" && (!value || value.trim() === "")) {
            errors.push("This field is required.");
        }

        if (rules.length && value.length < parseInt(rules.length)) {
            errors.push(`Length must be ${rules.length} characters.`);
        }

        if (rules.pattern && regex_patterns[rules.pattern]) {
            if (!regex_patterns[rules.pattern].test(value)) {
                errors.push(`Invalid ${rules.pattern} format.`);
            }
        }

        return errors;
    }

    
</script>

<script type="module">
    const PK_API_CLIENT_ID = 'd5d9461b-49f7-4339-8a1b-72cf9fa7b4ee';
    
    $(document).ready(function() {

        function loadScript(cb) {
            var script = document.createElement('script');
            script.src = 'js/location.min.js';
            script.onload = cb;
            script.async = 1;
            document.head.appendChild(script);
        }

       function createInput(id, name, value) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.id = id;
            input.name = name;
            input.value = value;

            $('#new_partner_details_form').append(input);

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
            }, {
                clientId: PK_API_CLIENT_ID,
                persistKey: `${inputPrefix}loc`
            });

            input.addEventListener('change', function(e) {
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


    });
                
</script>