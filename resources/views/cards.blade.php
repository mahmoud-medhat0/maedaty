<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة كارت - مـائدتي</title>
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="icon" href="images/ramadan.gif">
    <!-- Render All Elements -->
    {{-- <link rel="stylesheet" href="css/normalize.css"> --}}
    <!-- Fontasome Library -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Responsive Css File System -->
    {{-- <link rel="stylesheet" href="css/mediaQ.css"> --}}
    <!-- Desgin System -->
    <link rel="stylesheet" href="css/desgin_system.css">
    <!-- Main Template Css File -->
    <link rel="stylesheet" href="css/card-style.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700&family=Tajawal:wght@200;300;400;500;700;800;900&family=Work+Sans:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
    .company {
        background-color: var(--dark-color);
        width: 45%;
        height: 4.5vh;
        margin-bottom: 15px;
        padding: 0 15px;
        font-family: 'Tajawal-2';
        border: none;
        font-size: 16px;
        border-radius: 4px;
        color: #FFF;
    }
    @media (max-width: 1200px){
        .container {
            width: 100%;
        }
        .support-card input, .company{
            width: 90%;
        }
    }
    </style>
</head>

<body>
    <!-- <div id="bgLoading">
        <span class="loader"></span>
    </div> -->
    <div id="nav" class="nav-bar">
        <div id="nav" class="nav-bar">
            <nav>
                <ul>
                    <a href="/">
                        <li>الرئيسية</li>
                    </a>
                    <a href="/view">
                        <li>الموائد</li>
                    </a>
                    <a href="create">
                        <li>إضافة مائدة ؟</li>
                    </a>
                    <a href="/cards">
                        <li>كروت الشحن</li>
                    </a>
                    <a href="cv">
                        <li>التواصل</li>
                    </a>
                    <a href="#">
                        <img src="images/ramadan.gif" alt="">
                    </a>
                </ul>
            </nav>
        </div>
        <div id="support" class="support">
            <div class="container">
                <div class="support-heading">
                    <h2 data-scroll-reveal="enter bottom move 35px over 0.8s after 0.5s">إضافة كارت</h2>
                    <p data-scroll-reveal="enter bottom move 35px over 0.8s after 0.5s">يمكنك إضافة الكروت لتقديم
                        المساعدة!
                        <br> <small style="color:rgb(226, 57, 57)">علما بأنه يتم حذف الكروت المتاحة بعد 24 ساعة من تاريخ
                            إضافتها!</small>
                    </p>
                </div>
                <div class="support-card">
                    <form method="POST" action="{{route('newCard')}}">
                        @csrf
                        <input name="number" value="{{old('number')}}" class="@error('number') is-invalid @enderror" data-scroll-reveal="enter left move 35px over 0.8s after 0.5s" type="text"
                            placeholder="رقم الكارت" minlength="14" maxlength="14">
                            
                        <input name="char_number" value="{{old('char_number')}}" class="@error('char_number') is-invalid @enderror" data-scroll-reveal="enter right move 35px over 0.8s after 0.5s"
                            type="number" placeholder="بيشحن كام مرة(القيمة صفر لو أنت مش عارف)!">
                           
                            @error('number')
                                <div class="alert alert-danger" style="color:rgb(226, 57, 57)">{{$message}}</div>
                            @enderror
                            @error('char_number')
                                <div class="alert alert-danger" style="color:rgb(226, 57, 57)">{{$message}}</div>
                            @enderror
                        
                        <input name="char_value" value="{{old('char_value')}}" class="@error('char_value') is-invalid @enderror" data-scroll-reveal="enter right move 35px over 0.8s after 0.5s"
                            type="number" placeholder="(القيمة صفر لو أنت مش عارف)بيدى كام!">
                            
                        <select name="company" class="company @error('company') is-invalid @enderror">
                            <option value="vf" selected>فودافون</option>
                            <option value="we">وى</option>
                            <option value="mb">موبينيل</option>
                            <option value="et">اتصالات</option>
                        </select>
                        @error('char_value')
                            <div class="alert alert-danger" style="color:rgb(226, 57, 57)">{{$message}}</div>
                        @enderror
                        @error('company')
                        <div class="alert alert-danger" style="color:rgb(226, 57, 57)">{{$message}}</div>
                    @enderror
                        <input style="cursor: pointer" data-scroll-reveal="enter bottom move 35px over 0.8s after 0.5s"
                            type="submit" value="إضافة" class="support-btn">
                    </form>
                </div>
                <div class="cards-support" id="cards-support">
                    <div style="color:#fff">لا يوجد كروت متاحة الآن!</div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#143166" fill-opacity="1"
                    d="M0,64L40,69.3C80,75,160,85,240,117.3C320,149,400,203,480,229.3C560,256,640,256,720,224C800,192,880,128,960,122.7C1040,117,1120,171,1200,186.7C1280,203,1360,181,1400,170.7L1440,160L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
                </path>
            </svg>
            <div class="view-star">
                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-moon"></i>
                    <i class="fa-solid fa-cloud"></i>
                    <i class="fa-solid fa-coins"></i>
                </div>
            </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- <script src="../main.js"></script> --}}
<script>
$(document).ready(function() {
    $.ajax({
        url: 'getcards',
        method: 'get',
        success: function(response) {
            $("#cards-support").html("");
            response.forEach(ele => {
                let timeDiff = Math.abs(Date.parse(new Date) - Date.parse(ele.expire));
                let hours = 24 - Math.floor(timeDiff / 3600000); // عدد الساعات
                let minutes = 60 - Math.floor((timeDiff % 3600000) / 60000); // عدد الدقائق
                let seconds = 60 - Math.floor(((timeDiff % 3600000) % 60000) /
                1000); // عدد الثواني
                state = 'card-accept'
                exist = true;
                star = `
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    `
                if (hours < 16 && hours > 8) {
                    state = 'card-soon';
                    star =
                        `<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>`
                } else if (hours < 8 && hours > 0) {
                    state = 'card-wrong'
                    star = `<i class="fa-solid fa-star"></i>`
                } else {
                    exist = false;
                }
                if (ele.company == "vf") {
                    ele.company = 'فودافون'
                } else if (ele.company == 'we') {
                    ele.company = 'وى'
                } else if (ele.company == 'et') {
                    ele.company = 'اتصالات'
                } else if (ele.company = 'mb') {
                    ele.company = 'موبنيل'
                } else {
                    ele.company = 'غير معروفة!'
                }
                if (exist) {

                    $("#cards-support").append(`<div data-scroll-reveal="enter bottom move 35px over 0.8s after 0.5s" class="${state}">
                        <div class="status"></div>
                        <div class="network">
                            <h3>${ele.company}</h3>
                        </div>
                        <div class="number-card">
                            <h4>${ele.number}</h4>
                        </div>
                        <div class="number-card">
                            <h4>الشحنات: ${ele.charge_number}</h4>
                        </div>
                        <div class="number-card">
                            <h4>قيمة الشحنة: ${ele.charge_value}</h4>
                        </div>
                        <div class="date">
                            <h6>${hours}:${minutes}:${seconds}</h6>
                        </div>
                        <div class="rate">
                            ${star}
                        </div>
                    </div>`)
                }
            });
            if ($("#cards-support").html() == "") {
                $("#cards-support").html(`<div style="color:#fff">لا يوجد كروت متاحة الآن!</div>`)
            }
            if (response == "") {
                $("#cards-support").html(`<div style="color:#fff">لا يوجد كروت متاحة الآن!</div>`)
            }
        }
    })
})
</script>

</html>