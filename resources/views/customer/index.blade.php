@extends('layouts.app')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ui.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pignose.calendar.min.css')}}"/>
    <style>    
         .main-content{
            display: none;
        }

        .navbar-toggler {
            display: none;
        }

        .sidenav{
            display: none !important;
        }
    </style>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-8">
        <!-- form -->
            <form action="" method="POST" role="form" class="appointment_form" enctype="multipart/form-data">
                @csrf
                <div class="customer_first">
                    <div class="welcome">
                        Book Your Appointment - هنا يمكنك ان تحجز موعد  
                    </div>
                    <div class="form-group mt-5">
                        <label for="about">What do you need help with - ماذا تحتاج من مساعده </label>
                        <select name="about" id="about" class="about form-control">
                        <!-- these abouts variable is the collection from the controller  -->
                            @foreach ($abouts as $item)
                                <option value="{{$item->title}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="customer_firstBtn">
                        <div class="btn btn-next btn_first">
                            Next-التالي
                        </div>
                    </div>               
                </div>
<!-- calendar section  -->
                <div class="customer_second mt-5">
                    <div class="date_title">
                        Select Appointment Date- اختر التاريخ
                    </div>
                    <div class="mt-2">
                        <div id="disabled-weekdays">       
                            <div class="disabled-weekdays-calendar"></div>
                            <div class="box"></div>
                        </div>
                        <input type="hidden" name="appoint_date" id="appoint_date" class="appoint_date">
                        @if ($errors->has('appoint_date'))
                            <div class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('appoint_date') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="customer_secondBtn mt-5">
                        <div class="btn btn-next btn_second">
                            Next-التالي
                        </div>
                    </div> 
                </div>

                <div class="customer_third mt-5">
                    <div class="time_title">
                        Select Appointment Time-اختر الوقت 
                    </div>
                    <div class="mt-2 date_pick">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="time_btn">
                                    09:00 ~ 09:30
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="time_btn">
                                    09:30 ~ 10:00
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="time_btn">
                                    10:00 ~ 10:30
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="time_btn">
                                    10:30 ~ 11:00
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="time_btn">
                                11:00 ~ 11:30
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="time_btn">
                                    11:30 ~ 12:00
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="time_btn">
                                12:00 ~ 12:30
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="time_btn">
                                    12:30 ~ 13:00
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="time_btn">
                                    13:00 ~ 13:30
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="time_btn">
                                    13:30 ~ 14:00
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="time_btn">
                                    14:00 ~ 14:30
                                </div>
                            </div>                        
                        </div>

                        <div class="customer_thirdBtn mt-5">
                            <div class="btn btn-next btn_third">
                                Next-التالي
                            </div>
                        </div> 

                        @if ($errors->has('appoint_time'))
                            <div class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('appoint_time') }}</strong>
                            </div>
                        @endif
<!-- show the alert when appoint already reserved -->
                        <div class="invalid-feedback appoint_timeError">
                            This appointment already reserved. هذا الموعد محجوز مسبقا
                        </div>
                        <!-- appoint summary part -->
                        <div class="summary mt-5 mb-5">
                            <div class="py-2">
                                <h3>Summary</h3>
                            </div>
                            <div class="py-2">
                                <span>Type: </span> <span class="summary_type px-2"></span>
                            </div>
                            <div class="py-2">
                                <span>Appointment Date and Time: </span> <span class="summary_datetime px-2"></span>
                            </div>
                        </div>

                        <input type="hidden" name="appoint_time" id="appoint_time" class="appoint_time">
                    </div>
                </div>
                <!-- customer information input part -->
                <div class="customer_info">                  

                    <div class="form-group">
                        <label for="fname">First Name-الاسم الاول</label>
                        <input type="text" name="fname" id="fname" class="form-control">
                        @if ($errors->has('fname'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('fname') }}</strong>
                            </span>
                        @endif
                    </div>  

                    <div class="form-group">
                        <label for="lname">Last Name-الاسم الاخير</label>
                        <input type="text" name="lname" id="lname" class="form-control">
                        @if ($errors->has('lname'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('lname') }}</strong>
                            </span>
                        @endif
                    </div>  

                    <div class="form-group">
                        <label for="gender">Please select your gender-اختر جنسك</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="male">Male-رجل</option>
                            <option value="female">Female-امراه</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="birthday">Birthday-تاريخ الميلاد</label>
                        <input type="date" name="birthday" id="birthday" class="form-control">
                        @if ($errors->has('birthday'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('birthday') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Email-الايميل الشخصي</label>
                        <input type="email" name="email" id="email" class="form-control">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number-رقم الهاتف</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="info">Please describe in details the reasons for the visit-اخبرنا بشكل مفصل عن سبب الزياره</label>
                        <textarea name="info" id="info" class="form-control" cols="30" rows="10"></textarea>
                        @if ($errors->has('info'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('info') }}</strong>
                            </span>
                        @endif
                    </div>    

                     <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="checkbox" name = 'agree_personal' id = 'agree_personal' required> I agree that my personal information is handled in accordance with GDPR. 
                          </label>
                        @if ($errors->has('agree_personal'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('agree_personal') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="agree_data" id = 'agree_data' required> Agree on personal data processing. 
                          </label>
                        @if ($errors->has('agree_data'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('agree_data') }}</strong>
                            </span>
                        @endif
                    </div>
                

                    <div class="form-group text-center">
                        <input type="submit" value="Submit-ارسال الموعد" class="submit_btn btn btn-next">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js')
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{  asset('js/pignose.calendar.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
    // calender plugin
            function onSelectHandler(date, context) {
                
                var $element = context.element;
                var $calendar = context.calendar;
                var $box = $element.siblings('.box').show();
                var text = '';
    
                if (date[0] !== null) {
                    text += date[0].format('YYYY-MM-DD');
                }
    
                if (date[0] !== null && date[1] !== null) {
                    text += ' ~ ';
                }
                else if (date[0] === null && date[1] == null) {
                    text += 'nothing';
                }
    
                if (date[1] !== null) {
                    text += date[1].format('YYYY-MM-DD');
                }
                $box.text(text);
                $('.appoint_date').val(text);
            }
    
            function onApplyHandler(date, context) {
                var $element = context.element;
                var $calendar = context.calendar;
                var $box = $element.siblings('.box').show();
                var text = 'You applied date ';
    
                if (date[0] !== null) {
                    text += date[0].format('YYYY-MM-DD');
                }
    
                if (date[0] !== null && date[1] !== null) {
                    text += ' ~ ';
                }
                else if (date[0] === null && date[1] == null) {
                    text += 'nothing';
                }
    
                if (date[1] !== null) {
                    text += date[1].format('YYYY-MM-DD');
                }
    
                $box.text(text);
            }      

            var d = new Date();
            $minDate = d.getFullYear() + '-' +  (d.getMonth() + 1) + '-' + d.getDate();
    //this is the calendar init function   
            $('.disabled-weekdays-calendar').pignoseCalendar({
                theme: 'blue',
                select: onSelectHandler,
                disabledWeekdays: [0, 6],
                minDate: $minDate,
            });

            // when clidk the time button, this function run
            $('.time_btn').click(function() {                
                $('.time_btn').removeClass('active');                
                $(this).addClass('active');               
                $appoint_time = $(this).text().trim();
                $('.appoint_time').val($appoint_time);
            })

            // when click the first next button, this function run
            $('.btn_first').click(function() {
                $(this).css('display', 'none');
                //calender part show
                $('.customer_second').fadeIn(2000);
            })

             // when click the second next button, this function run
            $('.btn_second').click(function() {
                $(this).css('display', 'none');
                // time pick part show
                $('.customer_third').fadeIn(2000);
            })

            // when click the third next button, this function run
            $('.btn_third').click(function() {
                // get the inputed date, time, type for check the validate with ajax request
                let _token = $('input[name=_token]').val();
                let about = $('#about').val();
                let appoint_date = $('#appoint_date').val();
                let appoint_time = $('#appoint_time').val();
                
                var form_data =new FormData();
                form_data.append("_token", _token);
                form_data.append("appoint_date", appoint_date);
                form_data.append("appoint_time", appoint_time);
                // ajax function goto this route customer.appointCheck
                $.ajax({
                    url: "{{route('customer.appointCheck')}}",
                    type: 'POST',
                    dataType: 'json',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success : function(response) {
                        if(response == 'success') {  
                            // if check success, show the customer informatin input field
                            $(this).css('display', 'none');
                            $('.customer_info').fadeIn(2000);   
                            $('.appoint_timeError').css('display', 'none');
                            // put the summary date.
                            $('.summary_type').text(about);
                            $summary_datetime = appoint_date + ' ' + appoint_time;
                            $('.summary_datetime').text( $summary_datetime);
                            $('.summary').fadeIn(2000);   
                        } else if (response == 'failed'){
                            $('.summary').fadeOut();
                            $('.appoint_timeError').css('display', 'block');
                        } else {
                            let messages = response.data;
                            if(messages.option) {                               
                            }
                        }
                    },
                    error: function(err) {
                        if (err.status == 422) {
                            console.log(err.responseJSON);
                            $('#success_message').fadeIn().html(err.responseJSON.message);                            
                            console.warn(err.responseJSON.errors);
                            $.each(err.responseJSON.errors, function (i, error) {
                                var el = $(document).find('[name="'+i+'"]');
                                el.after($('<span style="color: red;">'+error[0]+'</span>'));
                            });
                        }
                    }
                });
            })

            // final form submit function, it is same as the above ajax
            $('.appointment_form').submit(function(event)  {
                event.preventDefault();

                let _token = $('input[name=_token]').val();
                let fname = $('#fname').val();
                let lname = $('#lname').val();
                let gender = $('#gender').val();
                let birthday = $('#birthday').val();
                let email = $('#email').val();
                let phone = $('#phone').val();
                let info = $('#info').val();
                let about = $('#about').val();
                let appoint_date = $('#appoint_date').val();
                let appoint_time = $('#appoint_time').val();
                let agree_personal = $('#agree_personal').val();
                let agree_data = $('#agree_data').val();

                var form_data =new FormData();
                form_data.append("_token", _token);
                form_data.append("fname", fname);
                form_data.append("lname", lname);   
                form_data.append("gender", gender);   
                form_data.append("birthday", birthday);
                form_data.append("email", email);
                form_data.append("phone", phone);
                form_data.append("info", info); 
                form_data.append("about", about);
                form_data.append("appoint_date", appoint_date);
                form_data.append("appoint_time", appoint_time);
                form_data.append("agree_personal", agree_personal);
                form_data.append("agree_data", agree_data);

                $.ajax({
                    url: "{{route('customer.store')}}",
                    type: 'POST',
                    dataType: 'json',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success : function(response) {
                        console.log(response);
                        if(response == 'success') {  
                            alert('Your Appointment Successfully Reserved.');
                            window.location.reload();                          
                        } else if (response == 'failed'){
                            $('.appoint_timeError').css('display', 'block');
                        } else {
                            console.log(response);
                            let messages = response.data;
                            if(messages.option) {                               
                            }
                        }
                    },
                    error: function(err) {
                        if (err.status == 422) { 
                            console.log(err.responseJSON);
                            $('#success_message').fadeIn().html(err.responseJSON.message);
                            console.warn(err.responseJSON.errors);
                            $.each(err.responseJSON.errors, function (i, error) {
                                var el = $(document).find('[name="'+i+'"]');
                                el.after($('<span style="color: red;">'+error[0]+'</span>'));
                            });
                        }
                    }
                });
            })
        });
    </script>
@endpush
@endsection
