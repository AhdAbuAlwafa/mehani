<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title> الرئيسيه</title>
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/navbar.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="up-page">
            <!----------------navbar------------------->
            @include('shared.navbar')

            <!----------------content of pic-------------->
            <h2 class="content-pic1"> ابحث عن افضل العمال من كافة المهن لانجاز اعمالك</h2>
            <h3 class="content-pic2">هل تعرف اسم المهني ؟ قم بالبحث عنه </h3>
            <!-----------------search on pic----------------->
            <div class="searchbox1">
                <div class="searchbox2">
                    <input type='text' placeholder="ابحث عن عامل">
                    <a href="#">
                        <i class="fa fa-magnifying-glass"></i>
                    </a>
                </div>
            </div>
        </div>
        <!----------------navbar------------------->
        @include('shared.navbar')
        <!---------------------start of crafts --------------->
        <section class="services section-padding" id="services">

            <div class="crafts">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-header text-center pb-5">
                                <h2 style="font-size: 50px;">المهن</h2>
                                <p style="font-size: 28px;">اختر المهنه لتتصفح قائمه امهر العمال</p>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($crafts as $craft)
                <div class="contener">
                    <div class="img-contener">

                        <img src="{{asset('/images/'.$craft->image_path)}}">
                    </div>
                    <br>
                    <br>
                    <div class="btn-contener">

                        <a href="{{ route('userPage.getAllUser', ['profession' => $craft->id]) }}"
                            class="btn btn-primary">{{ $craft->craft_name }} </a>

                    </div>
                </div>
                @endforeach
            </div>
        </section>



        <!------------------------start of adds-------------------->
        <div class="adds">
            <div class="center2">
                <h1>الاعلانات</h1>
            </div>
        </div>
        <br><br><br>
        <!------------------------adss of free work---------------->
        <div class="adds1">
            <h1>اعلانات العمل الحر</h1>
        </div>
        <div class="select-box">
            <div class="select-option1">
                <input type="text" placeholder="المدينه" id="soValue1" readonly name="">
            </div>
            <div class="content1">
                <ul class="options1">
                    <li>جنين</li>
                    <li>نابلس</li>
                    <li>رام الله</li>
                    <li>بيت لحم</li>
                    <li>الخليل</li>
                    <li>طولكرم </li>
                </ul>
            </div>

        </div>
        <div class="select-box">
            <div class="select-option2">
                <input type="text" placeholder="القريه" id="soValue2" readonly name="">
            </div>
            <div class="content2">
                <ul class="options2">
                    <li>جنين</li>
                    <li>نابلس</li>
                    <li>رام الله</li>
                    <li>بيت لحم</li>
                    <li>الخليل</li>
                    <li>طولكرم </li>
                </ul>
            </div>
        </div>
        <br>

        <br><br><br> <br><br><br> <br><br><br>

    </div>
</body>